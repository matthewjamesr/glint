<?php
/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader
| for our application. We just need to utilize it! We'll require it
| into the script here so that we do not have to worry about the
| loading of any our classes "manually". Feels great to relax.
|
*/
require __DIR__ . '/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Bring in (env)
|--------------------------------------------------------------------------
|
| Quickly use our environment variables
|
*/
try {
    \Dotenv\Dotenv::createUnsafeImmutable(__DIR__)->load();
} catch (\Throwable $th) {
    trigger_error($th);
}

/*
|--------------------------------------------------------------------------
| Load application paths
|--------------------------------------------------------------------------
|
| Tell Leaf MVC Core where to locate application paths
|
*/
Leaf\Core::paths(PathsConfig());

/*
|--------------------------------------------------------------------------
| Attach blade view
|--------------------------------------------------------------------------
|
| Since blade no longer ships with Leaf by default, we
| can attach blade back to Leaf so you can use Leaf MVC
| as you've always used it.
|
*/
Leaf\View::attach(\Leaf\Blade::class);

/*
|--------------------------------------------------------------------------
| Initialise Leaf Core
|--------------------------------------------------------------------------
|
| Plant a seed, grow the stem and return Leaf🤷‍
|
*/
Leaf\Config::set(AppConfig());

/*
|--------------------------------------------------------------------------
| Default fix for CORS
|--------------------------------------------------------------------------
|
| This just prevents the connection client from throwing
| CORS errors at you.
|
*/
app()->cors(CorsConfig());

/*
|--------------------------------------------------------------------------
| Additional Leaf Database Config
|--------------------------------------------------------------------------
|
| Load leaf database configuration
|
*/
Leaf\Database::config(DatabaseConfig());

/*
|--------------------------------------------------------------------------
| Route Config
|--------------------------------------------------------------------------
|
| Require app routes.
|
*/
require __DIR__ . "/app/routes/index.php";

/*
|--------------------------------------------------------------------------
| Run Leaf Application
|--------------------------------------------------------------------------
|
| Require app routes
|
*/
app()->run();
