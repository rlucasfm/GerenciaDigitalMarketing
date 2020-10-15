<?php
require_once("../config/db.php");

$conexao_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$chave = 159357;

// Checando a conexão
if (mysqli_connect_errno()) {
    printf("Conexão falhou: %s\n", mysqli_connect_error());
    echo "Conexão falhou ".mysqli_connect_error();
    exit();
}

$dados = $_POST;
if(isset($_GET['id'])){
    echo $id_user = $_GET['id']/$chave;

    $nomeProduto        = $dados['product_name'];
    $formaPagamento     = $dados['trans_payment'];
    $statusVenda        = $dados['trans_status'];
    $valorVenda         = floatval($dados['trans_total_value'])/100;
    $valorComissao      = $dados['commissions'][0]['value'];
    $dataVenda          = corrigirData($dados['trans_createdate']);
    $dataFinalizada     = corrigirData($dados['trans_updatedate']);
    $linkBoleto         = $dados['trans_payment_url'];
    $codBoleto          = $dados['trans_payment_bar_code'];
    $validacao          = "enviado";

    $nome               = $dados['client_name'];
    $email              = $dados['client_email'];
    $telefone           = $dados['client_cel'];

    $sql_query = "INSERT INTO vendas (id_user, nomeProduto, formaPagamento, statusVenda, valorVenda, valorComissao, dataVenda, dataFinalizada, validacao, linkBoleto, codBoleto, nome, email, telefone, plataforma) 
    VALUES ('".$id_user."', '".$nomeProduto."','".$formaPagamento."', '".$statusVenda."','".$valorVenda."', '".$valorComissao."', '".$dataVenda."', '".$dataFinalizada."', '".$validacao."', '".$linkBoleto."', '".$codBoleto."', '".$nome."', '".$email."', '".$telefone."', 'Braip')";
    $conexao_db->query($sql_query);

    echo "Registro cadastrado";

}else{
    echo "Sem id de usuário, configure o post conforme as instruções.";
}

function desAcento($stringAcento){
    if($stringAcento == "Cartão de crédito"){
        return "Cartao de credito";
    }else{
        return $stringAcento;
    } 
}

function corrigirData($datain){
    $ano = substr($datain, 0, 4);
    $mes = substr($datain, 5, 2);
    $dia = substr($datain, 8, 2);

    return ($ano."-".$mes."-".$dia);
}
?>