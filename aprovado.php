<?php

require_once('config/db.php');
$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$id = $_POST['id']; 


$query = "UPDATE vendas SET validacao='aprovado' WHERE id='".$id."'";

$up = $db_connection->query($query);

if($up->affected_rows > 0){
  echo "<font color='green'>Sucesso:  trabalho aprovado corretamente, pressione voltar para verificar os outros trabalhos enviados!</font>";
}else{
  echo "Aviso: Não foi atualizado!";
}
 


?>