[![Latest Version on Packagist](https://img.shields.io/packagist/v/jalallinux/php-pm2.svg?style=flat-square)](https://packagist.org/packages/jalallinux/php-pm2)
[![Tests](https://github.com/jalallinux/php-pm2/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/jalallinux/php-pm2/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/jalallinux/php-pm2.svg?style=flat-square)](https://packagist.org/packages/jalallinux/php-pm2)
<!--delete-->
---
Manage pm2 process in php

## Installation

You can install the package via composer:

```bash
composer require jalallinux/php-pm2
```

## Usage

### Pm2

* Full name: \JalalLinuX\Pm2\Pm2

### list

```php
pm2()->list(): array
```

---
### link


```php
pm2()->link(string publicKey, string secretKey, string|null machineName = null): bool
```

**Parameters:**

| Parameter | Type        | Description |
|-----------|-------------|-------------|
| `publicKey` | **string**  ||
| `secretKey` | **string**  ||
| `machineName` | **?string** ||

---
### unlink

```php
pm2()->unlink(): bool
```

---
### start

```php
pm2()->start(string|null command = null, string|null name = null): bool
```

**Parameters:**

| Parameter | Type       | Description |
|-----------|------------|-------------|
| `command` | **?string** ||
| `name` | **?string** ||

---
### showBy

```php
pm2()->showBy(string key, string value): \JalalLinuX\Pm2\Structure\Process|null
```

**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `key` | **string** ||
| `value` | **string** ||

---
### kill

```php
pm2()->kill(): bool
```

---
### pid

```php
pm2()->pid(string name): int|null
```

**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `name` | **string** ||

---
### flush

```php
pm2()->flush(): bool
```

---
### update

```php
pm2()->update(): mixed
```

---
### stopAll

```php
pm2()->stopAll(): bool
```

---
### deleteAll

```php
pm2()->deleteAll(): bool
```

---
### stop

```php
pm2()->stop(string idOrName): bool
```

**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `idOrName` | **string** ||

---
### delete

```php
pm2()->delete(string idOrName): bool
```

**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `idOrName` | **string** ||

---
### save

```php
pm2()->save(bool force = true): bool
```

**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `force` | **bool** ||

---
### version

```php
pm2()->version(): string
```

---
### install

```php
pm2()->install(string version = 'latest'): false|string|null
```

**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `version` | **string** ||

---
### isInstall

```php
pm2()->isInstall(bool forceInstall = false, string version = 'latest'): bool
```


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [JalalLinuX](https://github.com/jalallinux)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
