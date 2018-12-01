<?php
include "conexao.php";
?>

<html>

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
   <title>Cadastro</title>
   <link type="text/css" rel="stylesheet" href="estilo.css" />
</head>

<body>
   <form name="form1" method="post" action="cadastro_sistema.php">
      <center>
         <img src="imagens/logo.png" alt="Logo do Sistema de Patrimonio versao 1.0" />
         <h2>Incluir Usuarios</h2>
         <p>Usuario <input type="text" size="10" name="usuario" required>
            Senha <input type="password" size="10" name="senha" required></p>
         <p>Area <input type="text" size="40" name="area" required></p>
         <p>Email <input type="email" size="30" name="email" required></p>
         <p><input type="submit" value="Incluir Usuario" name="enviar">
            <input type="reset" value="Limpar" name="enviar"></p>
         <p><a href="logout.php">LOGOUT</a></p>
      </center>
   </form>

</body>

</html>