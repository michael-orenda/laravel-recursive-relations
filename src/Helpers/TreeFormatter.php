<?php

namespace MichaelOrenda\RecursiveRelations\Helpers;

class TreeFormatter
{
    public static function buildTree($node, $depth = null, $level = 1)
    {
        $children = [];

        foreach ($node->children as $child) {
            if (is_null($depth) || $level < $depth) {
                $children[] = self::buildTree($child, $depth, $level + 1);
            }
        }

        return [
            'id' => $node->id,
            'data' => $node,
            'children' => $children
        ];
    }
}
