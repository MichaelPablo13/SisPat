<?php
  $operacao = $_POST["operacao"];
  include "conexao.php"; 
  
  if ($operacao=="incluir")
  {
    $codigo = $_POST["codigo"];  
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $sql = "INSERT INTO produto VALUES ";
    $sql .= "('$codigo','$nome','$preco')";
    $resultado = mysql_query($sql);
     echo '<script type="text/javascript">
	alert("Produto inclu�do com sucesso!");
	</script>';
  }
  else if ($operacao=="excluir")
  {
    $codigo = $_POST["codigo"]; 
    $sql = "DELETE FROM produto WHERE codigo=$codigo";
    $resultado = mysql_query($sql);
    //retorna o n�mero de linhas afetados por uma opera��o 
    $linhas = mysql_affected_rows();
    if ($linhas==1)
    { echo '<script type="text/javascript">
	alert("Produto excluido com sucesso!");
	</script>'; }
    else { echo '<script type="text/javascript">
	alert("Produto n�o encontrado!");
	</script>'; }
  }
  
  else if ($operacao=="alterar")
  {
    $codigo = $_POST["codigo"];  
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $sql = "UPDATE produto SET nome='$nome',preco='$preco' where codigo='$codigo'";
    $resultado = mysql_query($sql);
    if(!$resultado)
    { die ("falha na execu�ao"); }
   else { echo '<script type="text/javascript">
	alert("Produto alterado com sucesso!");
	</script>'; }
  
  }

  mysql_close($conexao);//fecha a conex�o com o BD
?>