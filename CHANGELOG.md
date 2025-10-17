# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [2.0.0] - 2025-10-16

### Added

- Support for Laravel 10.x
- Support for Laravel 11.x
- Support for Laravel 12.x (latest - released Feb 24, 2025)
- Support for PHP 8.1, 8.2, 8.3, and 8.4
- Return type hints to middleware methods for Laravel 11+ compatibility
- Return type hints to service provider methods
- UPGRADE.md file with detailed upgrade instructions
- CHANGELOG.md file for tracking changes

### Changed

- **BREAKING**: Minimum PHP version updated from 7.4 to 8.1 (PHP 8.2+ required for Laravel 12)
- **BREAKING**: Laravel framework requirement updated from `^8|^9` to `^10.0|^11.0|^12.0`
- Updated `bensampo/laravel-enum` from `>=2.0` to `^6.0`
- Updated `phpunit/phpunit` from `^9.0` to `^10.5|^11.0`
- Updated `orchestra/testbench` from `^6.0` to `^8.0|^9.0|^10.0`
- Updated PHPUnit configuration to PHPUnit 10+ format
- Replaced deprecated `Schema::drop()` with `Schema::dropIfExists()` in all migrations
- Added return type hints (`void`) to all migration methods
- Updated middleware to include proper return type hints (`Response`)
- Updated service providers to include proper return type hints (`void`)
- Improved PHPDoc blocks for better IDE support
- Updated README.md with new requirements section

### Removed

- **BREAKING**: Support for Laravel 8.x
- **BREAKING**: Support for Laravel 9.x
- **BREAKING**: Support for PHP 7.4 and 8.0
- Redundant `@return void` PHPDoc annotations (replaced with return type hints)

### Fixed

- Deprecated PHPUnit configuration format
- Deprecated Schema methods in migrations
- Missing return type hints for Laravel 11+ compatibility

### Notes

- **Laravel 12 Information**:
  - Released: February 24, 2025
  - Minimum PHP: 8.2 (supports up to 8.4)
  - Bug fixes until: August 13, 2026
  - Security fixes until: February 4, 2027
- Package supports PHP 8.1+ for backward compatibility with Laravel 10/11
- When using Laravel 12, ensure PHP 8.2 or higher is installed

## [1.0.0] - Previous Release

### Initial Release

- Support for Laravel 8.x and 9.x
- Support for PHP 7.4+
- H5P content management
- H5P library management
- Headless H5P API
- File upload and storage
- Content editing and playback
- Database migrations
- Factories and seeders

---

## Upgrade Guide

For detailed upgrade instructions, please refer to [UPGRADE.md](UPGRADE.md).

## Migration from Version 1.x to 2.x

**Important Notes:**

1. **PHP Upgrade Required**: You must upgrade to at least PHP 8.1 (8.2+ for Laravel 12)
2. **Laravel Upgrade Required**: You must upgrade to at least Laravel 10
3. **Breaking Changes**: Review the [UPGRADE.md](UPGRADE.md) file carefully
4. **Dependencies**: All dependencies have been updated for compatibility

**Quick Upgrade Steps:**

```bash
# 1. Upgrade PHP to 8.1 or higher (8.2+ for Laravel 12)
# 2. Upgrade Laravel to 10, 11, or 12
# 3. Update composer.json
composer require adityaricki/laravel-h5p:^2.0

# 4. Clear cache
php artisan config:clear
php artisan cache:clear

# 5. Run migrations if needed
php artisan migrate
```

For more information, see [UPGRADE.md](UPGRADE.md).
