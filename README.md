# Laravel ITS LTE

Base Control Panel Templates

----------

## Installation

Run from the command line:

```bash
composer require fomvasss/laravel-its-lte
```

## Install

```bash
php artisan lte:install
```

That's all. You can usage ITS LTE in your project :) 

## Publishing (optional)
Of course, you can publish only the necessary system components:
- `lte-view-fields`
- `lte-view-content`
- `lte-view-auth`
- `lte-view-inc`
- `lte-view-layouts`

```bash
php artisan lte:publish --tag=lte-view-fields --force
```
or all components
```bash
php artisan lte:publish
```

## Structure
After installation, you can work with the following files:
- `config/its-lte.php` - configs
- `public/vendor/its-lte` - compiled assets files
- `resources/lang/vendor/lte` - message localization files
- `resources/views/vendor/lte`
    - `layouts`
    - `inc` - not published by default
    - `fields` - not published by default
    - `auth` - auth/register forms
    - `content` - example templates for content
And LFM (Laravel File Manager) files:
- `config/lfm.php`
- `public/vendor/laravel-filemanager`

## Usage
In dir `resources/views/vendor/lte` you can edit, create, delete blade-files.

## Links
- Frontend template [web-west/itslte](https://github.com/web-west/itslte)
- Official Admin LTE [ColorlibHQ/AdminLTE](https://github.com/ColorlibHQ/AdminLTE)
- LFM [laravel-filemanager](https://unisharp.github.io/laravel-filemanager/)