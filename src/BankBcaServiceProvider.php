<?php

namespace Riotinto\Bankbca;

use Bankbca\BcaHttp;
use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;

class BankBcaServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->setupConfig();
    }

    protected function setupConfig()
    {
        $source = realpath(__DIR__ . '/../config/bankbca.php');

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('bankbca.php')]);
        }

        $this->mergeConfigFrom($source, 'bankbca');
    }

    public function register()
    {
        $this->registerFactory();
        $this->registerManager();
        $this->registerBindings();
    }

    protected function registerFactory()
    {
        $this->app->singleton('bankbca.factory', function () {
            return new BankBcaFactory();
        });

        $this->app->alias('bankbca.factory', BankBcaFactory::class);
    }

    protected function registerManager()
    {
        $this->app->singleton('bankbca', function (Container $app) {
            $config  = $app['config'];
            $factory = $app['bankbca.factory'];
            return new BankBcaManager($config, $factory);
        });

        $this->app->alias('bankbca', BankBcaManager::class);
    }

    protected function registerBindings()
    {
        $this->app->bind('bankbca.connection', function (Container $app) {
            $manager = $app['bankbca'];

            return $manager->connection();
        });

        $this->app->alias('bankbca.connection', BcaHttp::class);
    }

    public function provides()
    {
        return [
            'bankbca',
            'bankbca.factory',
            'bankbca.connection',
        ];
    }
}