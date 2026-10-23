# OMPrøvetagning ApS – hjemmeside

Statisk hjemmeside for OMPrøvetagning ApS. Repoet er backup; siden lægges op manuelt hos Simply.

## Filer
- `index.html` – hele siden (tekst, design og script i én fil)
- `webmail/index.html` – omprovetagning.dk/webmail sender videre til Simplys webmail
- `.htaccess` – tvinger https og fjerner www, sender gamle WordPress-adresser til forsiden, viser 404-siden
- `404.html` – fejlside, når en adresse ikke findes
- `sitemap.xml`, `robots.txt` – til Google
- `favicon.svg`

## Sådan kommer siden op hos Simply
Det sker automatisk: Hver gang der gemmes på `main`, uploader GitHub Actions (`.github/workflows/deploy.yml`) filerne til `public_html` hos Simply via FTPS.

- Kræver hemmelighederne `FTP_USERNAME` og `FTP_PASSWORD` under Settings → Secrets and variables → Actions.
- Kan også startes i hånden: fanen Actions → "Upload til Simply" → Run workflow.
- Filer, der slettes i repoet, bliver ikke altid slettet hos Simply – slet dem i Simplys filhåndtering.
