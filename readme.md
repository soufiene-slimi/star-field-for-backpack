# Star Field for Backpack 4.1

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Build Status][ico-build]][link-build]
[![Quality Score][ico-score]][link-score]
[![Total Downloads][ico-downloads]][link-downloads]

This package provides a ```star``` field type for the [Backpack for Laravel](https://backpackforlaravel.com/) administration panel. The ```star``` field allows admins to **_change_ the value of a integer variable in order to rate the item, in a prettier way**. It uses a CSS-only solution, so it has zero external dependencies and zero javascript.

## Screenshots

![Backpack Star Field Addon](https://user-images.githubusercontent.com/10948245/79363306-a4a27980-7f3f-11ea-8f66-618f460ef3fc.PNG)

## Installation

Via Composer

``` bash
composer require soufiene-slimi/star-field-for-backpack
```

## Usage

Inside your custom CrudController:

```php
CRUD::addField([
    'view_namespace' => 'star-field-for-backpack::fields',
    'name' => 'rate',
    'type' => 'star',
    // 'label' => 'Rating', // (optional)
    // 'count' => 8, // (optional) the max rate count; default value is 5
    // 'default' => 6, // (optional) the default checked rate on new item creation
    // 'hint' => 'Cheer up!', // (optional)
    // 'options' => [ // (optional) customize the look
    //     'icon' => '★', // (optional) the default icon is ★
    //     'unchecked_color' => '#ccc', // (optional) the default value is #ccc
    //     'checked_color' => '#ffc700', // (optional) the default value is #ffc700
    //     'hover_color' => '#c59b08', // (optional) the default value is #c59b08
    // ],
]);
```

Notice the ```view_namespace``` attribute - make sure that is exactly as above, to tell Backpack to load the field from this _addon package_, instead of assuming it's inside the _Backpack\CRUD package_.


## Overwriting

If you need to change the field in any way, you can easily publish the file to your app, and modify that file any way you want. But please keep in mind that you will not be getting any updates.

**Step 1.** Copy-paste the blade file to your directory:
```bash
# create the fields directory if it's not already there
mkdir -p resources/views/vendor/backpack/crud/fields

# copy the blade file inside the folder we created above
cp -i vendor/soufiene-slimi/star-field-for-backpack/src/resources/views/fields/star.blade.php resources/views/vendor/backpack/crud/fields/star.blade.php
```

**Step 2.** Remove the vendor namespace wherever you've used the field:
```diff
$this->crud->addField([
-   'view_namespace' => 'star-field-for-backpack::fields'
    'name' => 'rate',
    'type' => 'star',
]);
```

**Step 3.** Uninstall this package. Since it only provides one file - ```star.blade.php```, and you're no longer using that file, it makes no sense to have the package installed:
```bash
composer remove soufiene-slimi/star-field-for-backpack
```


## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email [the author](composer.json) instead of using the issue tracker.

## Credits

- [Cristian Tabacitu](https://github.com/tabacitu) - created an example field type addon and shared it in [this repo](https://github.com/DigitallyHappy/toggle-field-for-backpack);
- [Soufiene Slimi](https://github.com/soufiene-slimi) - polish & packaging;
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/soufiene-slimi/star-field-for-backpack.svg
[ico-downloads]: https://img.shields.io/packagist/dt/soufiene-slimi/star-field-for-backpack.svg
[ico-score]: https://img.shields.io/scrutinizer/g/soufiene-slimi/star-field-for-backpack.svg
[ico-build]: https://scrutinizer-ci.com/g/soufiene-slimi/star-field-for-backpack/badges/build.png?b=master

[link-packagist]: https://packagist.org/packages/soufiene-slimi/star-field-for-backpack
[link-downloads]: https://packagist.org/packages/soufiene-slimi/star-field-for-backpack
[link-score]: https://scrutinizer-ci.com/g/soufiene-slimi/star-field-for-backpack
[link-build]: https://scrutinizer-ci.com/g/soufiene-slimi/star-field-for-backpack/build-status/master
[link-author]: https://github.com/soufiene-slimi
[link-contributors]: ../../contributors
