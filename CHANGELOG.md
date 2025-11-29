# Changelog

All notable changes to this project will be documented in this file.

The format follows [Keep a Changelog](https://keepachangelog.com/en/1.0.0/)  
and this project adheres to [Semantic Versioning](https://semver.org/).

---

## [Unreleased]
### Added
- Initial package bootstrap.
- `HasRecursiveRelations` trait with:
  - `children()`
  - `parent()`
  - `descendants()`
  - `ancestors()`
- Custom key configuration via `recursiveConfig()`.
- Query scopes: `roots()`, `leaves()`, `withDescendants()`.
- Service provider.
- Full documentation, API docs, contributing guide, security policy.

---

## [1.0.0] — 2025-11-29
### Added
- First stable release.
- Trait-based recursive tree relationship engine.
- Installation instructions & full README.
- Files:
  - `README.md`
  - `CONTRIBUTING.md`
  - `SECURITY.md`
  - `API_DOCS.md`
  - `LICENSE`

---

[Unreleased]: https://github.com/michael-orenda/laravel-recursive-relations/compare/v1.0.0...HEAD  
[1.0.0]: https://github.com/michael-orenda/laravel-recursive-relations/releases/tag/v1.0.0

