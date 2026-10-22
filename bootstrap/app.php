<?php

use Illuminate\Foundation\Application;

$app = new Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

if (isset($_ENV['VERCEL']) || isset($_SERVER['VERCEL']) || getenv('VERCEL') !== false) {
    $app->register(Illuminate\View\ViewServiceProvider::class);

    $storagePath = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'porot-storage';

    foreach (['app/private', 'app/public', 'framework/cache/data', 'framework/sessions', 'framework/views', 'logs'] as $directory) {
        $path = $storagePath . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $directory);

        if (! is_dir($path) && ! mkdir($path, 0755, true) && ! is_dir($path)) {
            throw new RuntimeException("Unable to create Vercel storage directory: {$path}");
        }
    }

    $app->useStoragePath($storagePath);
}

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

return $app;
