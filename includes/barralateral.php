<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="assets/images/faces/face1.jpg" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?php echo $_SESSION['nome'];//Nome lateral ?></span>
                  <span class="text-secondary text-small">Usuário PRO</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="boleto-impresso.php">
                <span class="menu-title">Aguardando pgto</span>
                <i class="mdi mdi-timer-sand menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="boleto-vencido.php">
                <span class="menu-title">Boleto Vencido</span>
                <i class="mdi mdi-timer-off menu-icon"></i>
              </a>
            </li>
            <li class="nav-item" style="display: none;">
              <a class="nav-link" href="abandono.php">
                <span class="menu-title">Abandono de Checkout</span>
                <i class="mdi mdi-exit-to-app menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cc.php">
                <span class="menu-title">Cartão Cancelado</span>
                <i class="mdi mdi-credit-card-off menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="copy.php">
                <span class="menu-title">Copy Sugerida</span>
                <i class="mdi mdi-credit-card-off menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="configpost.php">
                <span class="menu-title">Configurar o POST</span>
                <i class="mdi mdi-email-outline menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="solicitarintegracao.php">
                <span class="menu-title">Solicitar integração</span>
                <i class="mdi mdi-email-outline menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>