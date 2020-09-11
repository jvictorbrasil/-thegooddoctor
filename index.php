<?php
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.css">

    <title>The Good Doctor</title>
  </head>
<body>
<?php 
  if(isset($_SESSION['logandoErro'])){
?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <div class="text-center">
    Usuario ou senha incorretos
  </div>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php 
  }
?>
<div class="wrapper fadeInDown">
  <div id="formContent">
    
    <div class="fadeIn first">
      <img src="assets/img/logo.png" id="icon" alt="User Icon" />
    </div>

    <form method="post" action="login.php">
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="usuário">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="senha">
      <input type="submit" class="fadeIn fourth" value="Entrar">
    </form>

    <div id="formFooter">
      <p>The Good Doctor System!</p>
    </div>

  </div>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>