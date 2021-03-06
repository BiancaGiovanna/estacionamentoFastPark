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

    $sql = 'select tblmovimento.*, concat(preco,".00", " R$") as valor
            from tblmovimento';

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
function searchDate($type){
    require_once('../controller/connectionMysql.php');

    require_once('../controller/settings.php');

    if(!$conex = connectionMysql()){
        echo("<script> alert('".ERRO_CONEX_BD_MYSQL."'); </script>");
    }
    if ($type == 'year') {
        $sql = 'select * from tblmovimento
                where preco <> ""
                and statusCliente = 0
                and year(horaSaida) = year(current_date())';
    }
    elseif ($type == 'month') {
        $sql = 'select * from tblmovimento
        where preco <> ""
        and statusCliente = 0
        and year(horaSaida) = year(current_date())
        and month(horaSaida) = month(current_date());';
    }
    elseif ($type == 'day') {
        $sql = 'select * from tblmovimento
        where preco <> ""
        and statusCliente = 0
        and year(horaSaida) = year(current_date())
        and month(horaSaida) = month(current_date())
        and day(horaSaida) = day(current_date());';
    }
    

    $select = mysqli_query($conex, $sql);

    while($rsMovimento = mysqli_fetch_assoc($select)){
        $date[] =  array(
            "idMovimento"       => $rsMovimento['idMovimento'],
            "valor"             => $rsMovimento['preco'],
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

    $sql = 'select COUNT(*) FROM tblmovimento
            where statusCliente = 1';
            //

    $select = mysqli_query($conex, $sql);

    while($rsMovimento = mysqli_fetch_assoc($select)){
        $date[] =  array(
            
            "clientes ativos"             => $rsMovimento['COUNT(*)']
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
function searchCode(){
    require_once('../controller/connectionMysql.php');

    require_once('../controller/settings.php');

    if(!$conex = connectionMysql()){
        echo("<script> alert('".ERRO_CONEX_BD_MYSQL."'); </script>");
    }

    $sql = 'select tblmovimento.placa, tblmovimento.codComprovante, tblmovimento.dataEntrada
            from tblmovimento 
            order by tblmovimento.idMovimento desc limit 1';

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
function convertJSON($obj){
    header("content-type:application/json");

    $listJSON = json_encode($obj);

    return $listJSON;
}