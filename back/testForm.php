<?php

require_once 'db.php';

header('Content-Type: application/json');

$user = [];
$user['lastname'] = filter_var(trim($_POST['lastname']), FILTER_SANITIZE_STRING) ?: null;
$user['firstname'] = filter_var(trim($_POST['firstname']), FILTER_SANITIZE_STRING) ?: null;
$user['tel'] = preg_replace('/\D/', '', $_POST['tel']) ?: null;
$user['email'] = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING) ?: null;

$stmt = 'INSERT INTO 
            `tp-archi-logiciel`.users (
           `lastname`, 
           `firstname`, 
           `tel`, 
           `email`
           ) VALUES (
             :lastname, 
             :firstname, 
             :tel, 
             :email)';
$params = [
    ':lastname' => $user['lastname'],
    ':firstname' => $user['firstname'],
    ':tel' => $user['tel'],
    ':email' => $user['email'],
];
try {
    $prep = $db->prepare($stmt);
    $prep->execute($params);
    echo json_encode(["error" => false, "message" => "client ajouté"]);
} catch (PDOException $e){
    echo '¯\_(ツ)_/¯' . $e->getMessage();
}
