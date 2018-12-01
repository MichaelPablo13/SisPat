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

  $sql = "SELECT * FROM periferico p 
          INNER JOIN usuarios_perifericos uc 
            ON uc.periferico_idPeriferico = p.idPeriferico 
          INNER JOIN usuarios u 
            ON u.idUsuarios = uc.usuarios_idUsuarios";
  
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
  <td align="center">Nome do Periferico</td>
  <td align="center">Descricao</td>
  <td align="left">Nome do Responsavel</td>
  <td align="left">Sobrenome do Responsavel</td>
  <td align="left">Username</td>
  <td align="center">Departamento</td>
  <td align="center">Data Criado</td>
</tr>
</thead>


<?php
while ($reg = mysqli_fetch_array($resultado))
{
   $nomePeriferico = $reg["nome_periferico"];
   $modelo = $reg["descricao"];
   $nome = $reg["nome"];
   $sobrenome = $reg["sobrenome"];
   $username = $reg["nome_de_usuario"];
   $departamento = $reg["departamento"];
   $dataCriado = $reg["data_criado"];
?>

<tr>
  <td align="center"><?php print $nomePeriferico; ?></td>
  <td align="left"><?php print $modelo; ?></td>
  <td align="left"><?php print $nome; ?></td>
  <td align="left"><?php print $sobrenome; ?></td>
  <td align="left"><?php print $username; ?></td>
  <td align="center"><?php print $departamento; ?></td>
  <td align="center"><?php print $dataCriado; ?></td>
</tr>

<?php
} //fecha while
?>

</table>

<p><center><a href="perifericos_form.php">VOLTAR</a></center></p>
</div>

<form method="post" action="perifericos_export_csv.php" align="center">  
  <input type="submit" name="export" 
      value="Exportar Perfericos CSV" class="btn btn-success" />  
</form>  


</body></html>

<?php
  mysqli_free_result($resultado);
  mysqli_close($conexao);
?>
