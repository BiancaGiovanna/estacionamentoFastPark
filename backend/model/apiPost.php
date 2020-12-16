<?php

function insertMovimento($dadosMovimento){
    require_once('../controller/connectionMysql.php');

    require_once('../controller/settings.php');

    if(!$conex = connectionMysql()){
        echo("<script> alert('".ERRO_CONEX_BD_MYSQL."'); </script>");
    }

    $placa = (string) null;
    $dataEntrada = (string) null;
    $codComprovante = (string) null;
    $statusCliente = (boolean) 1;

    $placa = $dadosMovimento['placa'];

    $sql = "insert into tblmovimento
            (
            placa,
            dataEntrada,
            codComprovante,
            statusCliente
            ) values 
            (
                '".$placa."',
                current_timestamp(),
                concat_ws('-', second(curtime()), hour(curtime()), second(curtime()), month(curdate()), minute(curtime()), month(curdate())),
                '".$statusCliente."'
            )";
    
    if(mysqli_query($conex, $sql)){
        $dados = convertJSON($dadosMovimento);
        return $dados;
    }else{
        return false;
    }
    

}
function convertJSON($obj){
    header("content-type:application/json");

    $listJSON = json_encode($obj);

    return $listJSON;
}