<?php
require_once("../config/db.php");
require_once("../libraries/password_compatibility_library.php");

$dados = $_POST;
 
  /*$chaveUnica = $dados['chave_unica'];
  if($chaveUnica  != '7e98bf8b473e6673a27c004ac4562cd7') {
    exit;
  }*/

$nome = $dados['comprador']['nome'];
$email = $dados['comprador']['email'];
$cnpj_cpf = $dados['comprador']['cnpj_cpf']; 


$conexao_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Checando a conexão
if (mysqli_connect_errno()) {
    printf("Conexão falhou: %s\n", mysqli_connect_error());
    exit();
}

$nome = $conexao_db->real_escape_string($nome);
$email = $conexao_db->real_escape_string($email);
$senha = intval(substr($cnpj_cpf,0,6));
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);
$dataCad = date('Y-m-d');
$dataVenc = date('Y-m-d', strtotime('+30 days'));

$sql_auth = "SELECT id FROM usuarios WHERE email = '".$email."';";
$resultadoAuth = $conexao_db->query($sql_auth);
if($resultadoAuth->num_rows == 0){

  $sql_query = "INSERT INTO usuarios (email, senha, nome, cpf, dataCad, dataVenc) 
  VALUES ('".$email."', '".$senha_hash."','".$nome."', '".$cnpj_cpf."','".$dataCad."', '".$dataVenc."')";
  $conexao_db->query($sql_query);

  echo "Novo usuário cadastrado";

}else{
    echo "Usuário já cadastrado";
}

?>