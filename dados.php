<?php
session_start();
require_once('config/db.php');

// Check user login or not
if(!isset($_SESSION['username'])){
    header('Location: login/index.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: login/index.php');
}

$username = $_SESSION['username'];
$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Up Convert</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <?php include('includes/barrasuperior.php'); ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include('includes/barralateral.php'); ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span>Detalhamento do Cliente</h3>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">


                <div id="mensagens">

<?php
    if(isset($_SESSION['msg'])){
      echo $_SESSION['msg'];
      unset($_SESSION['msg']);
    }
    
    //Receber o número da página
    $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);   
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
    
    //Setar a quantidade de itens por pagina
    $qnt_result_pg = 10;
    
    //calcular o inicio visualização
    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

    $sqlnot = "UPDATE vendas SET notificado=1 WHERE id = '".$_GET['id_venda']."'";
    $db_connection->query($sqlnot);
    
    $result_mensagens = "SELECT * FROM vendas WHERE id_user = '".$_GET['id_user']."' AND id = '".$_GET['id_venda']."' ";
    $resultado_mensagens = $db_connection->query($result_mensagens);
    while($row_usuario = $resultado_mensagens->fetch_assoc()){
      echo "   <div class='card'>
                  <div class='card-body'>
                    <div class='table-responsive'>
                      <table class='table'>
                        <thead>
                          <tr>
                            <th>INFORMAÇÕES:</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td> <b>Nome: </b>" . $row_usuario['nome'] . " </td>
                           
                          </tr>
                          <tr>
                            <td> <b>Telefone: </b>" . $row_usuario['telefone'] . " </td>
                            
                            
                          </tr>

                          <tr>
                            <td> <b>Email: </b>" . $row_usuario['email'] . " </td>
                           
                            
                          </tr>

                          <tr>
                            <td> <b>Forma de Pagamento: </b>" . $row_usuario['formaPagamento'] . " </td>
                            
                            
                          </tr>

                          <tr>
                            <td> <b>Link do Boleto: </b><a href='". $row_usuario['linkBoleto']."' target='_blank'> ". $row_usuario['linkBoleto'] . " </a> </td>
                            
                            
                          </tr>

                          <tr>
                            <td> <b>Linha Digitável: </b>" . $row_usuario['codBoleto'] . " </td>
                            
                            
                          </tr>

                          <tr>
                            <td><a href='https://api.whatsapp.com/send?phone=55".$row_usuario['telefone']."&text=Olá%20".$row_usuario['nome'].",%20tudo%20bem?%20Preciso%20falar%20com%20você!' type='button' class='btn btn-gradient-success btn-rounded btn-lg' target='_blank'>
                            <i class='mdi mdi-whatsapp'></i> Enviar Whatsapp
                          </a>

                           </td>
                            
                            
                          </tr>

                        </tbody>
                      </table>
                    </div>

        <form id='formulario' method='post'>
          <input type='hidden'  value='" . $row_usuario['id'] . "' id='id' class='id'>
        </form>
        
        <center>
          <div id='success'></div>
          <div id='status'></div>
          <a href='javascript:history.back()' class='btn enviar btn-lg btn btn-primary'>Voltar</a>
          <button class='btn btn-lg btn btn-success enviar' id='botAprovar'>Aprovar</button> 
        </center>

      </div>
    </div>
    
        
     
                       ";
    }
?>
<script>
$("#botAprovar").on("click", function(){
  var id = $("#id").val();
  
  $.ajax({
    data: {id:id},
    type: "post",
    url: "aprovado.php",
    success: function(data){
      $("#status").html("<font color='green'><h3 style='color:green;'>O pedido foi aprovado!</h3></font>");
    }
  });
});
</script>

</div> 



                <div class="card" style="display: none;">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> <b>Produto</b> </th>
                            <th> <b>Forma de Pagagamento</b> </th>
                            <th> <b>Status</b> </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td> David Grey </td>
                            <td> Fund is not recieved </td>
                            <td>
                              <label class="badge badge-gradient-success">DONE</label>
                            </td>
                          </tr>
                          <tr>
                            <td> Stella Johnson </td>
                            <td> High loading time </td>
                            <td>
                              <label class="badge badge-gradient-warning">PROGRESS</label>
                            </td>
                            
                          </tr>
                          <tr>
                            <td> Marina Michel </td>
                            <td> Website down for one week </td>
                            <td>
                              <label class="badge badge-gradient-info">ON HOLD</label>
                            </td>
                            
                          </tr>
                          <tr>
                            <td> John Doe </td>
                            <td> Loosing control on server </td>
                            <td>
                              <label class="badge badge-gradient-danger">REJECTED</label>
                            </td>
                            
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
 
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>