<?php

$dsn = "mysql:host=mysql-host;port=3306;dbname=demo;charset=utf8mb4";
$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];
return $pdo = new PDO($dsn, "php-user", "php-pass", $options);

echo 'Server version: ' . $pdo->getAttribute(PDO::ATTR_SERVER_VERSION);
