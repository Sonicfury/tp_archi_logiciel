<?php

require_once 'db.php';

header('Content-Type: application/json');

$stmt = 'SELECT 
           `id`,
           `lastname`, 
           `firstname`, 
           `tel`, 
           `email`
           FROM `tp-archi-logiciel`.users';

try {
    $query = $db->query($stmt);
    $result = $query->fetchAll();
    echo json_encode($result);
} catch (PDOException $e) {
    echo '¯\_(ツ)_/¯' . $e->getMessage();
}
