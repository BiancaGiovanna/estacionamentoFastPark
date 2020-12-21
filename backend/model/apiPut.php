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
function updateExit($codComprovante){
    require_once('../controller/connectionMysql.php');

    require_once('../controller/settings.php');

    if(!$conex = connectionMysql()){
        echo("<script> alert('".ERRO_CONEX_BD_MYSQL."'); </script>");
    }

    $sqlHoras = "select hour(timediff((select tblmovimento.dataEntrada from tblmovimento 
            where codComprovante = '".$codComprovante."'), current_timestamp())) as horas;";
    
    $selectHoras = mysqli_query($conex, $sqlHoras);
    while ($rsHoras = mysqli_fetch_assoc($selectHoras)) {
        $horas = $rsHoras['horas'];
        
    }

    $sqlPreco_1 = " select tblpreco.valor
                    from tblpreco
                    where idPreco = 1";
    
    $selectPreco_1 = mysqli_query($conex, $sqlPreco_1);
    
    while ($rsPreco_1 = mysqli_fetch_assoc($selectPreco_1)) {
        $preco01 = $rsPreco_1['valor'];
    }
    
    $sqlPreco_2 = " select tblpreco.valor
                    from tblpreco
                    where idPreco = 2";

    $selectPreco_2 = mysqli_query($conex, $sqlPreco_2);

    while ($rsPreco_2 = mysqli_fetch_assoc($selectPreco_2)) {
        $preco02 = $rsPreco_2['valor'];
    }

    if ($horas < 1) {
        $sql =  "
                update tblmovimento set
                preco = '".$preco01."',
                horaSaida = current_timestamp(),
                statusCliente = 0
                where codComprovante = ".$codComprovante;
    }
    else{
        $valor = ($horas - 1) * $preco02 + $preco01;
        $sql =  "
                update tblmovimento set
                preco = '".$valor."',
                horaSaida = current_timestamp(),
                statusCliente = 0
                where codComprovante = '".$codComprovante . "'";
       echo($sql);
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