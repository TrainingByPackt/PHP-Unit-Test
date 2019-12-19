<?php

/** @var PDO $pdo */
require 'connection.php';

$statement = "SELECT * FROM users";

$result = $pdo->query($statement);
if ($result === false) {
    list(, , $driverErrMsg) = $pdo->errorInfo();
    echo "Error querying the users table: $driverErrMsg" . PHP_EOL;
    return;
}

print "All records";
while ($record = $result->fetch()) {
    print implode("\t", $record);
}

$result = $pdo->query("SELECT * FROM users LIMIT 2");
print "\t". " Use LIMIT 2";
while ($record = $result->fetch()) {
    print implode("\t", $record);
}

$result = $pdo->query("SELECT * FROM users WHERE id > 3");
print "\t"." Use WHERE id > 3";
while ($record = $result->fetch()) {
    print implode("\t", $record);
}

$result = $pdo->query("SELECT * FROM users ORDER BY id DESC");
print "\t". " Use ORDER BY id DESC";
while ($record = $result->fetch()) {
    print implode("\t", $record);
}
