<?php
  $operacao = $_POST["operacao"];
  include "conexao.php";
  include "valida_sessao.php";
  
  if ($operacao=="incluir")
  {
    $nomeComputador = $_POST["nomeComputador"];  
    $modelo = $_POST["modeloComputador"];
    $tipoMaquina = $_POST["tipoMaquina"];
    $centroCusto = $_POST["centroCusto"];
    $inicioAluguel = $_POST["inicioAluguel"];
    $fimAluguel = $_POST["fimAluguel"];
    $userName = $_POST["userName"];
    // add later
    echo $_SESSION['usuario'];

    $sql = "INSERT INTO computador (`nome_computador`, `modelo`, 
            `tipo`, `centro_de_custo`, `inicio_de_aluguel`, 
            `fim_de_aluguel`, `date_created`, `status`) VALUES ";
    $sql .= "('$nomeComputador', '$modelo', '$tipoMaquina', '$centroCusto', 
              '$inicioAluguel', '$fimAluguel', now(),'Ativado')";

    include "conexao.php";
    $resultado = mysqli_query($conexao, $sql);

    echo $sql;

    $sqlInter = "INSERT INTO `usuarios_computador`(`computador_idcomputador`, `usuarios_idUsuarios`) VALUES 
    ((SELECT c.idcomputador FROM computador c WHERE c.nome_computador = '$nomeComputador' LIMIT 1), 
    (SELECT idUsuarios FROM usuarios u WHERE u.nome_de_usuario = '$userName' LIMIT 1))";
     
    echo $sqlInter;

    include "conexao.php";
    $resultado = mysqli_query($conexao, $sqlInter);

    echo '<script type="text/javascript">
	          alert("Produto incluido com sucesso!");
          </script>';
    // header("Location: computadores.php");

  }
  // Adicionar campo "Ativado" e "Desativado"
  else if ($operacao=="excluir")
  {
    $nomeComputador = $_POST["nomeComputador"];  
    
    //$sql = "DELETE FROM produto WHERE codigo=$codigo"; // "UPDATE produto SET nome='$nome',preco='$preco' where codigo='$codigo'";
    $sql = "UPDATE `computador` SET `data_desativacao`= now(), 
            `status` = 'Desativado' WHERE `nome_computador`='$nomeComputador'";

    include "conexao.php";
    $resultado = mysqli_query($conexao, $sql);
    //retorna o numero de linhas afetados por uma operacao 
    
    if ($resultado==1)
    { 
      echo '<script type="text/javascript">
	            alert("Computador desativado com sucesso!");
            </script>';

  }
    else { 
      echo '<script type="text/javascript">
	            alert("Computador nao encontrado!");
            </script>'; 

    }
  } 
  else if ($operacao=="alterar")
  {
    $nomeComputador = $_POST["nomeComputador"];  
    $modelo = $_POST["modeloComputador"];
    $centroCusto = $_POST["centroCusto"];

    include "conexao.php";
   
    $sql = "UPDATE `computador` SET `centro_de_custo` = $centroCusto, 
        `modelo` = '$modelo' WHERE `nome_computador` = '$nomeComputador' ";
    
    include "conexao.php";

    $resultado = mysqli_query($conexao, $sql);
    //retorna o numero de linhas afetados por uma operacao 
    
    if ($resultado==1)
    { 
      echo '<script type="text/javascript">
	            alert("Computador Alterado com sucesso!");
            </script>';

  }
    else { 
      echo '<script type="text/javascript">
	            alert("Computador nao encontrado!");
            </script>'; 

    }
  }
  
  mysqli_close($conexao);//fecha a conexao com o BD
?>