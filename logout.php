<?php
  session_start(); //inicializa a sessao
  $_SESSION = array(); //libera espaco alocado para as variaveis registradas
  session_destroy(); //elimina todos os dados de uma sessao
  
  //direciona para login.html
  header("Location: login.html");
?>