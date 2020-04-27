<?php
if (session_start()) {
session_start();
if(isset($_SESSION['login']) && isset($_SESSION['senha'])){
$logado = $_SESSION['login'];
$func = $_SESSION['id'];
$senh = $_SESSION['senha'];
$ide = $_SESSION['func'];
}else{
session_unset();
session_destroy();
}
}
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://guilherme.cerestoeste.com.br/script/script.js"></script>
    <script type="text/javascript" src="https://guilherme.cerestoeste.com.br/script/gambiarra.js"></script>
    
    <link href='https://fonts.googleapis.com/css?family=Raleway:900,300' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" type="text/css" href="../../style/style.css">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
  </head>
  <body>
    
    <header class="header-paralax img-fluid responsive">
      <h1></h1>
    </header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light menu">
      <a class="navbar-brand" href="https://guilherme.cerestoeste.com.br"><img src="https://guilherme.cerestoeste.com.br/img/iconeCerestSite.png" id="icone">CEREST OESTE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
      Menu
      </button>
      <div class="navbar-collapse collapse menu" id="conteudoNavbarSuportado">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?= ($activePage == 'index') ? 'active':''; ?>">
            <a class="nav-link" href="https://guilherme.cerestoeste.com.br/index.php#t">Início
              <span class="sr-only">(página atual)</span>
            </a>
          </li>
          <li class="nav-item <?= ($activePage == 'o_cerest') ? 'active':''; ?>">
            <a class="nav-link" href="https://guilherme.cerestoeste.com.br/o_cerest.php#t">O Cerest</a>
          </li>
          <li class="nav-item <?= ($activePage == 'equipe') ? 'active':''; ?>">
            <a class="nav-link" href="https://guilherme.cerestoeste.com.br/equipe.php#t">Equipe</a>
          </li>
          <li class="nav-item  <?= ($activePage == 'atendimento') ? 'active':''; ?>">
            <a class="nav-link" href="https://guilherme.cerestoeste.com.br/atendimento.php#t">Atendimento</a>
          </li>
          <li class="nav-item <?= ($activePage == 'abrangencia') ? 'active':''; ?>">
            <a class="nav-link" href="https://guilherme.cerestoeste.com.br/abrangencia.php#t">Abrangência</a>
          </li>
          <li class="nav-item <?= ($activePage == 'eventos') ? 'active':''; ?>">
            <a class="nav-link" href="https://guilherme.cerestoeste.com.br/eventos.php#t">Eventos</a>
          </li>
          <li class="nav-item <?= ($activePage == 'contato') ? 'active':''; ?>">
            <a class="nav-link" href="https://guilherme.cerestoeste.com.br/contato.php#t">Contato</a>
          </li>
          <li class="nav-item dropdown <?= ($activePage == 'publicacoes_legais') ? 'active':''; ?> <?= ($activePage == 'publicacoes_cerest') ? 'active':''; ?> <?= ($activePage == 'projetos_e_pesquisas') ? 'active':''; ?>">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Publicações
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="https://guilherme.cerestoeste.com.br/publicacoes_cerest.php#t">Publicações do CEREST</a>
              <a class="dropdown-item" href="https://guilherme.cerestoeste.com.br/publicacoes_saude_publica.php#t">Publicações em Saúde Pública</a>
              <a class="dropdown-item" href="https://guilherme.cerestoeste.com.br/publicacoes_legais.php#t">Publicações Legais</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Projetos/Pesquisa</a>
            </div>
          </li>
          <?php
          if(isset($_SESSION['login']) && isset($_SESSION['senha']) && $func==3){
            //se o usuario estiver logado, mostra a aba relatorio nucleos no menu
          if ($activePage == 'relatorio_nucleos') {
            //se o usuario logado estiver na pagina relatorio nucleos, a aba relatorio fica em negrito no menu
          echo "<li class='nav-item active'><a class='nav-link' href='https://guilherme.cerestoeste.com.br/relatorio_nucleos.php#t'>Relatório Semestral dos Núcleos</a></li>";
          }else{
          echo "<li class='nav-item'><a class='nav-link' href='https://guilherme.cerestoeste.com.br/relatorio_nucleos.php#t'>Relatório Semestral dos Núcleos</a></li>";
          }
          }
          if(isset($_SESSION['login']) && isset($_SESSION['senha']) && $func==1){
          $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
          if (strpos($actual_link, 'admin')) {
            //SE ESTIVER EM ALGUMA PAGINA DE ADMIN, O MENU FICA EM NEGRITO
          echo "<li class='nav-item dropdown active'>
            <a class='nav-link dropdown-toggle dropdown-item' href='https://guilherme.cerestoeste.com.br/admin/painel_admin.php#t' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
              Painel de Administração
            </a>
            <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
              <a class='dropdown-item' href='https://guilherme.cerestoeste.com.br/admin/admin_conselho_gestor/gerenciar_conselho_gestor.php#t'>Gerenciar Conselho Gestor</a>
              <a class='dropdown-item' href='https://guilherme.cerestoeste.com.br/admin/admin_noticias.php#t'>Gerenciar Noticias</a>
              <a class='dropdown-item' href='https://guilherme.cerestoeste.com.br/admin/admin_publicacoes/gerenciar_publicacoes.php#t'>Gerenciar Publicações</a>
              <a class='dropdown-item' href='https://guilherme.cerestoeste.com.br/admin/admin_eventos/gerenciar_eventos.php#t'>Gerenciar Eventos</a>
              <div role='separator' class='dropdown-divider'></div>
              <a class='dropdown-item' href='https://guilherme.cerestoeste.com.br/admin/painel_admin.php#t'>Painel de Administração</a>
            </div>
          </li>";
          }
          else{
          echo "<li class='nav-item dropdown'>
            <a class='nav-link dropdown-toggle' href='https://guilherme.cerestoeste.com.br/admin/painel_admin.php#t' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
              Painel de Administração
            </a>
            <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
              <a class='dropdown-item' href='https://guilherme.cerestoeste.com.br/admin/admin_conselho_gestor/gerenciar_conselho_gestor.php#t'>Gerenciar Conselho Gestor</a>
              <a class='dropdown-item' href='https://guilherme.cerestoeste.com.br/admin/admin_noticias.php#t'>Gerenciar Noticias</a>
              <a class='dropdown-item' href='https://guilherme.cerestoeste.com.br/admin/admin_publicacoes/gerenciar_publicacoes.php#t'>Gerenciar Publicações</a>
              <a class='dropdown-item' href='https://guilherme.cerestoeste.com.br/admin/admin_eventos/gerenciar_eventos.php#t'>Gerenciar Eventos</a>
              <div role='separator' class='dropdown-divider'></div>
              <a class='dropdown-item' href='https://guilherme.cerestoeste.com.br/admin/painel_admin.php#t'>Painel de Administração</a>
            </div>
          </li>";
          }
          }
          ?>
        </ul>
        
        <form class="form-inline my-2 my-lg-1">
          <?php
          if(isset($_SESSION['login']) && isset($_SESSION['senha'])){
          echo "<h5 class='mr-sm-2 texto-ola'>Olá, $logado</h5>";
          echo "<a type='button' class='btn btn-danger my-2 my-sm-1' href='https://guilherme.cerestoeste.com.br/logout.php'>Sair</a>";
          }elseif((!isset($_SESSION['login'])) && (!isset($_SESSION['senha']))){
          echo "<a class='btn btn-outline-success my-2 my-sm-1 btn-login' type='submit' href='https://guilherme.cerestoeste.com.br/login.php'>Login</a>";
          }
          ?>
        </form>
      </div>
      <a href="#" id="Voltar ao Topo" title="Voltar ao topo"  class="scrollToTop">^</a>
    </nav>    
  </body>
</html>