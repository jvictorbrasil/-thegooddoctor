<?php
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
        <form id="formCadastrapaciente" method="post" action="addPaciente.php">
          <h4>dados do paciente:</h4>
          <div class="form-row">
            <div class="form-group col-md-5">
              <label for="nome">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group col-md-2">
              <label for="cpf">CPF</label>
              <input type="text" minlength="14" maxlength="14" class="form-control" id="cpf" name="cpf" required onkeypress="$(this).mask('000.000.000-00');">
            </div>
            <div class="form-group col-md-2">
              <label for="telefone">Telefone</label>
              <input type="text" minlength="15" maxlength="15" class="form-control" id="telefone" name="telefone" required onkeypress="$(this).mask('(00) 00000-0009')">
            </div>
            <div class="form-group col-md-3">
              <label for="data">Data Atendimento</label>
              <div id="datepicker">
                <input type="date" minlength="10" maxlength="10" class="form-control" id="datateste" autocomplete="off" name="dataatendimento" required>
              </div>
            </div>
          </div>
          <h4>possiveis sintomas:</h4>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" id="febre" name="sintomas[]" value="Febre" class="custom-control-input">
            <label class="custom-control-label" for="febre">Febre</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" id="resfriado" name="sintomas[]" value="Resfriado" class="custom-control-input">
            <label class="custom-control-label" for="resfriado">Resfriado</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" id="pressaoAlta" name="sintomas[]" value="Pressão Alta" class="custom-control-input">
            <label class="custom-control-label" for="pressaoAlta">Pressão Alta</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" id="diarreia" name="sintomas[]" value="Diarréia" class="custom-control-input">
            <label class="custom-control-label" for="diarreia">Diarréia</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" id="outros" name="sintomas[]" value="Outros" class="custom-control-input">
            <label class="custom-control-label" for="outros">Outros</label>
          </div>
          <br><br>
          <div class="form-group">
            <label for="observacoes"><h4>observações médica:</h4></label>
            <textarea class="form-control" id="observacoes" name="observacoes" required rows="5"></textarea>
          </div>
          <div class="form-row">

          </div>
    
          <button id="cadastrar" type="submit" class="btn btn-primary">Cadastrar Paciente</button>
        </form>
            
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt-BR.min.js" integrity="sha512-mVkLPLQVfOWLRlC2ZJuyX5+0XrTlbW2cyAwyqgPkLGxhoaHNSWesYMlcUjX8X+k45YB8q90s88O7sos86636NQ==" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />
        
    </body>
</html>
