# EasyPack App starter

The application starter for the [EasyPack Framework](https://github.com/dananghel89/easypack-framework): the folders, config files and front controller of a new app.

## Requirements

- PHP 7.3 or newer (PHP 8.4 for the test suite) and Composer
- Apache with `mod_rewrite`, or PHP's built-in server for development

## Getting started

1. Clone or download this repo, then run `composer install`.
2. Copy `.env.example` to `.env` and set your values: at least `APP_URL`, plus the `DB_*` keys if you use a database. Quote every string value.
3. Point the web server at the **`public`** folder:
   - **Apache:** set the vhost's `DocumentRoot` to `public/` with `AllowOverride All`. `public/.htaccess` sends every request that isn't a file to `index.php`.
   - **Development:** `php -S localhost:8000 -t public public/index.php`.
4. Open the site: you should see the welcome page.

For local development set `APP_DEBUG = true` to see error details. Leave it `false` on a public server: errors then show `app/Views/500.php` and are logged to `storage/logs/epack.log`.

## Your first page

1. Add a route in `routes/web.php`:

   ```php
   $router->map('GET', '/about', 'App\Controllers\About#index', 'about');
   ```

2. Add the controller `app/Controllers/About.php`:

   ```php
   <?php

   namespace App\Controllers;

   class About extends \Epack\Controller {

   	public function indexAction() {
   		\Epack\View::render('about', ['title' => 'About us']);
   	}

   }
   ```

3. Add the view `app/Views/about.php`, and escape every variable with `e()`:

   ```php
   <h1><?= e($title) ?></h1>
   ```

Routes match exactly: `/about` and `/about/` are different URLs.

## Folders

| Folder | Contents |
|---|---|
| `app/Controllers`, `app/Models`, `app/Views` | Your code. `Error.php` and `404.php` handle unknown URLs, and `500.php` is the error page |
| `app/Middleware` | Classes run on every request (see the framework README) |
| `app/locales` | Optional translations: `en.php` returns `['key' => 'Text']`, used with `__('key')` |
| `config` | `app.php`, `db.php`, `mail.php` and `auth.php`. Every key can be overridden in `.env` |
| `routes/web.php` | The routes |
| `storage` | Logs and other files written by the app (not in git) |
| `public` | The web root: `index.php`, `.htaccess`, `favicon.ico` and `robots.txt` |

`public/robots.txt` blocks all crawlers by default. Change it before the site goes live.

## Development

```bash
composer test        # Pest: the pages through PHP's built-in server (needs .env)
composer lint        # Pint (PER coding style)
composer test:lint
```

`tests/ApacheTest.php` also checks the real Apache vhost at `http://easypack.test`, and is skipped when that host isn't reachable.

## License

MIT, see [LICENSE](LICENSE).
