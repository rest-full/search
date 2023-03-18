<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__.'/../config/pathServer.php';

use Restfull\Search\Correios;

$correios = new Correios();
print_r($correios->cep('21520-054')->getData());

use Resultfull\Search\Search;

$search = new Search('http://localhost/webservice/users/get.php');
echo $search->searching(['CURLOPT_POST'=>true,'CURLOPT_POSTFIELDS'=>'vasco'])->answer();