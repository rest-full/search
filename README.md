# Rest-full Search

## About Rest-full Search

Rest-full Search is a small part of the Rest-Full framework.

You can find the application at: [rest-full/app](https://github.com/rest-full/app) and you can also see the framework skeleton at: [rest-full/rest-full](https://github.com/rest-full/rest-full).

## Installation

* Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
* Run `php composer.phar require rest-full/search` or composer installed globally `compser require rest-full/search` or composer.json `"rest-full/search": "1.0.0"` and install or update.

## Usage

This Correios
```
<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__.'/../config/pathServer.php';

use Restfull\Search\Correios;

$correios = new Correios();
print_r($correios->cep('21520-054')->getData());
```

and this Search
```
<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../config/pathServer.php';

use Resultfull\Search\Search

$search = new Search('http://localhost/webservice/users/get.php');
echo $search->searching(['CURLOPT_POST'=>true,'CURLOPT_POSTFIELDS'=>'vasco'])->answer();
```
## License

The rest-full framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).