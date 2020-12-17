<?php
function updatePrice($id, $preco){
    require_once('../controller/connectionMysql.php');

    require_once('../controller/settings.php');

    if(!$conex = connectionMysql()){
        echo("<script> alert('".ERRO_CONEX_BD_MYSQL."'); </script>");
    }

    $sql = "update tblpreco set
            valor = '".$preco."'
            where idPreco = ".$id;
    
    if (mysqli_query($conex, $sql)){
        return true;
    }
    else{
        return false;
    }

}
function updateExit($codComprovante, $idPreco){
    require_once('../controller/connectionMysql.php');

    require_once('../controller/settings.php');

    if(!$conex = connectionMysql()){
        echo("<script> alert('".ERRO_CONEX_BD_MYSQL."'); </script>");
    }

    $sql = "select hour(timediff((select tblmovimento.dataEntrada from tblmovimento where codComprovante = '3-13-3-12-39-12'), current_timestamp()));
            select * from tblpreco;
            update tblmovimento set
            idPreço = '".$idPreco."',
            horaSaida = current_timestamp(),
            statusCliente = 0
            where codComprovante = ".$codComprovante;

    if (mysqli_query($conex, $sql)){
        return true;
    }
    else{
        return false;
    }
}
function convertJSON($obj){
    header("content-type:application/json");

    $listJSON = json_encode($obj);

    return $listJSON;
}