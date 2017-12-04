<p align="center"><h1>Profanity</h1></p>

<p align="center">
<a href="https://styleci.io/repos/92664523"><img src="https://styleci.io/repos/92664523/shield?branch=master&style=flat" alt="StyleCI Status"></a>
<a href="https://styleci.io/repos/69124179"><img src="https://img.shields.io/badge/Built_for-PHP-blue.svg" alt="Build For PHP"></a>
<a href="https://packagist.org/packages/consoletvs/profanity"><img src="https://poser.pugx.org/consoletvs/profanity/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/consoletvs/profanity"><img src="https://poser.pugx.org/consoletvs/profanity/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/consoletvs/profanity"><img src="https://poser.pugx.org/consoletvs/profanity/license.svg" alt="License"></a>
</p>

## What is Profanity?

Profanity is a PHP library that allows blocking bad words out of a given string. It currently
blocks more than 2.555 words in different languages. It's very easy to use and can filter a
100 chars string in about 0.0021 seconds!

## Sample Filter

This example is a simple string that is going to be filtered using this library.

```php
$clean_words = Profanity::blocker('My cool string bitch')->filter()

// My cool string *****
```

## Documentation

### Installation

First, require it using composer:

```
composer require consoletvs/profanity
```

#### Laravel

To install it on laravel, simply add the service provider and the alias in ```config/app.php```:

Service Provider:

```php
ConsoleTVs\Profanity\ProfanityServiceProvider::class,
```

Alias (optional):

```php
'Profanity' => ConsoleTVs\Profanity\Facades\Profanity::class,
```

### Usage

#### PHP

```php
$words = 'My bad word bitch';
$clean_words = \ConsoleTVs\Profanity\Builder::blocker($words)->filter();
// My bad word *****
```

#### Laravel

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ConsoleTVs\Profanity\Facades\Profanity;
// or using the alias:
// use Profanity;

class HomeController extends Controller
{
    /**
     * Simple test function.
     *
     * @return string
     */
    public function test()
    {
        $words = 'My bad word bitch';

        return Profanity::blocker($words)->filter();
        // My bad word *****
    }
}
```

### Methods

#### Constructor

-   blocker($text, $blocker = '****')

    Setup the text and the blocker to use.

    *note:* The blocker defaults to ```****```

#### Class Methods

-   strict(true/false)

    Set the strict mode to enabled or disabled. Strict mode replaces the string even if it's not a word:
    assets => (tagged as ass) => ```****```
    Disable to ensure normal usage.
    Defaults to false.

-   strictClean(true/false)

    Set the strict clean mode to enabled or disabled. Strict clean mode ensures the first blocked character is repeated for each bad word character.
    If so, a bad word of length = 3 (ass) will result in a ```***```, instead of the blocker (defaults to ```****```).
    If the blocker is ```-**-``` then the same example as above would produce ```---``` as strict clean true and ```-**-``` as false.
    Defaults to true.

-   clean()

    Returns true if the text have no bad words on it.

-   filter()

    Filters the text with the given blocker.

-   badWords()

    Return the bad words found in the text.

-   text($text)

    Sets the text to filter.

-   blocker($blocker)

    Sets the string that will replace the bad words.

-   dictionary($dictionary)

    Sets the dictionary. If string is provided, it will be treated as a path and will try
    to decode the json contained in the path. If array is provided, it will set the dictionary.

    Example dictionary:
    ```json
    [
        {
            "language": "en",
            "word": "bitch"
        },
        {
            "language": "en",
            "word": "fuck"
        }
    ]
    ```

## License

```
MIT License

Copyright (c) 2017 Erik Campobadal

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

```
