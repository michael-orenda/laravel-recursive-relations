<?php

namespace MichaelOrenda\RecursiveRelations\Traits;

use Illuminate\Support\Collection;

trait HasRecursiveRelations
{
    public static function bootHasRecursiveRelations()
    {
        static::saving(function ($model) {
            if (empty($model->{$model->getParentColumn()})) {
                $model->{$model->getParentColumn()} = null;
            }
        });
    }

    public function parent()
    {
        return $this->belongsTo(static::class, $this->getParentColumn());
    }

    public function children()
    {
        return $this->hasMany(static::class, $this->getParentColumn());
    }

    public function ancestors()
    {
        $ancestors = collect([]);
        $current = $this;

        while ($current->parent) {
            $ancestors->push($current->parent);
            $current = $current->parent;
        }

        return $ancestors;
    }

    public function root()
    {
        $current = $this;
        while ($current->parent) {
            $current = $current->parent;
        }
        return $current;
    }

    public function descendants(int $depth = null): Collection
    {
        return $this->getDescendants($this, $depth);
    }

    private function getDescendants($node, $depth = null, $level = 1)
    {
        $descendants = collect();

        foreach ($node->children as $child) {
            $descendants->push($child);

            if (is_null($depth) || $level < $depth) {
                $descendants = $descendants->merge(
                    $this->getDescendants($child, $depth, $level + 1)
                );
            }
        }

        return $descendants;
    }

    public function getParentColumn()
    {
        return property_exists($this, 'parentColumn')
            ? $this->parentColumn
            : 'parent_id';
    }
}
