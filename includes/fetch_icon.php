<?php 
require_once("../config/db.php");
$conexao_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);


$sql = "SELECT * FROM vendas WHERE (notificado = 0 AND formaPagamento = 'Boleto' AND id_user = ".$_GET['id_user'].") ORDER BY id DESC LIMIT 5";
$result = $conexao_db->query($sql);


if($result->num_rows==0){
    echo"<span class='count-symbol bg'></span>";
}else{
    echo"<span class='count-symbol bg-danger'></span>";;
}

$conexao_db->close();
?>