# Laravel 11 & 12 Compatibility Guide

## Overview

This document outlines all changes made to ensure full compatibility with Laravel 11 and 12 while maintaining backward compatibility with Laravel 10.

## PHP Requirements

Laravel 11 requires PHP 8.2 or higher, but to maintain compatibility with Laravel 10, this package supports:

- PHP 8.1 (minimum for Laravel 10)
- PHP 8.2 (recommended for Laravel 11)
- PHP 8.3 (latest stable)

## Laravel 12 Information

- **Release Date**: February 24, 2025
- **PHP Requirements**: 8.2, 8.3, 8.4
- **Bug Fixes Until**: August 13, 2026
- **Security Fixes Until**: February 4, 2027

## Key Changes for Laravel 11 & 12 Compatibility

### 1. Middleware Return Types

Laravel 11 requires middleware to have proper return type hints.

**Changed Files:**

- `src/Http/Middleware/H5PLangMiddleware.php`
- `src/Http/Middleware/QueryToken.php`

**Changes:**

```php
// Before
public function handle(Request $request, Closure $next)

// After
public function handle(Request $request, Closure $next): Response
```

**Why**: Laravel 11's middleware contract requires explicit return types for better type safety.

### 2. Service Provider Return Types

Service provider methods now include proper return type hints.

**Changed Files:**

- `src/HeadlessH5PServiceProvider.php`
- `src/AuthServiceProvider.php`

**Changes:**

```php
// Before
public function boot()
public function bootForConsole()

// After
public function boot(): void
public function bootForConsole(): void
```

**Why**: Laravel 11 and 12 enforce stricter type hints for service provider methods.

### 3. Migration Updates

All migrations have been updated for Laravel 10/11 compatibility.

**Changed Files:**

- All migration files in `database/migrations/`

**Changes:**

a) **Return Type Hints:**

```php
// Before
public function up()
public function down()

// After
public function up(): void
public function down(): void
```

b) **Deprecated Schema Methods:**

```php
// Before
Schema::drop('table_name');

// After
Schema::dropIfExists('table_name');
```

**Why**:

- Laravel 11 requires explicit return types in migrations
- `Schema::drop()` is deprecated in favor of `Schema::dropIfExists()`

### 4. PHPUnit Configuration

Updated PHPUnit configuration to version 10+ format.

**Changed Files:**

- `phpunit.xml`

**Key Changes:**

```xml
<!-- Before (PHPUnit 9) -->
<phpunit backupGlobals="false" ...>
  <testsuite>...</testsuite>
  <coverage>...</coverage>
</phpunit>

<!-- After (PHPUnit 10+) -->
<phpunit xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:noNamespaceSchemaLocation="https://schema.phpunit.de/10.5/phpunit.xsd"
         cacheDirectory=".phpunit.cache"
         ...>
  <testsuites>...</testsuites>
  <source>...</source>
</phpunit>
```

**Why**: Laravel 11 and 12 use PHPUnit 10+, requiring the new configuration format.

### 5. Dependency Updates

**composer.json Updates:**

```json
{
  "require": {
    "php": "^8.1|^8.2|^8.3|^8.4",
    "bensampo/laravel-enum": "^6.0",
    "laravel/framework": "^10.0|^11.0|^12.0"
  },
  "require-dev": {
    "phpunit/phpunit": "^10.5|^11.0",
    "orchestra/testbench": "^8.0|^9.0|^10.0"
  }
}
```

**Why Each Dependency Was Updated:**

1. **laravel/framework** (`^10.0|^11.0`)

   - Primary goal: Support latest Laravel versions
   - Removes support for Laravel 8 & 9

2. **bensampo/laravel-enum** (`^6.0`)

   - Version 6.x supports Laravel 10 & 11
   - Previous versions incompatible with Laravel 11

3. **orchestra/testbench** (`^8.0|^9.0`)

   - Version 8.x for Laravel 10
   - Version 9.x for Laravel 11
   - Essential for package testing

4. **phpunit/phpunit** (`^10.5|^11.0`)
   - Laravel 11 uses PHPUnit 10+
   - Required for test compatibility

## Backward Compatibility

### What's Maintained

✅ **Compatible with Laravel 10.x**

- All changes are compatible with both Laravel 10 and 11
- No Laravel 10-specific breaking changes

✅ **Database Migrations**

- Existing migrations work with both versions
- No data migration needed

✅ **API Endpoints**

- All endpoints remain unchanged
- No breaking API changes

✅ **Configuration**

- Config files remain compatible
- No configuration changes needed

### What's Not Maintained

❌ **Laravel 8 & 9**

- No longer supported
- Use version 1.x for Laravel 8/9

❌ **PHP 7.4 & 8.0**

- No longer supported
- Minimum PHP 8.1 required

## Testing Laravel 11 & 12 Features

### New Features Utilized

1. **Improved Type Safety**

   - All middleware and service providers use strict types
   - Better IDE support and autocomplete

2. **Modern Migration Syntax**

   - Using current best practices
   - Follows Laravel 11 conventions

3. **Updated Testing Framework**
   - PHPUnit 10+ features available
   - Better error reporting

## Common Issues & Solutions

### Issue 1: Type Error in Middleware

**Error:**

```
Return type of YourMiddleware::handle() should be compatible with Response
```

**Solution:**
All package middleware now properly returns `Response` type. If extending these classes, ensure your middleware also includes proper return types.

### Issue 2: Migration Warnings

**Error:**

```
Schema::drop() is deprecated
```

**Solution:**
The package now uses `Schema::dropIfExists()`. If you created custom migrations, update them accordingly.

### Issue 3: PHPUnit Configuration

**Error:**

```
PHPUnit configuration format is deprecated
```

**Solution:**
The package includes updated PHPUnit 10+ configuration. Use it as a reference for your own tests.

## Development Guidelines

When contributing to this package, follow these guidelines:

### Code Style

1. **Always use type hints:**

   ```php
   public function handle(Request $request, Closure $next): Response
   ```

2. **Use void for methods with no return:**

   ```php
   public function boot(): void
   ```

3. **Prefer explicit over implicit:**

   ```php
   // Good
   Schema::dropIfExists('table');

   // Avoid
   Schema::drop('table');
   ```

### Testing

1. **Test on both Laravel 10 and 11:**

   ```bash
   # Laravel 10
   composer require --dev "laravel/framework:^10.0"
   ./vendor/bin/phpunit

   # Laravel 11
   composer require --dev "laravel/framework:^11.0"
   ./vendor/bin/phpunit
   ```

2. **Test on multiple PHP versions:**
   - PHP 8.1
   - PHP 8.2
   - PHP 8.3

## Future Considerations

### Laravel 12 Preparation

When Laravel 12 is released, review these areas:

1. **New Framework Requirements**

   - Check minimum PHP version
   - Review new type requirements

2. **Deprecated Features**

   - Monitor Laravel deprecation notices
   - Update before features are removed

3. **New Features**
   - Evaluate new Laravel features
   - Consider adoption where beneficial

## Resources

- [Laravel 10 Upgrade Guide](https://laravel.com/docs/10.x/upgrade)
- [Laravel 11 Upgrade Guide](https://laravel.com/docs/11.x/upgrade)
- [PHPUnit 10 Migration Guide](https://docs.phpunit.de/en/10.5/migration.html)
- [PHP 8.1 New Features](https://www.php.net/releases/8.1/en.php)
- [PHP 8.2 New Features](https://www.php.net/releases/8.2/en.php)
- [PHP 8.3 New Features](https://www.php.net/releases/8.3/en.php)

## Summary

This package is now fully compatible with Laravel 10 and 11, following all modern best practices and conventions. All breaking changes have been documented, and upgrade paths are provided for existing users.

For questions or issues related to Laravel 11 compatibility, please open an issue on GitHub with the `laravel-11` label.
