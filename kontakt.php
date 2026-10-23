<?php
// Kontaktformular – sender beskeden som mail til firmaets e-mail.
// Kører på Simply-hostingen (PHP). Virker ikke, hvis siden åbnes direkte fra disken.

$MODTAGER = 'omprovetagning@gmail.com';

header('Content-Type: application/json; charset=utf-8');

function svar($ok, $fejl = '') {
    echo json_encode(['ok' => $ok, 'fejl' => $fejl], JSON_UNESCAPED_UNICODE);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    svar(false, 'Forkert forespørgsel.');
}

// Spamfælde: feltet er skjult for rigtige besøgende
if (!empty($_POST['website'])) {
    svar(true);
}

function felt($navn, $max) {
    $v = trim((string)($_POST[$navn] ?? ''));
    $v = str_replace(["\r", "\0"], '', $v);
    return mb_substr($v, 0, $max);
}

$navn    = felt('navn', 100);
$email   = felt('email', 150);
$telefon = felt('telefon', 40);
$emne    = felt('emne', 150);
$besked  = felt('besked', 5000);

if ($navn === '' || $besked === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    svar(false, 'Udfyld navn, en gyldig e-mail og en besked.');
}

// Fjern linjeskift fra felter, der bruges i mail-headere
$navn  = str_replace("\n", ' ', $navn);
$emne  = str_replace("\n", ' ', $emne);

$domæne = preg_replace('/^www\./', '', $_SERVER['HTTP_HOST'] ?? 'omprovetagning.dk');
$domæne = preg_replace('/[^a-z0-9.\-]/i', '', $domæne);
$afsender = 'noreply@' . $domæne;

$titel = 'Henvendelse fra hjemmesiden' . ($emne !== '' ? ': ' . $emne : '');
$tekst = "Navn: $navn\nE-mail: $email\n"
       . ($telefon !== '' ? "Telefon: $telefon\n" : '')
       . ($emne !== '' ? "Emne: $emne\n" : '')
       . "\n$besked\n";

$headere = [
    'From' => 'Hjemmesiden <' . $afsender . '>',
    'Reply-To' => $email,
    'Content-Type' => 'text/plain; charset=UTF-8',
    'MIME-Version' => '1.0',
];

$sendt = mail($MODTAGER, '=?UTF-8?B?' . base64_encode($titel) . '?=', $tekst, $headere, '-f' . $afsender);

if (!$sendt) {
    svar(false, 'Beskeden kunne ikke sendes.');
}
svar(true);
