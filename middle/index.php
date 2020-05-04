<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'http://localhost/TP_IHAB_04-mai/exercice1/back/'
]);

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/TP_IHAB_04-mai/exercice1/middle/addUser' :
        $response = $client->request('POST', 'addUser.php', [
            'form_params' => $_POST
        ]);
        $body = $response->getBody();
        echo $body->getContents();
        break;
    case '/TP_IHAB_04-mai/exercice1/middle/getUser' :
        $response = $client->request('GET', 'getUser.php');
        $body = $response->getBody();
        echo $body->getContents();
        break;
    case '/TP_IHAB_04-mai/exercice1/middle/deleteUser' :
        $response = $client->request('POST', 'deleteUser.php', [
            'form_params' => $_POST
        ]);
        $body = $response->getBody();
        echo $body->getContents();
        break;
    case '/TP_IHAB_04-mai/exercice1/middle/deleteAllUsers' :
        $response = $client->request('POST', 'deleteAll.php');
        $body = $response->getBody();
        echo $body->getContents();
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/404.php';
        break;
}