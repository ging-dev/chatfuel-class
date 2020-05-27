## Chatfuel class for PHP

[![StyleCI](https://github.styleci.io/repos/267200397/shield?branch=master)](https://github.styleci.io/repos/267200397)

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
