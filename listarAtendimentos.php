<?php
    include("conexao.php");
    session_start();
    if(!isset($_SESSION['nome'])){
      header('Location: index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>The Good Doctor</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="painel.php">
                <span class="d-block d-lg-none">The Good Doctor</span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="assets/img/avatars/<?=$_SESSION['avatar'];?>" alt="Avatar" /></span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="cadastrarPaciente.php">Cadastrar Paciente</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="listarAtendimentos.php">Listar Atendimentos</a></li>
                </ul>
            </div>
              <div class="p-2 text-white text-center"style="position: absolute; bottom: 0;">
                <div class="">
                  <?php echo ucfirst($_SESSION['nome'])." ".ucfirst($_SESSION['sobrenome']); ?>
                </div>
                <div>
                  <?php echo $_SESSION['crm']; ?>
                </div>
                <div>
                  <a class="nav-link js-scroll-trigger text-dark" href="logout.php">Deslogar</a>
                </div>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container">
        <br>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-4" id="buscaClientes" type="text" autocomplete="off" placeholder="Buscar por nome ou CPF" style="width: 300px;">
              <div  id="loading" class="spinner-border text-primary" role="status">
                <span class="sr-only">Loading...</span>
              </div>
            </form>
          </div>
          
        </nav>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col"><center>Data Atendimento</center></th>
                  <th scope="col"><center>Nome</center></th>
                  <th scope="col"><center>CPF</center></th>
                  <th scope="col"><center>Telefone</center></th>
                  <th scope="col"><center>Laudo Médico</center></th>
                </tr>
              </thead>
              <tbody id="tablePacientes">
              <?php 
                $seleciona=mysqli_query($conexao, "SELECT * FROM pacientes where medico_id = ".$_SESSION['idMedico']." order by dataatendimento ASC");
                while($campo=mysqli_fetch_array($seleciona)){ ?>
                <tr data-toggle="modal">
                  <th><center><?=(new DateTime($campo["dataatendimento"]))->format('d/m/Y');?></center></th>
                  <th><center><?=$campo["nome"]?></center></th>
                  <td><center><?=$campo["cpf"]?></center></td>
                  <td><center><?=$campo["telefone"]?></center></td>
                  <td><center><a id="laudoMedico" href="#" onclick="abrirModal(<?=$campo["id"]?>)"><i class="fas fa-search-plus" title="Clique para mais informações"></i></a></center></td>
                </tr>
              <?php }?>
              </tbody>
            </table>
        </div>
        <!-- MODAL PARA EXIBIR DADOS DO USUARIO -->
        <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalhes Laudo Médico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="exibeDados">
              </div>
              <div class="modal-footer">
                <div class="col-8">Atendido por: <?=ucfirst($_SESSION['nome'])." ".ucfirst($_SESSION['sobrenome'])?></div>
                <div class="col-2">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- MODAL PARA EXIBIR DADOS DO USUARIO -->

        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
