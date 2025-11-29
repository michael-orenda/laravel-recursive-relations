<?php

namespace MichaelOrenda\LaravelRecursiveRelations\Services;

class RecursiveService
{
    public function getRoot($model)
    {
        return $model->root();
    }

    public function getAncestors($model)
    {
        return $model->ancestors();
    }

    public function getDescendants($model, $depth = null)
    {
        return $model->descendants($depth);
    }
}
