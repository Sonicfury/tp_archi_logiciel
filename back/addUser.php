<?php

require_once 'db.php';

header('Content-Type: application/json');

$user = [];
$user['lastname'] = mb_convert_case(filter_var(trim($_POST['lastname']), FILTER_SANITIZE_STRING), MB_CASE_TITLE) ?: null;
$user['firstname'] = mb_convert_case(filter_var(trim($_POST['firstname']), FILTER_SANITIZE_STRING), MB_CASE_TITLE) ?: null;
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
} catch (PDOException $e) {
    echo '¯\_(ツ)_/¯' . $e->getMessage();
}
