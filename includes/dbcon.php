<?php

$db = 'heroku_136790215a90f3a';
$host  = 'eu-cdbr-west-03.cleardb.net';
$dbusername = 'b43bb080256327';
$password = '9b95ee60';

try {
    $pdo = new PDO("mysql:host=$host; dbname=$db;", $dbusername, $password);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
