# Upgrade Guide

## Upgrading to Laravel 10, 11 & 12 Support

This package has been updated to support Laravel 10, 11, and 12 (latest). Below are the changes made and upgrade instructions.

### Requirements

The minimum requirements have been updated:

- **PHP**: 8.1, 8.2, 8.3, or 8.4 (previously 7.4+)
- **Laravel**: 10.x, 11.x, or 12.x (previously 8.x or 9.x)
- **PHPUnit**: 10.5 or 11.0 (previously 9.0)

> **Note for Laravel 12**: Laravel 12 requires PHP 8.2 as minimum. If you're using Laravel 12, ensure you're on PHP 8.2+.

### Breaking Changes

#### 1. PHP Version Requirement

The minimum PHP version is now **8.1**. If you're using PHP 7.4 or 8.0, you must upgrade to at least PHP 8.1.

#### 2. Laravel Version

The package now supports Laravel 10.x, 11.x, and 12.x (latest). Laravel 8.x and 9.x are no longer supported.

### Upgrade Steps

#### For Existing Applications

1. **Update PHP Version**

   ```bash
   # Ensure you're running PHP 8.1 or higher
   php -v
   ```

2. **Update Laravel**

   If you're currently on Laravel 8 or 9, follow the official Laravel upgrade guides:

   - [Laravel 10 Upgrade Guide](https://laravel.com/docs/10.x/upgrade)
   - [Laravel 11 Upgrade Guide](https://laravel.com/docs/11.x/upgrade)
   - [Laravel 12 Upgrade Guide](https://laravel.com/docs/12.x/upgrade)

3. **Update Composer Dependencies**

   Update your `composer.json`:

   ```json
   {
     "require": {
       "adityaricki/laravel-h5p": "^2.0"
     }
   }
   ```

4. **Run Composer Update**

   ```bash
   composer update adityaricki/laravel-h5p
   ```

5. **Clear Cache**

   ```bash
   php artisan config:clear
   php artisan cache:clear
   php artisan route:clear
   php artisan view:clear
   ```

6. **Run Migrations** (if needed)
   ```bash
   php artisan migrate
   ```

### What Changed

#### Dependencies Updated

- `laravel/framework`: `^8|^9` → `^10.0|^11.0|^12.0`
- `php`: `>=7.4` → `^8.1|^8.2|^8.3|^8.4`
- `bensampo/laravel-enum`: `>=2.0` → `^6.0`
- `phpunit/phpunit`: `^9.0` → `^10.5|^11.0`
- `orchestra/testbench`: `^6.0` → `^8.0|^9.0|^10.0`

#### Code Changes

1. **Middleware Return Types**

   - Added `Response` return type to middleware `handle()` methods
   - Updated PHPDoc blocks for better IDE support

2. **Service Provider Return Types**

   - Added `void` return type to `boot()` and `bootForConsole()` methods

3. **Migration Updates**

   - Replaced deprecated `Schema::drop()` with `Schema::dropIfExists()`
   - Added return type hints (`void`) to `up()` and `down()` methods
   - Removed `@return void` PHPDoc annotations (redundant with return type hints)

4. **PHPUnit Configuration**
   - Updated `phpunit.xml` to PHPUnit 10+ format
   - Changed XML schema to PHPUnit 10.5
   - Updated coverage configuration structure

### Compatibility Matrix

| Package Version | Laravel Version  | PHP Version         | PHPUnit Version |
| --------------- | ---------------- | ------------------- | --------------- |
| 1.x             | 8.x, 9.x         | 7.4+                | 9.0             |
| 2.x             | 10.x, 11.x, 12.x | 8.1+ (8.2+ for L12) | 10.5, 11.0      |

> **Important**: While this package supports PHP 8.1+ for Laravel 10/11, Laravel 12 specifically requires PHP 8.2 or higher.

### Testing

After upgrading, run your test suite:

```bash
php artisan test
# or
vendor/bin/phpunit
```

### Troubleshooting

#### Issue: "Class 'BenSampo\Enum\Enum' not found"

**Solution**: Clear composer autoload and reinstall dependencies

```bash
composer dump-autoload
rm -rf vendor
composer install
```

#### Issue: Migration errors

**Solution**: Clear cached config and run migrations fresh

```bash
php artisan config:clear
php artisan migrate:fresh
```

#### Issue: PHPUnit configuration errors

**Solution**: The package now uses PHPUnit 10+ format. Ensure your application is also using compatible PHPUnit version.

### Need Help?

If you encounter any issues during the upgrade process:

1. Check the [Laravel upgrade guides](https://laravel.com/docs/11.x/upgrade)
2. Review the [breaking changes](#breaking-changes) section
3. Open an issue on the [GitHub repository](https://github.com/adityaricki/laravel-h5p/issues)

### Rollback

If you need to rollback to the previous version:

```bash
composer require adityaricki/laravel-h5p:^1.0
```

Note: Version 1.x only supports Laravel 8 and 9 with PHP 7.4+.
