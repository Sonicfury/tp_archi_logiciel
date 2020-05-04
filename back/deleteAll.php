<?php

require_once 'db.php';

header('Content-Type: application/json');

$stmt = 'TRUNCATE TABLE `tp-archi-logiciel`.users';
try {
    $db->exec($stmt);
} catch (PDOException $e) {
    echo '¯\_(ツ)_/¯' . $e->getMessage();
}
