<?php
    include "conexao.php";
    include "valida_sessao.php";
?>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <title>Cadastro</title>
    <link type="text/css" rel="stylesheet" href="estilo.css"/>
    <link type="text/css" rel="stylesheet" href="bootstrap.min.css" />

</head>

<body>
    <div class="container">
        
        <center><img src="imagens/logo.png" alt="Logo do Sistema de Patrimonio versao 1.0" /></center>

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="computadores.php">Computadores</li></a>
                <li class="nav-item active"><a class="nav-link" href="perifericos.php">Periférico</li></a>
                <li class="nav-item"><a class="nav-link" href="usuarios.php">Usuários</li></a>
                <li class="nav-item"><a class="nav-link" href="emprestimosManutencao.php">Empréstimo e Manutenção</li></a>
                <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</li></a>
            </ul>
        </nav>

    </div>

    <?php
        echo "<center><h3>Seja bem vindo(a) " .$_SESSION['usuario'] ."!</h3></center>";
    ?>

    <div class="conteudo">
        
        <form name="form1" method="post" action="perifericos_administra.php">
            <center>

                <h2>Incluir Periféricos</h2>

                <input type="hidden" name="operacao" value="incluir">

                <p>Nome do Periférico <input type="text" size="10" name="nomePeriferico" required>
                <p>Descrição   <input type="text" size="20" name="descricao" required>
                <p>Responsável por Periférico (Username) <input type="text" size="20" name="username" required>
                        <p><input type="submit" value="Incluir Periférico" name="enviar">
                            <input type="reset" value="Limpar" name="enviar">
                        </p>
            </center>
        </form>

        <form name="form1" method="post" action="perifericos_administra.php">
            <center>
                <h2>Excluir Periféricos</h2>
                <input type="hidden" name="operacao" value="excluir">
                <p>Número do Periférico <input type="text" size="10" name="nomePeriferico" required>
                    <p><input type="submit" value="Excluir Produto" name="enviar"></p>
            </center>
        </form>

        <form name="form1" method="post" action="perifericos_administra.php">
            <center>
                <h2>Mostrar Periféricos</h2>
                <input type="hidden" name="operacao" value="mostrar">
                <p>Clique no botão abaixo para exibir todos os periféricos da empresa.</p>
                <a href="perifericos_form.php"><input type="button" value="Consulta Avançada" name="enviar"></a>
            </center><br/>
        </form>

        <form name="form1" method="post" action="perifericos_administra.php">
            <center>
                <h2>Alterar Periféricos</h2>
                <input type="hidden" name="operacao" value="alterar">
                    <p>Nome do Periférico <input type="text" size="10" name="nomePeriferico" required>
                    <p>Descrição <input type="text" size="20" name="descricao" required>
                        <p><input type="submit" value="Alterar Produto" name="enviar"></p>
                        <p><a href="logout.php">LOGOUT</a></p>
            </center>
        </form>

    </div>


    <footer>
        <address>SIECP - Sistema de Inventário e Empréstimos de Computadores e Periféricos</address>
    </footer>
</body>

</html>