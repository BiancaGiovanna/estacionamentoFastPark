<?php
//import do arquivo para iniciar
//as dependencias da API
require_once("vendor/autoload.php");

$app = new \Slim\App();

$app->get('/', function($request, $response, $args){
    return $response->getBody()->write('Bem vindo a API!!');
});
// $app->post('/enter', function ($request, $response, $args){
    
// });
$app->get('/enter', function ($request, $response, $args){
    require_once("../model/apiGet.php");

    if(isset($request -> getQueryParams()['dataEntrada'])){

        $dataEntrada = $request-> getQueryParams()['dataEntrada'];

        $listDate = searchDateEnter($dataEntrada);
    }else{
        $listDate = searchDateEnter(0);
    }

    if($listDate)
        return $response    ->withStatus(200)
                            ->withHeader('Content-Type', 'application/json')
                            ->write($listDate);
    else
        return $response    ->withStatus(204)
                            ->write("Requisição Realizada, mas nenhum dado encontrado!!");

});
$app->get('/exit', function ($request, $response, $args){
    require_once("../model/apiGet.php");

    if(isset($request -> getQueryParams()['dataEntrada'])){

        $dataEntrada = $request-> getQueryParams()['dataEntrada'];

        $listDate = searchExit($dataEntrada);
    }else{
        $listDate = searchExit(0);
    }

    if($listDate)
        return $response    ->withStatus(200)
                            ->withHeader('Content-Type', 'application/json')
                            ->write($listDate);
    else
        return $response    ->withStatus(204)
                            ->write("Requisição Realizada, mas nenhum dado encontrado!!!");
});
$app->get('/report', function ($request, $response, $args){
    require_once("../model/apiGet.php");

    if(isset($request -> getQueryParams()['dataEntrada'])){

        $dataEntrada = $request-> getQueryParams()['dataEntrada'];

        $listDate = searchDate($dataEntrada);
    }else{
        $listDate = searchDate(0);
    }

    if($listDate)
        return $response    ->withStatus(200)
                            ->withHeader('Content-Type', 'application/json')
                            ->write($listDate);
    else
        return $response    ->withStatus(204)
                            ->write("Requisição Realizada, mas nenhum dado encontrado!!!");

});
$app->get('/price', function ($request, $response, $args){
    require_once("../model/apiGet.php");

    if(isset($request -> getQueryParams()['valor'])){

        $valor = $request-> getQueryParams()['valor'];

        $listDate = searchPrice($valor);
    }else{
        $listDate = searchPrice(0);
    }

    if($listDate)
        return $response    ->withStatus(200)
                            ->withHeader('Content-Type', 'application/json')
                            ->write($listDate);
    else
        return $response    ->withStatus(204)
                            ->write("Requisição Realizada, mas nenhum dado encontrado!!!");

});
$app->get('/wave', function ($request, $response, $args){
    require_once("../model/apiGet.php");

    if(isset($request -> getQueryParams()['totalVagas'])){

        $vagas = $request-> getQueryParams()['totalVagas'];

        $listDate = searchWave($vagas);
    }else{
        $listDate = searchWave(0);
    }

    if($listDate)
        return $response    ->withStatus(200)
                            ->withHeader('Content-Type', 'application/json')
                            ->write($listDate);
    else
        return $response    ->withStatus(204)
                            ->write("Requisição Realizada, mas nenhum dado encontrado!!!");

});

//carrega todos os endPoints
$app->run();