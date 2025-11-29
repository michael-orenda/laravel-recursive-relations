# Recursive Relations for Laravel

A lightweight Laravel package that adds **recursive parent–child relationships** to any Eloquent model.  
Use it for:
- Categories  
- Menus  
- Departments  
- Organizational units  
- Nested structures  
- Multi-level hierarchies

---

## Features
- Plug-and-play trait (`HasRecursiveRelations`)
- `children`, `parent`, `descendants`, `ancestors`
- Custom parent key/local key support
- Unlimited recursion depth
- Optional depth limiting
- Query scopes for roots & leaves
- Efficient traversal and eager loading

---

## Installation

```bash
composer require michael-orenda/recursive-relations
```

If using private SSH repo:

```json
"repositories": [
    {
        "type": "vcs",
        "url": "git@github.com:michael-orenda/laravel-recursive-relations.git"
    }
]
```

Then:

```bash
composer require michael-orenda/recursive-relations:dev-main
```

---

## Usage

### 1. Add the trait

```php
use MichaelOrenda\RecursiveRelations\Traits\HasRecursiveRelations;

class Category extends Model
{
    use HasRecursiveRelations;
}
```

### 2. Migration

```php
$table->unsignedBigInteger('parent_id')->nullable()->index();
```

---

## Examples

### Creating a tree

```php
$root = Category::create(['name' => 'Electronics']);
$phones = $root->children()->create(['name' => 'Phones']);
$phones->children()->create(['name' => 'Smartphones']);
```

### Getting descendants

```php
$root->descendants();        // all levels
$root->descendants(1);       // direct children only
```

### Getting ancestors

```php
$smartphones->ancestors();   // Smartphones → Phones → Electronics
```

### Eager loading

```php
Category::with('children.children')->get();
```

---

## Advanced: Custom keys

```php
protected static function recursiveConfig(): array
{
    return [
        'parent_key' => 'parent_category_id',
        'local_key'  => 'id',
    ];
}
```

---

## API Documentation
See [`API_DOCS.md`](API_DOCS.md)

---

## Contributing
See [`CONTRIBUTING.md`](CONTRIBUTING.md)

---

## Security
See [`SECURITY.md`](SECURITY.md)

---

## License
MIT — see `LICENSE`

