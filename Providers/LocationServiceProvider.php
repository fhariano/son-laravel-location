<?php

namespace Modules\Location\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\Location\Location;

class LocationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Route::middleware(['web'])
            ->group(__DIR__ . '/../Routes/web.php');
    }

    public function register()
    {
        // Nome_do_Pacote.nome_da_classe
        $this->app->singleton('Location.location', function ($app) {
            // Se quiser trazer alguma configuração podemos usar por exemplo:
            //      $config = $app['config']->get('pages.home');
            // ou como usamos em PagesController.php
            //      $config = config('pages.home');
            return new Location('pt-br');
        });
    }
}
