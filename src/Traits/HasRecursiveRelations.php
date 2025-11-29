<?php

namespace MichaelOrenda\LaravelRecursiveRelations\Traits;

use Illuminate\Support\Collection;

trait HasRecursiveRelations
{
    /**
     * Parent relationship.
     */
    public function parent()
    {
        $config = static::recursiveConfig();

        return $this->belongsTo(
            static::class,
            $config['parent_key'],
            $config['local_key']
        );
    }

    /**
     * Children relationship.
     */
    public function children()
    {
        $config = static::recursiveConfig();

        return $this->hasMany(
            static::class,
            $config['parent_key'],
            $config['local_key']
        );
    }

    /**
     * Pure tree (nested hierarchy).
     *
     * Returns children, each child contains its own children,
     * but NO repetition at all, and NO flattening.
     */
    public function tree(?int $depth = null): Collection
    {
        return $this->buildTree($this, $depth);
    }

    /**
     * Recursive tree builder.
     */
    protected function buildTree($node, ?int $depth): Collection
    {
        // Stop if the depth limit is reached
        if (!is_null($depth) && $depth === 0) {
            return collect();
        }

        // Fetch children once
        $children = $node->children()->get();

        // Recursively attach children
        return $children->map(function ($child) use ($depth) {
            $child->setRelation(
                'children',
                $this->buildTree($child, is_null($depth) ? null : $depth - 1)
            );

            return $child;
        });
    }

    /**
     * Flat list of all descendants (no children loaded per node).
     * NOTE: This version is clean and does not produce duplicated trees.
     */
    public function descendants(?int $depth = null): Collection
    {
        $results = collect();
        $children = $this->children()->get();

        foreach ($children as $child) {
            $results->push($child);

            if (is_null($depth) || $depth > 1) {
                $results = $results->merge(
                    $child->descendants(
                        is_null($depth) ? null : $depth - 1
                    )
                );
            }
        }

        // Important: DO NOT load 'children' here — avoids tree duplication
        return $results;
    }

    /**
     * Ancestors (parent → grandparent → up to root).
     */
    public function ancestors(): Collection
    {
        $config = static::recursiveConfig();
        $parentKey = $config['parent_key'];

        $ancestors = collect();
        $current = $this->parent;

        while ($current) {
            $ancestors->push($current);
            $current = $current->parent;
        }

        return $ancestors;
    }

    /**
     * Return the top-most ancestor (the root of the tree).
     */
    public function root()
    {
        $node = $this;

        while ($node->parent) {
            $node = $node->parent;
        }

        return $node;
    }

    /**
     * Return the current node WITH its full nested children.
     *
     * Useful for API responses where the root must be included.
     */
    public function fullTree(?int $depth = null)
    {
        // clone to avoid overriding model state
        $root = clone $this;

        // attach nested children
        $root->setRelation('children', $this->tree($depth));

        return $root;
    }

    public function isRoot(): bool
    {
        return $this->parent === null;
    }

    /**
     * Default configuration.
     */
    protected static function recursiveConfig(): array
    {
        return [
            'parent_key' => 'parent_id',
            'local_key'  => 'id',
        ];
    }
}
