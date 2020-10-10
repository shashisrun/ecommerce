<?php
namespace Boldstellar\Ecommerce;

use Illuminate\Support\ServiceProvider;

class EcommerceServiceProvider extends ServiceProvider{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'\routes\ecommerce_web_route.php');    
        $this->loadViewsFrom(__DIR__.'\views', 'ecommerce'); 
        $this->loadMigrationsFrom(__DIR__.'\database\migrations'); 
        $this->loadMigrationsFrom (__DIR__.'\database\seeders'); 
        $this->mergeConfigFrom( __DIR__.'/config/config.php', 'ecommerce');
        // $this->publishes([
        //     __DIR__.'/database/seeds/' => database_path('seeds'), 
        // ]);
    }

    public function register()
    {
        
    }

}