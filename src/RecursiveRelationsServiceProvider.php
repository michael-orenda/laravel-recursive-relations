<?php

namespace MichaelOrenda\LaravelRecursiveRelations;

use Illuminate\Support\ServiceProvider;
use MichaelOrenda\LaravelRecursiveRelations\Services\RecursiveService;

class RecursiveRelationsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('recursive', function () {
            return new RecursiveService();
        });
    }
}
