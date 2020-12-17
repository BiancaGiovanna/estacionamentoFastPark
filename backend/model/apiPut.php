<?php
function updatePrice($id, $valor){
    require_once('../controller/connectionMysql.php');

    require_once('../controller/settings.php');

    if(!$conex = connectionMysql()){
        echo("<script> alert('".ERRO_CONEX_BD_MYSQL."'); </script>");
    }

    if($id == 1){
        $sql = "update tblpreco set
            valor = '".$valor."'
            where idPreco = 1";
    }else if($id == 2){
        $sql = "update tblpreco set
            valor = '".$valor."'
            where idPreco = 2";
    }
    else{
        return false;
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