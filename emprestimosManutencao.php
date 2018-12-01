<?php
    include "conexao.php";
    include "valida_sessao.php";
?>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <title>Cadastro</title>
    <link type="text/css" rel="stylesheet" href="estilo.css" />
</head>

<body>
    <div class="container">
        
        <center><img src="imagens/logo.png" alt="Logo do Sistema de Patrimonio versao 1.0" /></center>

        <nav>
            <ul class="nav">
                <li><a href="computadores.php">Computadores</li></a>
                <li><a href="perifericos.php">Perifericos</li></a>
                <li><a href="usuarios.php">Usuarios</li></a>
                <li><a href="emprestimosManutencao.php">Emprestimos e Manutencao</li></a>
                <li><a href="Dashboard.php">Dashboard</li></a>
            </ul>
        </nav>

    </div>

    <?php
        echo "<center><h3>Seja bem vindo(a) " .$_SESSION['usuario'] ."!</h3></center>";
    ?>

    <div class="conteudo">
        
        <form name="form1" method="post" action="administra.php">
            <center>

                <h2>Incluir Emprestimos e Manutencao</h2>

                <input type="hidden" name="operacao" value="incluir">

                <p>Codigo <input type="text" size="10" name="codigo" required>
                    <p>Nome do Produto <input type="text" size="20" name="nome" required></p>
                    <p>Preco <input type="text" size="10" name="preco" required>
                        <p><input type="submit" value="Incluir Produto" name="enviar">
                            <input type="reset" value="Limpar" name="enviar">
                        </p>
            </center>
        </form>

        <form name="form1" method="post" action="administra.php">
            <center>
                <h2>Excluir Emprestimos e Manutencao</h2>
                <input type="hidden" name="operacao" value="excluir">
                <p>Codigo <input type="text" size="10" name="codigo" required>
                    <p><input type="submit" value="Excluir Produto" name="enviar"></p>
            </center>
        </form>

        <form name="form1" method="post" action="administra.php">
            <center>
                <h2>Mostrar Emprestimos e Manutencao</h2>
                <input type="hidden" name="operacao" value="mostrar">
                <p>Clique no botao abaixo para exibir todos os Emprestimos e Manutencao da empresa.</p>
                <a href="form.php"><input type="button" value="Consulta Avancada" name="enviar"></a>
            </center><br />
        </form>

        <form name="form1" method="post" action="administra.php">
            <center>
                <h2>Alterar Emprestimos e Manutencao</h2>
                <input type="hidden" name="operacao" value="alterar">
                <p>Codigo: <input type="text" size="10" name="codigo" required>
                    <p>Nome do Produto: <input type="text" size="20" name="nome" required></p>
                    <p>Preco: <input type="text" size="10" name="preco" required>
                        <p><input type="submit" value="Alterar Produto" name="enviar"></p>
                        <p><a href="logout.php">LOGOUT</a></p>
            </center>
        </form>

    </div>


    <footer>
        <address>Avenida Thereza Ana Cecon Breda, s/n - Vila Sao Pedro - Hortolandia-SP - Brasil - Cep: 13183-250 -
            Telefone: (19) 3865-8070</address>
    </footer>
</body>

</html>