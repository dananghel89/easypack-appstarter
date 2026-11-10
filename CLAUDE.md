# CLAUDE.md

EasyPack App starter: the skeleton of an application on the EasyPack Framework (`app/`, `config/`, `routes/web.php`, `public/` as the web root). The framework comes from the sibling repo `../easypack-framework` through a Composer `path` repository (a junction at `vendor/dananghel89/easypack-framework`). The GitHub migration plan switches it to the GitHub repository.

Plans live in `../docs/` (not in this repo).

## Stack and local site

- Runtime constraint `php >=7.0` (the framework needs 7.3); development on PHP 8.4.26 (WAMP).
- Local site: `http://easypack.test` (WAMP vhost → `public/`, `AllowOverride All`). The local `.env` has `APP_DEBUG = true` and no database (`DB_NAME = null`; the connection is lazy).
- With `APP_DEBUG = true`, errors and deprecations from the app and the framework are shown. Deprecations from third-party packages in `vendor/` (delight-im/db, Plates on PHP 8.4) are skipped by `Epack\ErrorHandler`, so they don't break status codes or cookies.

## Commands

```bash
composer test        # Pest, with Xdebug off; needs .env
composer lint        # Pint (PER preset)
composer test:lint
```

- `tests/Support/Server.php` runs `public/index.php` on PHP's built-in web server (no `.htaccess`). `http($method, $path, $options)` sends a request to it.
- `tests/ApacheTest.php` checks `.htaccess` behaviour on `http://easypack.test`, and is skipped when it isn't reachable.

## Conventions

- Views escape every variable with `e()`.
- `.env` is never committed. A new setting goes into `config/app.php` (only listed keys can be overridden in `.env`) and into `.env.example`.
- Commit messages: one line, `type: description`.
- Git identity is set locally in this repo (`dananghel89` with the GitHub noreply address); check it before committing.
- Never put a personal name, an email address, or the old Composer vendor / Bitbucket workspace names into files or commits. The only identity in the repo is `dananghel89`.
- Remote: Bitbucket (private), branch `master`, until the GitHub migration plan.
