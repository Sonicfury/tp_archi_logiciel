<?php

require_once 'db.php';

header('Content-Type: application/json');

$idToDelete = preg_replace('/\D/', '', $_POST['id-to-delete']) ?: null;

$stmt = 'DELETE FROM 
            `tp-archi-logiciel`.users
            WHERE id=:idToDelete';
$params = [
    ':idToDelete' => $idToDelete
];
try {
    $prep = $db->prepare($stmt);
    $prep->execute($params);
} catch (PDOException $e) {
    echo '¯\_(ツ)_/¯' . $e->getMessage();
}
