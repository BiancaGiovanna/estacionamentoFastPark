<?php
//import do arquivo para iniciar
//as dependencias da API
require_once("vendor/autoload.php");

$app = new \Slim\App();

$app->get('/', function($request, $response, $args){
    return $response->getBody()->write('Bem vindo a API!!');
});

//Metodo Get
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
$app->get('/wave', function ($request, $response, $args){
    require_once("../model/apiGet.php");

    if(isset($request -> getQueryParams()['statusCliente'])){

        $vagas = $request-> getQueryParams()['statusCliente'];

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


//Metodo Post
$app->post('/enter', function ($request, $response, $args){

    //Recebe o contentType da Requisição
    $contentType = $request-> getHeaderLine('contentType');

    if($contentType = 'application/json'){

        $dadosJSON = $request-> getParsedBody();

        if($dadosJSON == "" || $dadosJSON == null){
            return $response    ->withStatus(400)
                                ->withHeader('Content-Type', 'application/json')
                                ->write('{
                                        "status": "Fail",
                                        "mensagem": "Os dados enviados não podem ser nulos"
                                        }');
        }else{
            require_once("../model/apiPost.php");

            $retornoDados = insertMovimento($dadosJSON);

            if($retornoDados){
                return $response    ->withStatus(200)
                                    ->withHeader('Content-Type', 'application/json')
                                    ->write($retornoDados);
            }else{
                return $response    ->withStatus(400)
                                    ->withHeader('Content-Type', 'application/json')
                                    ->write('{
                                                "status": "Fail",
                                                "mensagem": "Falha ao Inserir os dados no Banco. Verifique os dados enviados estão corretos!"
                                            }');
            }

        }

    }else{
        return $response    ->withStatus(400)
                            ->withHeader('Content-Type', 'application/json')
                            ->write('{
                                    "status": "Fail",
                                    "Mensagem": "Erro no Content-Type da Requisição"
                                    }');
    }
});

//Metodo Put
$app->put('/price/{id}', function ($request, $response, $args){
    $contentType = $request-> getHeaderLine('contentType');

    $id = $args['id'];
    $preco = $request->getParsedBody()['valor'];

    if($contentType = 'application/json'){


        if($id == 1 || $id == 2){
            require_once("../model/apiPut.php");

            $retornoDados = updatePrice($id, $preco);

            if($retornoDados){
                return $response    ->withStatus(200)
                                    ->withHeader('Content-Type', 'application/json')
                                    ->write('{
                                            "status": "Sucesso"
                                            "Mensagem": "Dados Atualizados com Sucesso!"
                                            }');
            }else{
                return $response    ->withStatus(400)
                                    ->withHeader('Content-Type', 'application/json')
                                    ->write('{
                                        "status": "Fail",
                                        "mensagem": "Os dados enviados não podem ser nulos"
                                            }');
            }

        }else{
            return $response    ->withStatus(400)
                                    ->withHeader('Content-Type', 'application/json')
                                    ->write('{
                                            "status": "Fail",
                                            "Mensagem": "Não existe esta informção no banco!!"
                                            }');
        }

    }else{
        return $response    ->withStatus(400)
                            ->withHeader('Content-Type', 'application/json')
                            ->write('{
                                    "status": "Fail",
                                    "Mensagem": "Erro no Content-Type da Requisição"
                                    }');
    }

});

$app->put('/exit/{codigo}', function ($request, $response, $args){

    $codComprovante = $args['codComprovante'];
    $idPreco = $request->getParsedBody()['idPreco'];

    $contentType = $request-> getHeaderLine('contentType');

    require_once("../model/apiPut.php");

    $retornoDados = updateExit($codComprovante, $idPreco);

    if($retornoDados){
        return $response    ->withStatus(200)
                            ->withHeader('Content-Type', 'application/json')
                            ->write('{
                                    "status": "Sucesso"
                                    "Mensagem": "Dados Atualizados com Sucesso!"
                                    }');
    }else{
        return $response    ->withStatus(400)
                            ->withHeader('Content-Type', 'application/json')
                            ->write('{
                                "status": "Fail",
                                "mensagem": "Os dados enviados não podem ser nulos"
                                    }');
    }

});

//carrega todos os endPoints
$app->run();