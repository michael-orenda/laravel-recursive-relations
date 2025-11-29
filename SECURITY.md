# Security Policy

We take security seriously. If you discover a vulnerability in this project, please follow this policy to report it responsibly.

## Supported Versions

| Version | Status    |
| ------- | --------- |
| `1.0.x` | Supported |

When a version is no longer supported it will be mentioned in this file.

---

## Reporting a Vulnerability

If you believe you've found a security issue, **please do not create a public issue**. Instead, report it privately by emailing:

```
rminchrist@gmail.com
```

(If you don't have a dedicated security inbox, use your GitHub username DM or add an issue with the `private` option disabled — but private email is preferred.)

### Required information

When you report an issue, please include:

* A clear description of the vulnerability and its impact.
* Reproduction steps or a minimal proof-of-concept.
* A suggested fix (if possible).
* Affected versions.
* Your contact details (email) and a preferred timeline for disclosure.

---

## Security process

1. **Acknowledgement** — We will acknowledge your report within 72 hours.
2. **Triage** — We will assess severity and risk and attempt to reproduce the issue.
3. **Fix** — We will provide a fix in a timely manner and include tests where feasible.
4. **Disclosure** — Once a fix is available, we will coordinate public disclosure. We prefer coordinated disclosure to avoid exposing users.

---

## PGP / Encryption

If you would like to send a report encrypted, use the project's PGP key (if published). If no PGP key is published, you can request an ephemeral key by emailing the security contact.

---

## Timeline & Coordination

We aim to:

* Acknowledge within 72 hours
* Provide a patch or mitigation within 14 days for high severity issues (depending on complexity)
* Coordinate disclosure and publish an advisory with credit

If you are a security researcher and require a CVE, please indicate this in your report.

---

## Third-party dependencies

Security of third-party packages is important. Keep dependencies up-to-date and check `composer.lock` for known vulnerabilities using tools like `composer audit` or `Roave/SecurityAdvisories`.

---

## Disclosure FAQ

**Q: Do you accept public bug bounty reports?**
A: We don't operate a bounty program currently, but we will credit reporters in release notes unless you request anonymity.

**Q: Can I post a public issue?**
A: Please avoid public disclosure until a fix is available — contact the security email first.

---

*Last updated: 2025-11-29*
