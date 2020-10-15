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

$chave = 159357;

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
                </span>Configuração do Post</h3>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <h2>Guia de Configuração do POSTBACK</h2>
                <hr>
                <div class="col-6">
              </div>
              <div class="col-12">
                <p><b>POSTBACK Monetizze</b> - Nas configurações de postback da Monetizze, você deverá configurar o postback com o link que disponibilizaremos para você!</p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMonetizze">
                Clique aqui
                </button>                
              </div>
              <hr>
              <div class="col-12">
                <p><b>POSTBACK Hotmart</b> - Nas configurações de Webhook (API e Notificações), você deverá configurar o postback com o link que disponibilizaremos para você!</p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalHotmart">
                Clique aqui
                </button>                
              </div>
              <hr>
              <div class="col-12">
                <p><b>POSTBACK Eduzz</b> - Na aba Avançado, clicke em Webhook. Clique então em NOVA URL preenchendo o nome com "Upconvert" e a URL você deverá configurar o postback com o link que disponibilizaremos para você!</p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEduzz">
                Clique aqui
                </button>                
              </div>
              <hr>
              <div class="col-12">
                <p><b>POSTBACK Braip</b> - Nas configurações de postback da Braip, você deverá configurar o postback com o link que disponibilizaremos para você!</p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBraip">
                Clique aqui
                </button>                
              </div>
              </div>
            </div>
 
          </div>
          <!-- Modal -->
        <div class="modal fade" id="modalMonetizze" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">POSTBACK Monetizze</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                Link para o POSTBACK:
                <input id="linkPostMonetizze" value="https://upconvert.com.br/app/db_connect/postMonetizze.php?id=<?php echo(intval($_SESSION['id_user'])*$chave); ?>" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" onclick="copiarMonetizze()" class="btn btn-primary" id="butCop" data-dismiss="modal">Copiar</button>
                </div>
                </div>
            </div>
        </div>

          <!-- Modal -->
        <div class="modal fade" id="modalHotmart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">POSTBACK Hotmart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                Link para o POSTBACK:
                <input id="linkPostHotmart" value="https://upconvert.com.br/app/db_connect/postHotmart.php?id=<?php echo(intval($_SESSION['id_user'])*$chave); ?>" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" onclick="copiarHotmart()" class="btn btn-primary" id="butCop2" data-dismiss="modal">Copiar</button>
                </div>
                </div>
            </div>
        </div>

          <!-- Modal -->
          <div class="modal fade" id="modalEduzz" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">POSTBACK Eduzz</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                Link para o POSTBACK:
                <input id="linkPostEduzz" value="https://upconvert.com.br/app/db_connect/postEduzz.php?id=<?php echo(intval($_SESSION['id_user'])*$chave); ?>" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" onclick="copiarEduzz()" class="btn btn-primary" id="butCop2" data-dismiss="modal">Copiar</button>
                </div>
                </div>
            </div>
        </div>

         <!-- Modal -->
         <div class="modal fade" id="modalBraip" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">POSTBACK Braip</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                Link para o POSTBACK:
                <input id="linkPostBraip" value="https://upconvert.com.br/app/db_connect/postBraip.php?id=<?php echo(intval($_SESSION['id_user'])*$chave); ?>" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" onclick="copiarBraip()" class="btn btn-primary" id="butCop" data-dismiss="modal">Copiar</button>
                </div>
                </div>
            </div>
        </div>


        <script>
		 function copiarMonetizze() {
		  /* Get the text field */
		  var copyText = document.getElementById("linkPostMonetizze");

		  /* Select the text field */
		  copyText.select();
		  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

		  /* Copy the text inside the text field */
		  document.execCommand("copy");

		  /* Alert the copied text */
		  alert("Texto copiado!");
		}
		</script>
		<script>
		 function copiarHotmart() {
		  /* Get the text field */
		  var copyText = document.getElementById("linkPostHotmart");

		  /* Select the text field */
		  copyText.select();
		  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

		  /* Copy the text inside the text field */
		  document.execCommand("copy");

		  /* Alert the copied text */
		  alert("Texto copiado!");
		}
		</script>
    <script>
		 function copiarEduzz() {
		  /* Get the text field */
		  var copyText = document.getElementById("linkPostEduzz");

		  /* Select the text field */
		  copyText.select();
		  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

		  /* Copy the text inside the text field */
		  document.execCommand("copy");

		  /* Alert the copied text */
		  alert("Texto copiado!");
		}
		</script>
        <script>
		 function copiarBraip() {
		  /* Get the text field */
		  var copyText = document.getElementById("linkPostBraip");

		  /* Select the text field */
		  copyText.select();
		  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

		  /* Copy the text inside the text field */
		  document.execCommand("copy");

		  /* Alert the copied text */
		  alert("Texto copiado!");
		}
		</script>

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