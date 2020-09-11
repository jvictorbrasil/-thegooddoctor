<?php
include("conexao.php");

$idCliente = $_POST['idCliente'];

$query =  "SELECT * FROM pacientes where id = ".$idCliente;
$buscaCliente =mysqli_query($conexao, $query);
$cliente = mysqli_fetch_object($buscaCliente);

// var_dump($cliente);
?>
<div>
    <p><b>Nome: </b><?=ucwords($cliente->nome)?></p>
    <p><b>CPF: </b><?=$cliente->cpf?></p>
    <p><b>Telefone: </b><?=$cliente->telefone?></p>
    <p><b>Data Atendimento: </b><?=(new DateTime($cliente->dataatendimento))->format('d/m/Y');?></p>
    <p><b>Sintomas: </b><?=$cliente->sintomas?></p>
    <div class="form-group">
    <label for="exampleFormControlTextarea1"><b>Observações: </b></label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" disabled ><?=$cliente->observacoes?></textarea>
  </div>
</div>