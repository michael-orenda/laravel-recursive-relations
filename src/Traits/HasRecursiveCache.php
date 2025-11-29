<?php

namespace MichaelOrenda\LaravelRecursiveRelations\Traits;

trait HasRecursiveCache
{
    public static function bootHasRecursiveCache()
    {
        static::saved(function ($model) {

            // Prevent infinite update loops
            if ($model->isDirty('root_id') || $model->isDirty('depth') || $model->isDirty('path')) {
                return;
            }

            // ===== ROOT ID =====
            $root = $model->root();
            $model->root_id = $root->id;

            // ===== DEPTH =====
            $ancestors = $model->ancestors();
            $model->depth = $ancestors->count();

            // ===== PATH =====
            $model->path = collect([
                ...$ancestors->reverse()->pluck('id')->toArray(),
                $model->id
            ])->implode('/');

            // Save without triggering recursion
            $model->saveQuietly();
        });
    }
}
