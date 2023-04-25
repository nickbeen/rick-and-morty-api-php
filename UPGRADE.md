# Upgrade Guide

- [Upgrading to 2.0 from 1.x](#upgrading-to-2.0-from-1.x)

## High Impact Changes

- [Update dependencies](#update-dependencies)
- [Update enumerations](#update-enumerations)

## Upgrading to 2.0 from 1.x

### Update dependencies

**Likelihood Of Impact: High**

#### PHP 8.1 required

This package now requires PHP 8.1.0 or greater.

#### Composer dependencies

Update the following dependency in your application's `composer.json` file:

- `nickbeen/rick-and-morty-api-php` to `^2.0`

In addition, this will remove the `myclabs/php-enum` dependency as PHP 8.1 adds support for native enumerations.

### Update enumerations

**Likelihood Of Impact: High**

Existing references to either the `Gender` or `Status` object need to be replaced by their new Enumeration object.
Enum cases are in PascalCase styling as recommended by [PER Coding Style 2.0](https://www.php-fig.org/per/coding-style/).

#### Gender object

| Old value in 1.0     | New value in 2.0   |
| -------------------- | ------------------ |
| Gender::FEMALE()     | Gender::Female     |
| Gender::GENDERLESS() | Gender::Genderless |
| Gender::MALE()       | Gender::Male       |
| Gender::UNKNOWN()    | Gender::Unknown    |

#### Status object

| Old value in 1.0  | New value in 2.0 |
| ----------------- | ---------------- |
| Status::ALIVE()   | Status::Alive    |
| Status::DEAD()    | Status::Dead     |
| Status::UNKNOWN() | Status:: Unknown |
