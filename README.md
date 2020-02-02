# Laravel ITS LTE

[![License](https://img.shields.io/packagist/l/fomvasss/laravel-its-lte.svg?style=for-the-badge)](https://packagist.org/packages/fomvasss/laravel-its-lte)
[![Build Status](https://img.shields.io/github/stars/fomvasss/laravel-its-lte.svg?style=for-the-badge)](https://github.com/fomvasss/laravel-its-lte)
[![Latest Stable Version](https://img.shields.io/packagist/v/fomvasss/laravel-its-lte.svg?style=for-the-badge)](https://packagist.org/packages/fomvasss/laravel-its-lte)
[![Total Downloads](https://img.shields.io/packagist/dt/fomvasss/laravel-its-lte.svg?style=for-the-badge)](https://packagist.org/packages/fomvasss/laravel-its-lte)
[![Quality Score](https://img.shields.io/scrutinizer/g/fomvasss/laravel-its-lte.svg?style=for-the-badge)](https://scrutinizer-ci.com/g/fomvasss/laravel-its-lte)

Base Admin LTE Control Panel Templates

![screenshot](public/img/screen.png)

----------

## Installation

Run from the command line:

```bash
composer require fomvasss/laravel-its-lte
```

```bash
php artisan lte:install
```

That's all. You can usage ITS LTE in your project :) 

Visit the path `http://your-site.local/lte` 


## Publishing (optional)
Of course, you can publish only the necessary system components:
- views:
`lte-view-fields`, `lte-view-content`, `lte-view-auth`, `lte-view-inc`, `lte-view-layouts`, `lte-view-account`, `lte-view-nodes`
- other:
`lte-config`, `lte-assets`, `lte-lang`

```bash
php artisan lte:publish --tag=lte-view-fields --force
```
or all components
```bash
php artisan lte:publish
```

### Updating 
When updating this package, you should re-publish the assets:
```bash
php artisan lte:publish --tag=lte-assets --force
```

## Configuration
After publishing assets, its primary configuration file will be located at `config/its-lte.php`
```php
<?php

return [

   'title' => 'LTE Dashboard',
   
   'logo' => env('LTE_LOGO', '<b>ITS</b>LTE'),

   'logo_mini' => env('LTE_LOGO_MINI', '<b>IT</b>LT'),

   'logo_href' => '/lte',

   'prefix' => 'lte',

   'middleware' => ['web'],

   'default' => [
	   'skin' => 'skin-yellow-light',
	   'layout_boxed' => false,
	   'sidebar_collapse' => false,
	   'fixed' => false,
   ]
];
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
    - `nodes` - example nodes: users, pages
    - `account` - user account form

### Laravel File Manager (v2)   
 
And LFM files:
- `config/lfm.php`
- `public/vendor/laravel-filemanager`
Recommend set LFM paths `config/lfm.php`:
```php
    'shared_folder_name' => 'shares',
    //...
    'folder_categories' => [
        'file' => [
            'folder_name' => 'lfm-files',
            //...
        ],
        'image' => [
            'folder_name' => 'lfm-photos',
            //...
        ],      
    ],
```

## Usage

In dir `resources/views/vendor/lte` you can edit, create, delete blade-files.

## Credits
- [web-west/itslte](https://github.com/web-west/itslte)
- [ColorlibHQ/AdminLTE](https://github.com/ColorlibHQ/AdminLTE)
- [laravel-filemanager](https://unisharp.github.io/laravel-filemanager/)