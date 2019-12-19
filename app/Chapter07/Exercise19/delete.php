<?php

/** @var PDO $pdo */
$pdo = require 'connection.php';

$partialMatch = $argv[1] ?? '';
$deleteStmt = $pdo->prepare("DELETE FROM users WHERE email LIKE :partialMatch");

if ($deleteStmt->execute([':partialMatch' => "$partialMatch"]) === false) {
    list(, , $driverErrMsg) = $deleteStmt->errorInfo();
    print "Error deleting from the users table: $driverErrMsg" . "\n";
    return;
}

if($rowCount = $deleteStmt->rowCount()){
    print sprintf("Successfully deleted %d records matching '%s' from users table.", $rowCount, $partialMatch) . "\n";
} else {
    print sprintf("No records matching '%s' were found in users table.", $partialMatch) . "\n";
}
