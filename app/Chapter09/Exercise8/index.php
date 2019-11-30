<?php
namespace App\Chapter09\Exercise8;
require (__DIR__ . '/../../../vendor/autoload.php');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$logger = new Logger('application_log');
$logger->pushHandler(new StreamHandler(__DIR__ . '/logs/app.log', Logger::INFO));

$e = new Example($logger);
$e->doSomething();