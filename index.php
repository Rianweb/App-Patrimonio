<?php
session_start();
require "conexao.php";
require "config.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

  <title>Patrimônio</title>

  <!-- Bootstrap core CSS -->
  <link href="<?= BASE_URL ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!--
Ramayana CSS Template
https://templatemo.com/tm-529-ramayana
-->

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/fontawesome.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/templatemo-style.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/owl.css">

</head>

<body class="is-preload">

  <!-- Wrapper -->
  <div id="wrapper">
    <!-- Main -->
    <div id="main">
      <div class="inner">

        <!-- Header -->
        <header id="header">
          <div class="logo">
            <a href="<?= BASE_URL ?>/home">Patrimônio</a> 
          </div>
          <div class="botao_sair">
            <a href="<?= BASE_URL ?>/sair">
            <img title="Sair" src="<?= BASE_URL ?>/assets/images/logout.png"></a>
          </div> 
        </header>
        

        <?php
        
        $nivel_necessario = 1;

        // Verifica se não há a variável da sessão que identifica o usuário
        if (!isset($_SESSION['usuario']) && ($_SESSION['nivel'] < $nivel_necessario)) {
          // Destrói a sessão por segurança
          session_destroy();
          // Redireciona o visitante de volta pro login
          header("Location:login.php");
          exit;
        }

        if (isset($_SESSION['usuario']) && isset($_SESSION['nivel'])) {
          $url = isset($_GET['url']) ? $_GET['url'] : "home";
          if (file_exists($url . ".php")) {
            require  dirname(__FILE__) . "/{$url}.php";
          } else {
            require  dirname(__FILE__) . "{$url}.php";
          }
        }
        ?>

      </div>
      <!-- Aqui -->
    </div>

    <!-- Sidebar -->
    <div id="sidebar">

      <div class="inner">

        <!-- Search Box -->
        <section id="search" class="alt">
          <form method="get" action="#">
            <input type="text" name="search" id="search" placeholder="Pesquisar" />
          </form>
        </section>

        <!-- Menu -->
        <nav id="menu">
          <ul>
            <li><a href="<?= BASE_URL ?>/home">Página Inicial</a></li>
            <li><a href="<?= BASE_URL ?>/pages/consulta">Consulta</a></li>
            <li><a href="<?= BASE_URL ?>/pages/relatorio">Relatórios</a></li>
            <li><a href="<?= BASE_URL ?>/pages/atualizar">Atualizar</a></li>
            <li>
              <span class="opener">Cadastrar</span>
              <ul>
                <li><a href="<?= BASE_URL ?>/pages/item">Cadastro de Item</a></li>
                <li><a href="<?= BASE_URL ?>/pages/local">Cadastro de Local</a></li>
                <li><a href="<?= BASE_URL ?>/pages/departamento">Cadastro de Departamento</a></li>
              </ul>
            </li>
            <li><a href="<?= BASE_URL ?>/sair">Sair</a></li>
            <!-- <li>
                  <span class="opener">Dropdown Two</span>
                  <ul>
                    <li><a href="#">Sub Menu #1</a></li>
                    <li><a href="#">Sub Menu #2</a></li>
                    <li><a href="#">Sub Menu #3</a></li>
                  </ul> 
               </li>  -->
            <!-- <li><a href="<?= BASE_URL ?>/home">External Link</a></li> -->
          </ul>
        </nav>

        <!-- Featured Posts -->
        <div class="featured-posts">
          <div class="heading">
            <h2>Featured Posts</h2>
          </div>
          <div class="owl-carousel owl-theme">
            <a href="#">
              <div class="featured-item">
                <img src="<?= BASE_URL ?>/assets/images/featured_post_01.jpg" alt="featured one">
                <p>Aliquam egestas convallis eros sed gravida. Curabitur consequat sit.</p>
              </div>
            </a>
            <a href="#">
              <div class="featured-item">
                <img src="<?= BASE_URL ?>/assets/images/featured_post_01.jpg" alt="featured two">
                <p>Donec a scelerisque massa. Aliquam non iaculis quam. Duis arcu turpis.</p>
              </div>
            </a>
            <a href="#">
              <div class="featured-item">
                <img src="<?= BASE_URL ?>/assets/images/featured_post_01.jpg" alt="featured three">
                <p>Suspendisse ac convallis urna, vitae luctus ante. Donec sit amet.</p>
              </div>
            </a>
          </div>
        </div>
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">

        <!-- Footer -->
        <footer id="footer">
          <p class="copyright">Copyright &copy; 2019 Company Name
            <br>Designed by <a rel="nofollow" href="https://www.facebook.com/templatemo">Template Mo</a>
          </p>
        </footer>

      </div>
    </div>

  </div>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="<?= BASE_URL ?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?= BASE_URL ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="<?= BASE_URL ?>/assets/js/browser.min.js"></script>
  <script src="<?= BASE_URL ?>/assets/js/breakpoints.min.js"></script>
  <script src="<?= BASE_URL ?>/assets/js/transition.js"></script>
  <script src="<?= BASE_URL ?>/assets/js/owl-carousel.js"></script>
  <script src="<?= BASE_URL ?>/assets/js/custom.js"></script>
</body>

</html>