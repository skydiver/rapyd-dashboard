<?php

    namespace Skydiver\RapydDashboard;

    use Illuminate\Support\ServiceProvider;

    class RapydDashboardServiceProvider extends ServiceProvider {

        public function register() {

            //$this->registerRapydDashboardBuilder();
            //$this->app->alias('rapyd-dashboard', 'Skydiver\RapydDashboard\RapydDashboardBuilder');

            # FACADES LOADER
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();

            # LOAD "zofe/rapyd" PACKAGE
            $this->app->register(\Zofe\Rapyd\RapydServiceProvider::class);

            # LOAD "laravel/socialite" PACKAGE
            $this->app->register(\Laravel\Socialite\SocialiteServiceProvider::class);
            $loader->alias('Socialite', \Laravel\Socialite\Facades\Socialite::class);

        }

        public function boot() {

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
                __DIR__.'/routes-blank.php' => app_path('/Http/routes-rapyd-dashboard.php'),
            ], 'routes');

            # LOAD ROUTES
            if(!$this->app->routesAreCached()) {
                require __DIR__.'/routes.php';
            }

            # LOAD APP ROUTES
            if(file_exists($file = app_path('/Http/routes-rapyd-dashboard.php'))) {
                include $file;
            } else {
                include __DIR__ . '/routes.php';
            }

        }

/*
        protected function registerRapydDashboardBuilder() {
            $this->app->singleton('rapyd-dashboard', function($app) {
                return new registerRapydDashboardBuilder($app['url']);
            });
        }

        public function provides() {
            return array('rapyd-dashboard');
        }
*/

    }

?>