<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Deploying to Vercel

This Laravel app runs through the `vercel-php` serverless runtime. Vercel builds the Vite assets into a dedicated static output directory so the legacy `public/index.html` cannot shadow Laravel's dynamic homepage.

1. Import the repository into Vercel and use the repository root as the project root.
2. Add these environment variables in Vercel for Production and Preview:
   - `APP_ENV=production`
   - `APP_DEBUG=false`
   - `APP_KEY` — generate locally with `php artisan key:generate --show` and add the result as a Vercel secret.
   - `APP_URL` — the deployed site's HTTPS URL.
   - `SESSION_DRIVER=cookie`
   - `CACHE_STORE=array`
   - `LOG_CHANNEL=stderr`
3. Deploy. `vercel.json` configures the PHP function, Laravel route rewrite, asset build, and static output.

Vercel's filesystem is ephemeral. Laravel uses `/tmp` for runtime-generated storage, and the language preference uses cookie-backed sessions. Do not use the bundled SQLite database for persistent data on Vercel; configure an external database and run migrations if deploying database-backed admin features.

The public portfolio does not require a database. Leave `DB_CONNECTION` unset unless you configure an external database for database-backed features. Do not set it to the literal value `null`; Laravel needs a valid connection driver.

If the deployment returns HTTP 500, check the Vercel Function Logs for the Laravel/PHP error. The repository's `.env` is intentionally excluded from deployment, so confirm `APP_KEY` is set in the Vercel project's Production environment (and redeploy after changing environment variables). Set `LOG_CHANNEL=stderr` to send Laravel errors to the function logs.

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
