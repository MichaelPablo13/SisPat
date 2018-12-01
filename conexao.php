<?php

  namespace conexao;

  $error = array();

  $conexao = mysqli_connect('localhost:3306','root','');
  $db = mysqli_select_db($conexao ,'sistema_patrimonial');
  
  if (mysqli_connect_errno()) {
    printf("Conexao Falhou: %s\n", mysqli_connect_error());
    exit();
  }

?>