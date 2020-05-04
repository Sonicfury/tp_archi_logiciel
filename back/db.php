<?php

$dsn = 'mysql:host=127.0.0.1;dbname=tp-archi-logiciel';
$user = 'root';
$password = '';

try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo '¯\_(ツ)_/¯ : ' . $e->getMessage();
}