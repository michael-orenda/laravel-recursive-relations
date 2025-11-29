# Security Policy  
Laravel Recursive Relations Package

---

## Supported Versions

| Version | Status |
|--------|---------|
| 1.1.x  | Fully Supported |
| 1.0.x  | Security fixes only |

---

## Reporting a Vulnerability

Please report security issues **privately**.

Email:

```
security@michael-orenda.dev
```

Do **not** open a public GitHub issue for security concerns.

Include where possible:

- Vulnerability description  
- Steps to reproduce  
- Severity estimate  
- Laravel version  
- PHP version  
- Suggested patch (optional)  

---

## Disclosure Process

1. Acknowledge within 48–72 hours  
2. Validate and reproduce the issue  
3. Patch or respond within 14 days  
4. Publish advisory after coordinated release  

Researchers may request CVE attribution.

---

## Security Best Practices

- Use indexed parent keys  
- Prevent cycles in parent-child assignments  
- Validate parent belongs to same tree (if domain requires)  
- Lock down write operations in production  

---

_Last updated: 2025-11-29_
