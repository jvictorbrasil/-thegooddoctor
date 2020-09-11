<?php
include("conexao.php");
session_start();
$login = $_POST['login'];
$senha = $_POST['password'];
unset($_SESSION['logandoErro']);
$query =  "SELECT * FROM medicos where login = '".$login."' AND senha = '".$senha."'";
$logar=mysqli_query($conexao, $query);
$usuario = mysqli_fetch_object($logar);

if(mysqli_num_rows($logar) > 0){
    $_SESSION['idMedico'] = $usuario->id;
    $_SESSION['nome'] = $usuario->nome;
    $_SESSION['sobrenome'] = $usuario->sobrenome;
    $_SESSION['crm'] = $usuario->crm;
    $_SESSION['avatar'] = $usuario->avatar;
    header('Location: painel.php');
}else{
    $_SESSION['logandoErro'] = "Usuario ou senha incorretos";
    header('Location: index.php');
}

