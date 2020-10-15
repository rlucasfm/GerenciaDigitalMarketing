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

    $nomeProduto        = $dados['produto']['nome'];
    $formaPagamento     = desAcento($dados['venda']['formaPagamento']);
    $statusVenda        = $dados['venda']['status'];
    $valorVenda         = $dados['venda']['valor'];

    $comissoes = $dados['comissoes'];
    foreach($comissoes as $cm){
        $valorComiss[]    = $cm['valor'];
        if($cm['valor'] != 0){
            $valorComissao = $cm['valor'];
        }
    }

    $dataVenda          = $dados['venda']['dataInicio'];
    $dataFinalizada     = $dados['venda']['dataFinalizada'];
    $linkBoleto         = $dados['venda']['linkBoleto'];
    $codBoleto          = $dados['venda']['linha_digitavel'];
    $validacao          = "enviado";

    $nome               = $dados['comprador']['nome'];
    $email              = $dados['comprador']['email'];
    $telefone           = $dados['comprador']['telefone'];

    $sql_query = "INSERT INTO vendas (id_user, nomeProduto, formaPagamento, statusVenda, valorVenda, valorComissao, dataVenda, dataFinalizada, validacao, linkBoleto, codBoleto, nome, email, telefone, plataforma) 
    VALUES ('".$id_user."', '".$nomeProduto."','".$formaPagamento."', '".$statusVenda."','".$valorVenda."', '".$valorComissao."', '".$dataVenda."', '".$dataFinalizada."', '".$validacao."', '".$linkBoleto."', '".$codBoleto."', '".$nome."', '".$email."', '".$telefone."', 'Monetizze')";
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
?>