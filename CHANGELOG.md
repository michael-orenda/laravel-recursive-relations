# Changelog  
Laravel Recursive Relations Package

This project follows [Semantic Versioning](https://semver.org/) and the formatting style of [Keep a Changelog](https://keepachangelog.com/).

---

## [Unreleased]
### Added
- Improved recursive engine with clean `tree()` and `descendants()` separation.
- Added explicit nullable parameter types for PHP 8.2+ compatibility.
- Added optimized `buildTree()` for non-duplicated nested structures.
- Added support for Laravel **12+** auto-discovery.
- Added documentation improvements and clarified API behavior.
- Added `root()` ancestry resolution method.
- Added integration instructions for external packages (OrgUnit, Category, Menu, Filesystem, etc.).

### Changed
- Deprecated previous mixed-mode descendants method and replaced with clean flat version.
- Updated namespaces to `MichaelOrenda\LaravelRecursiveRelations`.
- Modernized package structure to Laravel package conventions for 2025.

### Fixed
- Removed repeated subtree loading when resolving children.
- Corrected deprecation warnings in PHP 8.3+.
- Ensured eager-loaded children no longer cause repeated recursion.

---

## [1.1.0] – 2025-11-29
### Added
- Introduced `tree()` method providing pure nested structure.
- Introduced clean `descendants()` returning flat lists.
- Added depth limiting support for
