<?php
  $operacao = $_POST["operacao"];
  include "conexao.php";
  include "valida_sessao.php";
  
  if ($operacao=="incluir")
  {
    $nome = $_POST["nome"];  
    $sobrenome = $_POST["sobrenome"];
    $departamento = $_POST["departamento"];
    $centroCusto = $_POST["centroDeCusto"];
    $nomeUsuario = $_POST["nomeUsuario"];
    $localizacao = $_POST["localizacao"];
    $ResponsavelTi = $_POST["ResponsavelTi"];
    // add later
    // $_SESSION['usuario'];

    $sql = "INSERT INTO `usuarios`(`nome`, `sobrenome`, `departamento`, 
      `centro_de_custo`, `localizacao`, `nome_de_usuario`, 
      `responsavel_it`, `active`, `data_criacao`) VALUES  ";
    $sql .= "('$nome', '$sobrenome', '$departamento', '$centroCusto', '$localizacao', 
    '$nomeUsuario', (SELECT u.idUsuarios FROM usuarios u where u.nome_de_usuario = '$ResponsavelTi' LIMIT 1),
              1, 'now()')";

    include "conexao.php";
    $resultado = mysqli_query($conexao, $sql);

    echo $sql;

    echo '<script type="text/javascript">
	          alert("Usuarios incluido com sucesso!");
          </script>';
    header("Location: usuarios.php");

  }
  // Adicionar campo "Ativado" e "Desativado"
  else if ($operacao=="excluir")
  {
    $nomeUsuario = $_POST["nomeUsuario"];  
    
    //$sql = "DELETE FROM produto WHERE codigo=$codigo"; // "UPDATE produto SET nome='$nome',preco='$preco' where codigo='$codigo'";
    $sql = "UPDATE `usuarios` SET `data_desativacao`= now(), 
            `active` = 0 WHERE `nome_de_usuario`='$nomeUsuario'";

    echo $sql;

    include "conexao.php";
    $resultado = mysqli_query($conexao, $sql);
    //retorna o numero de linhas afetados por uma operacao 
    
    if ($resultado==1)
    { 
      echo '<script type="text/javascript">
	            alert("Usuario desativado com sucesso!");
            </script>';
      header("Location: usuarios.php");

  }
    else { 
      echo '<script type="text/javascript">
	            alert("Usuario nao encontrado!");
            </script>'; 
      header("Location: usuarios.php");
    }
  } 
  else if ($operacao=="alterar")
  {
    $nome = $_POST["nome"];  
    $sobrenome = $_POST["sobrenome"];
    $departamento = $_POST["departamento"];
    $centroCusto = $_POST["centroDeCusto"];
    $nomeUsuario = $_POST["nomeUsuario"];
    $localizacao = $_POST["localizacao"];
    $ResponsavelTi = $_POST["ResponsavelTi"];

    include "conexao.php";
   
    $sql = "UPDATE `usuarios` SET `data_criacao`= now(), nome='$nome', departamento='$departamento',
            centro_de_custo=$centroCusto, sobrenome='$sobrenome',
            nome_de_usuario=(SELECT u.idUsuarios FROM (SELECT * FROM usuarios) u where u.nome_de_usuario = '$ResponsavelTi' LIMIT 1) 
            WHERE `nome_de_usuario`='$nomeUsuario'";
    include "conexao.php";

    echo $sql;

    $resultado = mysqli_query($conexao, $sql);
    //retorna o numero de linhas afetados por uma operacao 
    
    if ($resultado==1)
    { 
      echo '<script type="text/javascript">
	            alert("Usuario Atualizado com sucesso!");
            </script>';
      header("Location: usuarios.php");
  }
    else { 
      echo '<script type="text/javascript">
	            alert("Usuario Atualizado nao encontrado!");
            </script>';
      header("Location: usuarios.php");
    }
  }
  
  mysqli_close($conexao);//fecha a conexao com o BD
?>