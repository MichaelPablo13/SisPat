<?php

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

  session_start();

  if (IsSet($_SESSION["usuario"]))
      $usuario = $_SESSION["usuario"];
  if (IsSet($_SESSION["senha"]))
      $senha = $_SESSION["senha"];
  
  if(!(empty($usuario) OR empty($senha)))
  {
    include "conexao.php"; 
    $resultado = mysqli_query($conexao, "SELECT * FROM usuario_sistema WHERE usuario = '$usuario'");
   


    if (mysqli_num_rows($resultado)==1)
    {
      if ($senha != mysqli_result_custom($resultado, 0, "senha"))
      {
        unset ($_SESSION['usuario']);
        unset ($_SESSION['senha']);
        echo "Voce nao efetuou o LOGIN!";
        exit;
      }
    }
    else
    {
      unset ($_SESSION['usuario']);
      unset ($_SESSION['senha']);
      echo "Voce nao efetuou o LOGIN!";
      exit;
    }
  }
  else
  {
    echo "Voce nao efetuou o LOGIN!";
    exit;
  }
  mysqli_close($conexao);

?>