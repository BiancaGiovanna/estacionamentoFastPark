<?php

function searchDateEnter($dataEntrada){
    require_once('../controller/connectionMysql.php');

    require_once('../controller/settings.php');

    if(!$conex = connectionMysql()){
        echo("<script> alert('".ERRO_CONEX_BD_MYSQL."'); </script>");
    }

    $sql = 'select tblmovimento.* from tblmovimento';

    $select = mysqli_query($conex, $sql);

    while($rsMovimento = mysqli_fetch_assoc($select)){
        $date[] =  array(
            "placa"             => $rsMovimento['placa'],
            "data"              => $rsMovimento['dataEntrada'],
            "codComprovante"    => $rsMovimento['codComprovante']
        );
    }

    //convertendo para JSON
    if(isset($date))
        $listDateJSON = convertJSON($date);
    else
        return false;

    //vendo se a variavel existe
    if(isset($listDateJSON))
        return $listDateJSON;
    else
        return false;

}
function searchExit($dataEntrada){
    require_once('../controller/connectionMysql.php');

    require_once('../controller/settings.php');

    if(!$conex = connectionMysql()){
        echo("<script> alert('".ERRO_CONEX_BD_MYSQL."'); </script>");
    }

    $sql = 'select tblmovimento.*, tblpreco.nome, concat(valor,".00", " R$") as valor
            from tblpreco inner join tblmovimento
            on tblmovimento.idPreco = tblpreco.idPreco';

    $select = mysqli_query($conex, $sql);

    while($rsMovimento = mysqli_fetch_assoc($select)){
        $date[] =  array(
            "valor"             => $rsMovimento['valor'],
            "placa"             => $rsMovimento['placa'],
            "data"              => $rsMovimento['dataEntrada'],
            "horaSaida"         => $rsMovimento['horaSaida'],
            "codComprovante"    => $rsMovimento['codComprovante']
        );
    }

    //convertendo para JSON
    if(isset($date))
        $listDateJSON = convertJSON($date);
    else
        return false;

    //vendo se a variavel existe
    if(isset($listDateJSON))
        return $listDateJSON;
    else
        return false;
    
}
function searchDate($dataEntrada){
    require_once('../controller/connectionMysql.php');

    require_once('../controller/settings.php');

    if(!$conex = connectionMysql()){
        echo("<script> alert('".ERRO_CONEX_BD_MYSQL."'); </script>");
    }

    $sql = 'select tblmovimento.*, tblpreco.nome, concat(valor,".00", " R$") as valor
            from tblpreco inner join tblmovimento
            on tblmovimento.idPreco = tblpreco.idPreco';

            // 'select * from tblmovimento
            // where idPreco <> ""
            // and statusCliente = 0
            // and year(horaSaida) = 2020
            // and month(horaSaida) = 12
            // and day(horaSaida) = 14';

    $select = mysqli_query($conex, $sql);

    while($rsMovimento = mysqli_fetch_assoc($select)){
        $date[] =  array(
            "idMovimento"       => $rsMovimento['idMovimento'],
            "valor"             => $rsMovimento['valor'],
            "placa"             => $rsMovimento['placa'],
            "dataEntrada"       => $rsMovimento['dataEntrada'],
            "horaSaida"         => $rsMovimento['horaSaida'],
            "codComprovante"    => $rsMovimento['codComprovante'],
            "statusCliente"     => $rsMovimento['statusCliente']
        );
    }

    //convertendo para JSON
    if(isset($date))
        $listDateJSON = convertJSON($date);
    else
        return false;

    //vendo se a variavel existe
    if(isset($listDateJSON))
        return $listDateJSON;
    else
        return false;

}
function searchPrice($valor){
    require_once('../controller/connectionMysql.php');

    require_once('../controller/settings.php');

    if(!$conex = connectionMysql()){
        echo("<script> alert('".ERRO_CONEX_BD_MYSQL."'); </script>");
    }

    $sql = 'select * from tblpreco';

    $select = mysqli_query($conex, $sql);

    while($rsMovimento = mysqli_fetch_assoc($select)){
        $date[] =  array(
            "idPreco"           => $rsMovimento['idPreco'],
            "Nome"              => $rsMovimento['nome'],
            "valor"             => $rsMovimento['valor']
        );
    }

    //convertendo para JSON
    if(isset($date))
        $listDateJSON = convertJSON($date);
    else
        return false;

    //vendo se a variavel existe
    if(isset($listDateJSON))
        return $listDateJSON;
    else
        return false;

}
function searchWave($vagas){
    require_once('../controller/connectionMysql.php');

    require_once('../controller/settings.php');

    if(!$conex = connectionMysql()){
        echo("<script> alert('".ERRO_CONEX_BD_MYSQL."'); </script>");
    }

    $sql = 'select * FROM tblmovimento
            where statusCliente = 1';
            //COUNT(*)

    $select = mysqli_query($conex, $sql);

    while($rsMovimento = mysqli_fetch_assoc($select)){
        $date[] =  array(
            "placa"             => $rsMovimento['placa'],
            "data"              => $rsMovimento['dataEntrada'],
            "codComprovante"    => $rsMovimento['codComprovante'],
            "statusCliente"     => $rsMovimento['statusCliente']
        );
    }

    //convertendo para JSON
    if(isset($date))
        $listDateJSON = convertJSON($date);
    else
        return false;

    //vendo se a variavel existe
    if(isset($listDateJSON))
        return $listDateJSON;
    else
        return false;

}
function convertJSON($obj){
    header("content-type:application/json");

    $listJSON = json_encode($obj);

    return $listJSON;
}