<?php

$dsn = 'mysql:host=127.0.0.1;dbname=tp-archi-logiciel';
$user = 'root';
$password = '';

try {
    $db = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo '¯\_(ツ)_/¯ : ' . $e->getMessage();
}