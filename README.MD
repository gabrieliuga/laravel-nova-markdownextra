# Laravel nova Markdown extended
[![StyleCI](https://github.styleci.io/repos/327337284/shield?branch=master)](https://github.styleci.io/repos/327337284?branch=master)


Allows you to paste images from clipboard straight into the markdown editor


## Installation

You can install the package via composer:

```bash
composer require gabrieliuga/laravel-nova-markdownextra
```

## Usage
``` php
<?php

namespace App\Nova;

use Gabrieliuga\Markdownextra\MarkdownExtra;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;


class Blog extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Blog::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            Text::make('Title'),
            MarkdownExtra::make('Content')
        ];
    }
...

```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email me@iuga.dev instead of using the issue tracker.

## Credits

- [Gabriel Iuga](https://github.com/gabrieliuga)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
