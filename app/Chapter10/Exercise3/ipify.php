<?php

namespace App\Chapter10\Exercise3;
require (__DIR__ . '/../../../vendor/autoload.php');

use GuzzleHttp\Client;

$client = new Client(['base_uri'=>'https://api.ipify.org']);

$response = $client->request('GET', '/', [
    'query' => ['format'=>'json']
]);

$responseObject = json_decode($response->getBody()->getContents());

echo "Your public facing ip address is {$responseObject->ip}" . PHP_EOL;