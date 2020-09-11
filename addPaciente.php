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
                  Medico: <?php echo ucfirst($_SESSION['nome'])." ".ucfirst($_SESSION['sobrenome']); ?>
                </div>
                <div>
                  CRM: <?php echo $_SESSION['crm']; ?>
                </div>
                <div>
                  <a class="nav-link js-scroll-trigger text-dark" href="logout.php">Deslogar</a>
                </div>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container">
        <br>
        <?php
            $nome=$_POST['nome'];
            $cpf=$_POST['cpf'];
            $telefone=$_POST['telefone'];
            $dataatendimento=$_POST['dataatendimento'];
            $date = (new DateTime($dataatendimento))->format('Y-m-d');
            $sintomas=implode(", ", $_POST['sintomas']);
            $observacoes=$_POST['observacoes'];
            $medico_id = $_SESSION['idMedico'];
            $sql=mysqli_query($conexao,"INSERT INTO pacientes(nome, cpf, telefone, dataatendimento, sintomas, observacoes, medico_id)VALUES ('$nome', '$cpf', '$telefone', '$date', '$sintomas', '$observacoes', $medico_id)");
            echo '<div class="alert alert-success" role="alert"><h4 class="alert-heading">Paciente cadastrado com sucesso!</h4><hr>
            <p class="mb-0">Você pode cadastrar um novo paciente clicando <a href="cadastrarPaciente.php">aqui</a>, ou listar seus atendimentos cliando <a href="listarAtendimentos.php">aqui!</a></p>
            </div>';
            mysqli_close($conexao);
        ?>
            
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
