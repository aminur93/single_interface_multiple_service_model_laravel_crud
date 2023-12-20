<?php

namespace App\Repository;

use App\Repository\Crud\CrudInterface;
use App\Repository\Crud\CrudRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {

    public function register()
    {
        // Bind CrudInterface to CrudRepository with Category model
        $this->app->bind(CrudInterface::class, function ($app) {
            return new CrudRepository($app->make('App\Models\Category'));
        });

        $this->app->bind(CrudInterface::class, function ($app) {
            return new CrudRepository($app->make('App\Models\Brand'));
        });

        $this->app->bind(CrudInterface::class, function ($app) {
            return new CrudRepository($app->make('App\Models\Product'));
        });
    }
}