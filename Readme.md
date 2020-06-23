## Chatfuel class for PHP

[![StyleCI](https://github.styleci.io/repos/267200397/shield?branch=master)](https://github.styleci.io/repos/267200397)
[![Build Status](https://travis-ci.org/ging-dev/chatfuel-class.svg?branch=master)](https://travis-ci.org/ging-dev/chatfuel-class)
[![Maintainability](https://api.codeclimate.com/v1/badges/4ecc0e618c1e52b689f1/maintainability)](https://codeclimate.com/github/ging-dev/chatfuel-class/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/4ecc0e618c1e52b689f1/test_coverage)](https://codeclimate.com/github/ging-dev/chatfuel-class/test_coverage)

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

header('Content-type: application/json');
echo json_encode($chatfuel->getResponse());
```
