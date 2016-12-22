<?php

    namespace Skydiver\RapydDashboard;

    use Illuminate\Foundation\AliasLoader;
    use Illuminate\Support\ServiceProvider;
    use Laravel\Socialite\Facades\Socialite;
    use Laravel\Socialite\SocialiteServiceProvider;
    use Thomaswelton\LaravelGravatar\Facades\Gravatar;
    use Thomaswelton\LaravelGravatar\LaravelGravatarServiceProvider;
    use Zofe\Rapyd\RapydServiceProvider;

    class RapydDashboardServiceProvider extends ServiceProvider {

        public function register() {

            # FACADES LOADER
            $loader = AliasLoader::getInstance();

            # LOAD "zofe/rapyd" PACKAGE
            $this->app->register(RapydServiceProvider::class);

            # LOAD "laravel/socialite" PACKAGE
            $this->app->register(SocialiteServiceProvider::class);
            $loader->alias('Socialite', Socialite::class);

            # LOAD "thomaswelton/laravel-gravatar" PACKAGE
            $this->app->register(LaravelGravatarServiceProvider::class);
            $loader->alias('Gravatar', Gravatar::class);

        }

        public function boot(\Illuminate\Routing\Router $router) {

            # REGISTER ROLES MIDDLEWARE
            $router->middleware('roles', 'Skydiver\RapydDashboard\Middleware\CheckRole');

            # PUBLISH CONFIG
            $this->publishes([__DIR__.'/../config/rapyd-dashboard.php' => config_path('rapyd-dashboard.php')], 'config');

            # MERGE APP + PACKAGE CONFIG
            $this->mergeConfigFrom( __DIR__.'/../config/rapyd-dashboard.php', 'rapyd-dashboard');

            # AdminLTE CONFIG
            $this->mergeConfigFrom( __DIR__.'/../config/AdminLTE.php', 'rapyd-dashboard::AdminLTE');

            # PUBLISH ASSETS
            $this->publishes([__DIR__.'/../public/assets' => public_path('packages/skydiver/rapyd-dashboard')], 'assets');

            # PUBLISH MIGRATIONS
            $this->publishes([__DIR__.'/../database/migrations/' => database_path('migrations')], 'migrations');

            # LOAD VIEWS
            $this->loadViewsFrom(__DIR__.'/../views', 'rapyd-dashboard');

            # PUBLIS ROUTES FILE
            $this->publishes([
                __DIR__.'/routes-blank.php' => base_path('/routes/routes-rapyd-dashboard.php'),
            ], 'routes');

            # LOAD ROUTES
            if(!$this->app->routesAreCached()) {
                require __DIR__.'/routes.php';
            }

            # LOAD APP ROUTES
            if(file_exists($file = base_path('/routes/routes-rapyd-dashboard.php'))) {
                include $file;
            } else {
                include __DIR__ . '/routes.php';
            }

        }

    }

?>