# API Documentation

This file documents all public APIs exposed by the package.

---

## Trait: `HasRecursiveRelations`

### children()
Returns direct children.

```php
$category->children;
```

### parent()
Returns direct parent.

```php
$category->parent;
```

### descendants(int|null $depth = null)
Recursively retrieves all descendants.

```php
$category->descendants();   // unlimited depth
$category->descendants(2);  // depth 2
```

### ancestors()
Returns all ancestors from nearest → root.

```php
$category->ancestors();
```

---

## Scopes Provided

### scopeRoots()
Returns items with `parent_id = null`.

### scopeLeaves()
Returns items with **no children**.

### scopeWithDescendants($depth = null)
Eager-load descendants.

---

## Configurable Keys

Override:

```php
protected static function recursiveConfig(): array
{
    return [
        'parent_key' => 'custom_parent',
        'local_key'  => 'id',
    ];
}
```

---

## Requirements

- Migration must include a parent key column.
  ```php
  $table->unsignedBigInteger('parent_id')->nullable()->index();
  ```

---

## Performance Notes

- Add `INDEX` to parent column.
- Avoid eager loading entire deep trees.
- Use caching for heavy categories/menus.

---

Last updated: 2025-11-29
