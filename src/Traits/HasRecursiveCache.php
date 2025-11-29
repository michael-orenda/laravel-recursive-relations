<?php

namespace MichaelOrenda\RecursiveRelations\Traits;

trait HasRecursiveCache
{
    public static function bootHasRecursiveCache()
    {
        static::saving(function ($model) {
            $root = $model->root();
            $model->root_id = $root->id ?? $model->id;

            $ancestors = $model->ancestors();
            $model->depth = $ancestors->count();
            $model->path = $ancestors->reverse()->pluck('id')->implode('/') . '/' . $model->id;
        });
    }
}
