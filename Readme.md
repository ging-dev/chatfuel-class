## Chatfuel class for PHP

[![StyleCI](https://github.styleci.io/repos/267200397/shield?branch=master)](https://github.styleci.io/repos/267200397)
[![Build Status](https://travis-ci.org/ging-dev/chatfuel-class.svg?branch=master)](https://travis-ci.org/ging-dev/chatfuel-class)

## Install
    composer require ging-dev/chatfuel
## Usage
```php
<?php

use Gingdev\Chatfuel;

require 'vendor/autoload.php';

$chatfuel = new Chatfuel();

$chatfuel->sendText('Hello world');

$chatfuel->sendImage('https://domain.com/abc.png');

echo $chatfuel->toJson();
