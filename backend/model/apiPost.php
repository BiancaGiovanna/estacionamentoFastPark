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

    

    $sql = "
            insert into tblmovimento 
                (placa,
                dataEntrada,
                codComprovante,
                statusCliente
                ) values 
                (
                    '".$dadosMovimento."',
                    current_timestamp(),
                    date_format(current_time(), '%s-%H-%d-%y-%i-%m'),
                    '".$statusCliente."'
                );";
    
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