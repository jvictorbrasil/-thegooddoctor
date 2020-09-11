<?php
include("conexao.php");
session_start();

$caracteresCliente = $_POST['caracteresCliente'];

if($caracteresCliente != "" && is_numeric($caracteresCliente[0])){
  $query =  "SELECT * FROM pacientes where medico_id = ".$_SESSION['idMedico']." AND cpf like '%".$caracteresCliente."%'";
}else{
  $query =  "SELECT * FROM pacientes where medico_id = ".$_SESSION['idMedico']." AND nome like '%".$caracteresCliente."%'";
}

$buscaClientes =mysqli_query($conexao, $query);

while($campo=mysqli_fetch_array($buscaClientes)){ ?>
<tr data-toggle="modal">
<th><center><?=(new DateTime($campo["dataatendimento"]))->format('d/m/Y');?></center></th>
  <th><center><?=$campo["nome"]?></center></th>
  <td><center><?=$campo["cpf"]?></center></td>
  <td><center><?=$campo["telefone"]?></center></td>
  <td><center><a id="laudoMedico" href="#" onclick="abrirModal(<?=$campo["id"]?>)"><i class="fas fa-search-plus" title="Clique para mais informações"></i></a></center></td>
</tr>
<?php }?>