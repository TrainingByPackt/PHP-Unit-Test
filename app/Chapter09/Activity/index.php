<?php

namespace app\Chapter09\Activity;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$logger = new Logger('application_log');
$logger->pushHandler(new StreamHandler('./logs/app.log', Logger::INFO));

$e = new Example($logger);
$e->doSomething();