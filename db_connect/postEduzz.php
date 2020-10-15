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
    $formaPagamento     = $dados['trans_paymentmethod'];
    $statusVenda        = $dados['trans_status'];
    $valorVenda         = $dados['trans_value'];
    $valorComissao      = $dados['pro_value'];
    $dataVenda          = corrigirData($dados['trans_createdate']);
    $dataFinalizada     = corrigirData($dados['trans_paiddate']);
    $linkBoleto         = $dados['billet_url'];
    $codBoleto          = $dados['trans_barcode'];
    $validacao          = "enviado";

    $nome               = $dados['cus_name'];
    $email              = $dados['cus_email'];
    $telefone           = $dados['cus_cel'];

    $sql_query = "INSERT INTO vendas (id_user, nomeProduto, formaPagamento, statusVenda, valorVenda, valorComissao, dataVenda, dataFinalizada, validacao, linkBoleto, codBoleto, nome, email, telefone, plataforma) 
    VALUES ('".$id_user."', '".$nomeProduto."','".$formaPagamento."', '".$statusVenda."','".$valorVenda."', '".$valorComissao."', '".$dataVenda."', '".$dataFinalizada."', '".$validacao."', '".$linkBoleto."', '".$codBoleto."', '".$nome."', '".$email."', '".$telefone."', 'Eduzz')";
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
    $mes = substr($datain, 3, 2);
    $dia = substr($datain, 6, 2);

    return ($ano."-".$mes."-".$dia);
}
?>