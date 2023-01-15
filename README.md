<div align="center">

<a href="https://github.com/Unitech/pm2">  
    <p align="center"><img src=".github/pm2-logo.png" width="100%"></p>
</a> 

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jalallinux/php-pm2.svg?style=flat-square)](https://packagist.org/packages/jalallinux/php-pm2)
[![Tests](https://github.com/jalallinux/php-pm2/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/jalallinux/php-pm2/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/jalallinux/php-pm2.svg?style=flat-square)](https://packagist.org/packages/jalallinux/php-pm2)

## Use and Manage **PM2** in php

</div>

## Installation

You can install the package via composer:

```bash
composer require jalallinux/php-pm2
```

## Usage

### Pm2

* Full name: \JalalLinuX\Pm2\Pm2

### list [:question:](https://pm2.keymetrics.io/docs/usage/quick-start/#list-managed-applications)
Fetch list all running applications
```php
pm2()->list(string $sortField = 'name', bool $desc = true): array<Process>
```

**Parameters:**

| Parameter | Type       | Description                                             |
|-----------|------------|---------------------------------------------------------|
| `sortField` | **string** | Sort field: `name, id, pid, memory, cpu, status, uptime` |
| `desc` | **bool**   | Sort order is descending |


---
### link [:question:]()
Connect your server to your dashboard and start collecting metrics
```php
pm2()->link(string $publicKey, string $secretKey, string|null $machineName = null): bool
```

**Parameters:**

| Parameter | Type        | Description                   |
|-----------|-------------|-------------------------------|
| `publicKey` | **string**  | PM2 account `PUBLIC_KEY` |
| `secretKey` | **string**  | PM2 account `SECRET_KEY` |
| `machineName` | **?string** | Machine name on the dashboard |

---
### unlink [:question:]()
Disconnect your server from your metrics dashboard
```php
pm2()->unlink(): bool
```

---
### start [:question:](https://pm2.keymetrics.io/docs/usage/quick-start/#start-an-app)
Start command with specifics options or start a `ecosystem.config.js`
```php
pm2()->start(string $command = null, array $options = []): bool
```

**Parameters:**

| Parameter | Type       | Description |
|-----------|------------|-------------|
| `command` | **?string** | Command to run in pm2 |
| `options` | **array** | Options to start pm2 command [Guide](https://pm2.keymetrics.io/docs/usage/quick-start/#start-an-app) like `['name' => 'process-1', 'no-autorestart']` |

---
### findBy [:question:](https://pm2.keymetrics.io/docs/usage/process-management/#showing-application-metadata)
Find specific process
```php
pm2()->findBy(string $key, string $value): \JalalLinuX\Pm2\Structure\Process|null
```

**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `key` | **string** | Key of property to find process |
| `value` | **string** | Value of key |

---
### kill
kill daemon
```php
pm2()->kill(): bool
```

---
### pid
Fetch pid of specific process
```php
pm2()->pid(string $name): int|null
```

**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `name` | **string** | Name of process |

---
### flush [:question:](https://pm2.keymetrics.io/docs/usage/log-management/#flushing-logs)
Empty all log files
```php
pm2()->flush(): bool
```

---
### update [:question:](https://pm2.keymetrics.io/docs/usage/update-pm2/#process-to-update-pm2)
Update in memory pm2
```php
pm2()->update(): mixed
```

---
### stopAll [:question:](https://pm2.keymetrics.io/docs/usage/process-management/#stop)
Stop all processes
```php
pm2()->stopAll(): bool
```

---
### restartAll [:question:](https://pm2.keymetrics.io/docs/usage/process-management/#restart)
Restart all processes
```php
pm2()->restartAll(): bool
```

---
### deleteAll [:question:](https://pm2.keymetrics.io/docs/usage/process-management/#delete)
Will stop and delete all processes from pm2 list
```php
pm2()->deleteAll(): bool
```

---
### stop [:question:](https://pm2.keymetrics.io/docs/usage/process-management/#stop)
Stop specific process
```php
pm2()->stop(string $idOrName): bool
```

**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `idOrName` | **string** | Id or name of process|

---
### restart [:question:](https://pm2.keymetrics.io/docs/usage/process-management/#restart)
Restart specific process
```php
pm2()->restart(string $idOrName): bool
```

**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `idOrName` | **string** | Id or name of process|

---
### delete [:question:](https://pm2.keymetrics.io/docs/usage/process-management/#delete)
Delete specific process
```php
pm2()->delete(string $idOrName): bool
```

**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `idOrName` | **string** | Id or name of process |

---
### save [:question:](https://pm2.keymetrics.io/docs/usage/startup/#saving-the-app-list-to-be-restored-at-reboot)
Freeze a process list for automatic respawn
```php
pm2()->save(bool $force = true): bool
```

**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `force` | **bool** | Force save list |

---
### logOut [:question:](https://pm2.keymetrics.io/docs/usage/log-management/#log-views)
Display all processes output logs
```php
pm2()->logOut(string $idOrName = null, int $lines = 100): string
```

**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `idOrName` | **?string** | Id or name of process |
| `lines` | **int** | To dig in older logs |

---
### logErr [:question:](https://pm2.keymetrics.io/docs/usage/log-management/#log-views)
Display all processes error logs
```php
pm2()->logErr(string $idOrName = null, int $lines = 100): string
```

**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `idOrName` | **?string** | Id or name of process |
| `lines` | **int** | To dig in older logs |

---
### startup [:question:](https://pm2.keymetrics.io/docs/usage/quick-start/#setup-startup-script)
Generate an active startup script
```php
pm2()->startup(): bool
```

---
### version [:question:]()
Fetch installed pm2 version
```php
pm2()->version(): string
```

---
### install [:question:](https://pm2.keymetrics.io/docs/usage/update-pm2/#process-to-update-pm2)
Install **PM2** (Requirements: `node`, `npm`)
```php
pm2()->install(string $version = 'latest'): false|string|null
```

**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `version` | **string** | Specific version |

---
### isInstall
Check if the **PM2** is installed
```php
pm2()->isInstall(bool $forceInstall = false, string $version = 'latest'): bool
```

**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `forceInstall` | **bool** | Install pm2 if is not installed |
| `version` | **string** | Specific version |


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [JalalLinuX](https://github.com/jalallinux)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
