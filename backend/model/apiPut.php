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

    $sqlHoras = "select hour(timediff((select tblmovimento.dataEntrada from tblmovimento 
            where codComprovante = '".$codComprovante."'), current_timestamp()));";
    
    $selectHoras = mysqli_query($conex, $sqlHoras);

    $sqlPreco_1 = " select tblpreco.valor
                    from tblpreco
                    where idPreco = 1";
    
    $selectPreco_1 = mysqli_query($conex, $sqlPreco_1);

    $sqlPreco_2 = " select tblpreco.valor
                    from tblpreco
                    where idPreco = 2";

    $selectPreco_2 = mysqli_query($conex, $sqlPreco_2);

    if ($sqlHoras < 1) {
        $sql =  "
                update tblmovimento set
                preco = '".$selectPreco_1."',
                horaSaida = current_timestamp(),
                statusCliente = 0
                where codComprovante = ".$codComprovante;
    }
    else{
        $valor = ($selectHoras - 1) * $selectPreco_2 + $selectPreco_2;
        $sql =  "
                update tblmovimento set
                preco = '".$valor."',
                horaSaida = current_timestamp(),
                statusCliente = 0
                where codComprovante = ".$codComprovante;
    }


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