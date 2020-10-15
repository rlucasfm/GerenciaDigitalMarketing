<?php 
require_once("../config/db.php");
$conexao_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$sql = "SELECT * FROM vendas WHERE (notificado = 0 AND formaPagamento = 'Boleto' AND id_user = ".$_GET['id_user'].") ORDER BY id DESC LIMIT 5";
$result = $conexao_db->query($sql);

while($row_not = $result->fetch_assoc()){
    echo "
    <div class='dropdown-divider'></div>
    <a href='dados.php?id_user=". $row_not['id_user'] ."&id_venda=".$row_not['id']."' class='dropdown-item preview-item'>
        <div class='preview-thumbnail'>
            <div class='preview-icon bg-success'>
                <i class='mdi mdi-calendar'></i>
            </div>
        </div>
        <div class='preview-item-content d-flex align-items-start flex-column justify-content-center'>
            <h6 class='preview-subject font-weight-normal mb-1'>Nova venda!</h6>
            <p class='text-gray ellipsis mb-0'>".$row_not['nomeProduto']."</p>
        </div>
    </a>
    <div class='dropdown-divider'></div>";
}

$conexao_db->close();
?>