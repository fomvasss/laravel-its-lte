# Laravel ITS LTE

Base Control Panel Templates

----------

## Installation

---
### Using own repository
In your `composer.json` add `repositories` section:
```json
{
//...
"repositories": [
    {
        "type": "vcs",
        "url": "git@gitlab.com:its-dev-first/info/packages/laravel/its-lte.git"
    }
]
}
```
---

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
- `lte-view-fields`
- `lte-view-content`
- `lte-view-auth`
- `lte-view-inc`
- `lte-view-layouts`
- `lte-config`
- `lte-assets`
- `lte-lang`

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

    'title' => 'Панель управления',

    'logo' => '<b>ITS</b>LTE',

    'logo_mini' => '<b>IT</b>LT',

    'logo_url' => '/lte',

    'prefix' => 'lte',

    'middleware' => ['web'],

    'default' => [
        'skin' => 'skin-yellow-light',
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
And LFM (Laravel File Manager) files:
- `config/lfm.php`
- `public/vendor/laravel-filemanager`

## Usage

In dir `resources/views/vendor/lte` you can edit, create, delete blade-files.

## Credits
- [web-west/itslte](https://github.com/web-west/itslte)
- [ColorlibHQ/AdminLTE](https://github.com/ColorlibHQ/AdminLTE)
- [laravel-filemanager](https://unisharp.github.io/laravel-filemanager/)