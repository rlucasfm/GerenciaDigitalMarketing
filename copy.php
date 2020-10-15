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
                </span>Copy Sugerida</h3>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <h2>Modelo de Copy Sugerido</h2>
                <hr>
                <div class="col-6">
                <div class="embed-responsive embed-responsive-16by9" >
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/5mqAWHcnHYQ?rel=0" allowfullscreen></iframe>
                </div>
              </div>
              <div class="col-12">
                <p><br><br><br>
                  <b>Você:</b> Olá fulano, Tudo bem? Preciso falar com você! <br><br>
                  <b>Fulano:</b> Quem é? <br><br>
                  <b>Você:</b> Aqui é o <?php echo $_SESSION['nome'];?> , da Emergência 1 Treinamentos (Empresa que ministra o curso de APH online). Fico muito feliz que você está interessado em saber como se comportar diante de situações de emergência! <br><br>
                  <b>Você:</b> Já estou com a sua vaga reservada aqui. Posso te mandar o acesso agora! <br><br>
                  <b>Fulano:</b> Manda :) <br><br>
                  <b>Você:</b>  Para que eu possa liberar seu acesso o quanto antes, preciso que me envie o comprovante de pagamento. <br><br>
                  <b>Fulano:</b> Vou pagar então, ai te mando o comprovante... <br><br>
                  <b>Você:</b> No boleto demora de 1 a 2 dias úteis para o sistema identificar seu  pagamento. 
Se preferir tira um print ou uma foto do comprovante e nos envia, que a gente libera seu acesso em até 12hs. <br><br>

                </p>
              </div>
              </div>
            </div>
 
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 <a href="#" target="_blank">UpConvert</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Feito a Mão com <i class="mdi mdi-heart text-danger"></i></span>
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