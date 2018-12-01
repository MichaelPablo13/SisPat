<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Consulta</title>
<link rel="stylesheet" href="estilo.css"></link>
</head>

<body>

<?php
  include "conexao.php";

  $campo = $_POST["campo"];
  $operador = $_POST["operador"];
  $valor = $_POST["valor"];
  $ordenar = $_POST["ordenar"];
  $forma_ordem = $_POST["forma_ordem"];   

  $sql = "SELECT * FROM usuario";
  
  if($operador <> "CONTEM"){
    $sql = $sql . " WHERE " . $campo . $operador . "'" . $valor . "'";
  } else {
      $sql = $sql . " WHERE " . $campo . " LIKE " . "'%" . $valor . "%'"; } 

  $sql = $sql . " ORDER BY " . $ordenar . " " . $forma_ordem;

  echo $sql;
  
  $resultado = mysqli_query($conexao, $sql);
  $total_registros = mysqli_num_rows($resultado);
?>

<div class="cabecalho">
	     <center><img src="imagens/logo.png" alt="Logo"/></center>
	</div>
	<br />
	
<div class="conteudo">
<table BORDER="1" BORDERCOLOR="black" cellspacing="0" align="center">
<thead>
<tr BGCOLOR="tan">
  <td align="center">Nome do Computador</td>
  <td align="center">Modelo</td>
  <td align="left">Centro de Custo</td>
  <td align="left">Inicio de Aluguel</td>
  <td align="left">Status</td>
  <td align="center">Fim de Aluguel</td>
</tr>
</thead>



<?php
while ($reg = mysqli_fetch_array($resultado))
{
   $nomeComputador = $reg["nome_computador"];
   $modelo = $reg["modelo"];
   $centroDeCusto = $reg["centro_de_custo"];
   $inicioAluguel = $reg["inicio_de_aluguel"];
   $status = $reg["status"];
   $fimDeAluguel = $reg["fim_de_aluguel"];
?>

<tr>
  <td align="center"><?php print $nomeComputador; ?></td>
  <td align="left"><?php print $modelo; ?></td>
  <td align="left"><?php print $centroDeCusto; ?></td>
  <td align="left"><?php print $inicioAluguel; ?></td>
  <td align="left"><?php print $status; ?></td>
  <td align="center"><?php print $fimDeAluguel; ?></td>
</tr>

<?php
} //fecha while
?>

</table>
<p><center><a href="computadores_form.php">VOLTAR</a></center></p>
</div>

<form method="post" action="usuarios_export_csv.php" align="center">  
  <input type="submit" name="export" 
      value="Exportar todos Usuarios" class="btn btn-success" />  
</form>  

</body></html>

<?php
mysqli_free_result($resultado);
mysqli_close($conexao);
?>