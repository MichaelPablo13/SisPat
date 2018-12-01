<?php
  $operacao = $_POST["operacao"];
  include "conexao.php";
  include "valida_sessao.php";
  
  if ($operacao=="incluir")
  {
    $nomePeriferico = $_POST["nomePeriferico"];  
    $descricao = $_POST["descricao"];
    $userName = $_POST["username"];

    // add later
    // $_SESSION['usuario'];

    $sql = "INSERT INTO `periferico`(`nome_periferico`, `descricao`, `data_criado`, `status`) VALUES ";
    $sql .= "('$nomePeriferico', '$descricao', now(), 'Ativado')";

    include "conexao.php";
    $resultado = mysqli_query($conexao, $sql);

    echo $sql;

    $sqlInter = "INSERT INTO `usuarios_perifericos`(`periferico_idPeriferico`, `usuarios_idUsuarios`) VALUES 
    ((SELECT p.`idPeriferico` FROM `periferico` p WHERE p.nome_periferico = '$nomePeriferico' LIMIT 1), 
    (SELECT idUsuarios FROM usuarios u WHERE u.nome_de_usuario = '$userName' LIMIT 1))";
     
    echo $sqlInter;

    include "conexao.php";
    $resultado = mysqli_query($conexao, $sqlInter);

    echo '<script type="text/javascript">
	          alert("Produto incluido com sucesso!");
          </script>';
    // header("Location: perifericos.php");

  }
  // Adicionar campo "Ativado" e "Desativado"
  else if ($operacao=="excluir")
  {
    $nomePeriferico = $_POST["nomePeriferico"];  
    include "conexao.php";
    //$sql = "DELETE FROM produto WHERE codigo=$codigo"; // "UPDATE produto SET nome='$nome',preco='$preco' where codigo='$codigo'";
    $sql = "UPDATE `perifericos` SET `data_desativacao`= now(), 
            `status` = 'Desativado' WHERE `nome_periferico`='$nomePeriferico'";
    $resultado = mysqli_query($conexao, $sql);
    //retorna o numero de linhas afetados por uma operacao 
    
    echo $sql;

    if ($resultado==1)
    { 
      echo '<script type="text/javascript">
	            alert("Usuario desativado com sucesso!");
            </script>';

  }
    else { 
      echo '<script type="text/javascript">
	            alert("Usuario nao encontrado!");
            </script>'; 

    }
  } 
  else if ($operacao=="alterar")
  {
    $nomePeriferico = $_POST["nomePeriferico"];  
    $descricao = $_POST["descricao"];

    include "conexao.php";
   
    $sql = "UPDATE `perifericos` SET `descricao` = '$descricao' WHERE `nome_computador`='$nomePeriferico'";
    
    include "conexao.php";

    $resultado = mysqli_query($conexao, $sql);
    //retorna o numero de linhas afetados por uma operacao 
    
    if ($resultado==1)
    { 
      echo '<script type="text/javascript">
	            alert("Periferico desativado com sucesso!");
            </script>';

  }
    else { 
      echo '<script type="text/javascript">
	            alert("Periferico nao encontrado!");
            </script>'; 

    }
  }
  
  mysqli_close($conexao);//fecha a conexao com o BD
?>