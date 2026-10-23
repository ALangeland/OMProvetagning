# OMPrøvetagning ApS – hjemmeside

Statisk hjemmeside for OMPrøvetagning ApS. Repoet er backup; siden lægges op manuelt hos Simply.

## Filer
- `index.html` – hele siden (tekst, design og script i én fil)
- `webmail/index.html` – omprovetagning.dk/webmail sender videre til Simplys webmail
- `.htaccess` – tvinger https og fjerner www, sender gamle WordPress-adresser til forsiden, viser 404-siden
- `404.html` – fejlside, når en adresse ikke findes
- `sitemap.xml`, `robots.txt` – til Google
- `favicon.svg`

## Sådan lægges siden op
1. Log ind på Simply → Filhåndtering (eller FTP).
2. Upload filerne og mappen `webmail` til mappen `public_html`.
   `.htaccess` starter med punktum og kan være skjult i Windows – sørg for at den kommer med.
3. Slet evt. gamle WordPress-filer i samme mappe.
