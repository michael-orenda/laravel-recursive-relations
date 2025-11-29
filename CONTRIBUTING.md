# Contributing Guidelines

Thank you for contributing!

---

## How to Contribute

1. Fork the repository
2. Create a feature branch  
   ```bash
   git checkout -b feature/my-feature
   ```
3. Make your changes
4. Add tests (Pest or PHPUnit)
5. Run checks:
   ```bash
   composer test
   composer lint
   composer analyse
   ```
6. Submit a Pull Request

---

## Code Style

- Follow PSR-12
- Use strict typing
- Prefer small, focused methods
- Add PHPDocs to public methods
- Keep model logic minimal

Recommended tools:
- PHPStan (level 6+)
- Pest
- laravel/pint for formatting

---

## Branching

- `main` = stable
- `feature/*` = new features
- `fix/*` = bug fixes

PR Checklist:
- [ ] Tests included
- [ ] No breaking changes
- [ ] Updated docs
- [ ] Clear description

---

## Tests

Run tests:

```bash
vendor/bin/pest
```

---

## Releases (Maintainers)

1. Update CHANGELOG
2. Tag version  
   ```bash
   git tag v1.x.x
   git push origin v1.x.x
   ```
3. Packagist auto-updates
