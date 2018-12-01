<?php
    include "conexao.php"; 
   
    $usuario = $_POST["usuario"]; 
    $senha = $_POST["senha"]; 
    $area = $_POST["area"];
    $email =  $_POST["email"];
    
    $senha = md5($senha);//encrypt the password before saving in the database
    
    $sql = "INSERT INTO usuario_sistema (`usuario`, `senha`, `area`, `email`, `data_criacao`, `desativado`) VALUES ";
    $sql .= "('$usuario','$senha','$area','$email',now(), 'Ativado')";
    
    echo $sql;

    $resultado = mysqli_query($conexao, $sql);
    
    echo '<script type="text/javascript">
    alert("Usuario cadastrado com sucesso!");</script>';
    


    mysqli_close($conexao);//fecha a conexao com o BD
 
    header("Location: login.html");

?>