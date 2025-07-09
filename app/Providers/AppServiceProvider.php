<?php

namespace App\Providers;

use App\Broadcasting\Broadcasters\MercureBroadcaster;
use Illuminate\Broadcasting\BroadcastManager;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Symfony\Component\Mercure\Hub;
use Symfony\Component\Mercure\Jwt\StaticTokenProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Livewire::useScriptTagAttributes([
            'data-mercure-url' => url('/.well-known/mercure'),
        ]);

        $this->app
            ->make(BroadcastManager::class)
            ->extend('mercure', function ($app, array $config) {
                return new MercureBroadcaster(
                    new Hub(
                        $config['url'],
                        new StaticTokenProvider($app->make('mvanduijker.mercure_broadcaster.publisher_jwt'))
                    )
                );
            });
    }
}
