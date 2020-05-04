<?php
header('Content-Type: application/json');

$user = [];
$user['lastname'] = $_POST['lastname'] ?: null;
$user['firstname'] = $_POST['firstname'] ?: null;
$user['tel'] = $_POST['tel'] ?: null;
$user['email'] = $_POST['email'] ?: null;
echo json_encode($user);