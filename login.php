<?php
  
  //obtem os valores digitados
  $usuario = $_POST["usuario"];
  $senha = $_POST["senha"];

  //Function to result set
  function mysqli_result_custom($search, $row, $field){
    $i=0; 
    while ($results = mysqli_fetch_array($search)){
      if ($i == $row){
        $result = $results[$field];
      }
      $i++;
    }

    return $result;
  }

  //acesso ao banco de dados
  include "conexao.php"; 
  $resultado = mysqli_query($conexao, "SELECT * FROM usuario_sistema WHERE usuario = '$usuario'");
  $linhas = mysqli_num_rows($resultado);
    
  //teste se a consulta retornou algum registro
  if ($linhas==0){
    echo "<html><body>";
    echo "<p align=\"center\">Usuario nao encontrado</p>";
    echo "<p align=\"center\"><a href=\"login.html\">Voltar</a></p>";
    echo "</body></html>";
  } else {
    //confere senha
    if ($senha != mysqli_result_custom($resultado, 0, "senha")){
      echo "<html><body>";
      echo "<p align=\"center\">A senha esta incorreta!</p>";
      echo "<p align=\"center\"><a href=\"login.html\">Voltar</a></p>";
      echo "</body></html>"; 
    } else {
      //usuario e senha corretos. Vamos criar a sessao 
      session_start();//inicializa a sessao
      $_SESSION['usuario']=$usuario;
      $_SESSION['senha']=$senha;
      //direciona para a pagina inicial dos usuarios cadastrados
      header("Location: computadores.php");
    }
  }
  
  mysqli_close($conexao);

?> 
