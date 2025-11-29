<?php

namespace MichaelOrenda\RecursiveRelations;

use Illuminate\Support\ServiceProvider;
use MichaelOrenda\RecursiveRelations\Services\RecursiveService;

class RecursiveRelationsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('recursive', function () {
            return new RecursiveService();
        });
    }
}
