# Laravel Recursive Relations  
Powerful recursive parent–child relationships for Laravel **12+**

A lightweight, framework-native package for building hierarchical data structures such as:

- Organization Units  
- Categories & Subcategories  
- File Trees  
- Product & Menu Structures  
- Multi-level Comment Threads  
- Any recursive / tree-based domain  

---

## 🚀 Features

- **Pure nested tree output** via `tree()`
- **Flat descendant lists** via `descendants()`
- **Unlimited or depth-limited recursion**
- **Guaranteed no repetition / no duplicated nodes**
- **Automatic ancestry resolution** (`ancestors()`, `root()`)
- Optional caching layer via `HasRecursiveCache`
- Fully compatible with **Laravel 12+**
- Zero dependencies; Eloquent-powered
- Works with any model

---

## 📦 Installation

```bash
composer require michaelorenda/laravel-recursive-relations
```

Laravel will auto-discover the service provider.

---

## 🧩 Usage Example

### 1. Add the Trait

```php
use MichaelOrenda\LaravelRecursiveRelations\Traits\HasRecursiveRelations;

class Category extends Model
{
    use HasRecursiveRelations;

    protected $fillable = ['name', 'parent_id'];
}
```

### 2. Required Migration

```php
$table->unsignedBigInteger('parent_id')->nullable()->index();
```

---

## 🌳 Building Trees

### Pure Nested Tree

```php
$tree = Category::find(1)->tree();
```

Produces:

```json
[
  {
    "id": 2,
    "name": "Child",
    "children": [
      { "id": 7, "name": "Grandchild", "children": [] }
    ]
  }
]
```

✔️ No duplication  
✔️ No repeated branches  
✔️ Perfect hierarchy  

### Flat Descendants

```php
$flat = Category::find(1)->descendants();
```

---

## 🔗 Ancestry Tools

```php
$node->parent;
$node->children;
$node->ancestors(); 
$node->root();
```

---

## ⚙️ Customizing Keys

```php
protected static function recursiveConfig(): array
{
    return [
        'parent_key' => 'parent_unit_id',
        'local_key'  => 'unit_id',
    ];
}
```

---

## 📚 API Documentation

See [`API_DOCS.md`](API_DOCS.md)

---

## 🔐 Security

See [`SECURITY.md`](SECURITY.md)

---

## 🤝 Contributing

PRs welcome! Follow PSR-12 and include tests.

---

## 📄 License

MIT — Free for personal and commercial use.

---

_Last updated: 2025-11-29_
