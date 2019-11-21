<?php

namespace App\Chapter09\Activity;
require (__DIR__ . '/../../../vendor/autoload.php');

use Monolog\Logger;

class Example
{
	public function __construct(Logger $logger)
	{
		$this->logger = $logger;
	}

	public function doSomething()
	{
		echo "Something" . PHP_EOL;

		$this->logger->info('This is an informational message');
		$this->logger->error('This message logs an error condition');
		$this->logger->critical('This message logs unexpected exceptions');
	}
}