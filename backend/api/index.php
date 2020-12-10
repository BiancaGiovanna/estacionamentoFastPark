<?php
//import do arquivo para iniciar
//as dependencias da API
require_once("vendor/autoload.php");

$app = new \Slim\App();

$app->get('/', function($request, $response, $args){
    return $response-getBody()->write('Bem vindo a API');
});

//carrega todos os endPoints
$app->run();