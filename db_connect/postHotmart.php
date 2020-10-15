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
    $id_user = $_GET['id']/$chave;

    $nomeProduto        = $dados['prod_name'];

    $formaPagamento     = formapagHot($dados['payment_type']);
    $statusVenda        = statusHot($dados['status']);
    $valorVenda         = $dados['original_offer_price'];
    if($dados['cms_vendor'] != 0){
        $valorComissao      = $dados['cms_vendor'];
    }else{
        $valorComissao      = $dados['cms_aff'][0];
    }
    
    $dataVenda          = $dados['purchase_date'];
    $dataFinalizada     = $dados['confirmation_purchase_date']; 
    $linkBoleto         = $dados['billet_url'];
    $codBoleto          = $dados['billet_barcode'];
    $validacao          = "enviado";

    $nome               = $dados['name'];
    $email              = $dados['email'];
    if($dados['phone_checkout_local_code'] != 0){
        $ddd = $dados['phone_checkout_local_code'];
    }else{
        $ddd = "99"
    }
    $telefone           = "+55"+$ddd+$dados['phone_checkout_number'];

    $sql_query = "INSERT INTO vendas (id_user, nomeProduto, formaPagamento, statusVenda, valorVenda, valorComissao, dataVenda, dataFinalizada, validacao, linkBoleto, codBoleto, nome, email, telefone, plataforma) 
    VALUES ('".$id_user."', '".$nomeProduto."','".$formaPagamento."', '".$statusVenda."','".$valorVenda."', '".$valorComissao."', '".$dataVenda."', '".$dataFinalizada."', '".$validacao."', '".$linkBoleto."', '".$codBoleto."', '".$nome."', '".$email."', '".$telefone."', 'Hotmart')";
    $conexao_db->query($sql_query);

    echo "Registro cadastrado";

}else{
    echo "Sem id de usuário, configure o post conforme as instruções.";
}

function statusHot($stringStatus){
	if($stringStatus == "completed"){
		return "Completa";
	}else if($stringStatus == "approved"){
		return "Finalizada";
	}else if($stringStatus == "wayting_payment"){
		return "Aguardando pagamento";
	}else if($stringStatus == "canceled"){
		return "Cancelada";
	}else if($stringStatus == "billet_printed"){
        return "Aguardando pagamento";
    }else{
		return $stringStatus;
	}
}

function formapagHot($stringPag){
	if($stringPag == "credit_card"){
		return "Cartao de credito";
	}else if($stringPag == "billet"){
		return "Boleto";
	}else{
		return $stringPag;
	}
}
?>