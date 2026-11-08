# OMPrøvetagning ApS – hjemmeside

Statisk hjemmeside for OMPrøvetagning ApS. Repoet er backup; siden lægges op manuelt hos Simply.

## Filer
- `index.html` – hele siden (tekst, design og script i én fil)
- `webmail/index.html` – omprovetagning.dk/webmail sender videre til Simplys webmail
- `.htaccess` – tvinger https og fjerner www, sender gamle WordPress-adresser til forsiden, viser 404-siden
- `404.html` – fejlside, når en adresse ikke findes
- `sitemap.xml`, `robots.txt` – til Google
- `favicon.svg`
- `el/` – privat webapp "Elpris" (omprovetagning.dk/el) med elpris, opladningspris og sammenligning af elselskaber. Ikke linket fra forsiden og skjult for Google (`noindex` og `Disallow: /el/` i `robots.txt`).
  - `el/index.html` – hele appen. Henter priser live i browseren fra elpriser.org (Energi Data Service) og elselskabernes priser fra Strømligning.
  - `el/manifest.webmanifest`, `el/sw.js`, `el/*.png`, `el/icon.svg` – gør appen installerbar på telefonens hjemmeskærm og åbningsbar uden forbindelse.
  - Strømlignings data er gratis til ikke-kommerciel brug mod synlig kreditering (står i appen). Skal appen bruges erhvervsmæssigt, skal der indgås aftale med info@stromligning.dk.

## Sådan lægges siden op
1. Log ind på Simply → Filhåndtering (eller FTP).
2. Upload filerne og mapperne `img`, `webmail` og `el` til mappen `public_html`.
   `.htaccess` starter med punktum og kan være skjult i Windows – sørg for at den kommer med.
3. Slet filer hos Simply, som ikke længere er i repoet (fx gamle WordPress-filer, `kontakt.php`, `img/eurofins-logo.png`).
