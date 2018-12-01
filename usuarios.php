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
                <li><a href="dashboard.php">Dashboard</li></a>
            </ul>
        </nav>

    </div>

    <?php
        echo "<center><h3>Seja bem vindo(a) " .$_SESSION['usuario'] ."!</h3></center>";
    ?>

    <div class="conteudo">
        
        <form name="form1" method="post" action="usuarios_administra.php">
            <center>

                <h2>Incluir Usuarios</h2>

                <input type="hidden" name="operacao" value="incluir">

                <p>Nome  <input type="text" size="10" name="nome" required>
                <p>Sobrenome <input type="text" size="20" name="sobrenome" required></p>
                <p>Departamento <input type="text" size="10" name="departamento" required>
                <p>Localizacao <input type="text" size="10" name="localizacao" required>
                <p>Centro de Custo <input type="text" size="10" name="centroDeCusto" required>
                <p>Nome de Usuario <input type="text" size="10" name="nomeUsuario" required>
                <p>Responsavel de TI <input type="text" size="10" name="ResponsavelTi" required>
                    <p><input type="submit" value="Incluir Usuario" name="enviar">
                        <input type="reset" value="Limpar" name="enviar">
                    </p>
            </center>
        </form>

        <form name="form1" method="post" action="usuarios_administra.php">
            <center>
                <h2>Excluir Usuarios</h2>
                <input type="hidden" name="operacao" value="excluir">
                <p>Nome de Usuario <input type="text" size="10" name="nomeUsuario" required>
                    <p><input type="submit" value="Excluir Produto" name="enviar"></p>
            </center>
        </form>

        <form name="form1" method="post" action="usuarios_administra.php">
            <center>
                <h2>Mostrar Usuarios</h2>
                <input type="hidden" name="operacao" value="mostrar">
                <p>Clique no botao abaixo para fazer consultas sobre os usuarios da Empresa X.</p>
                <a href="form.php"><input type="button" value="Consulta Avancada" name="enviar"></a>
            </center><br />
        </form>

        <form name="form1" method="post" action="usuarios_administra.php">
            <center>
                <h2>Alterar Usuarios</h2>
                <input type="hidden" name="operacao" value="alterar">
                    <p>Nome  <input type="text" size="10" name="nome" required>
                    <p>Sobrenome <input type="text" size="20" name="sobrenome" required></p>
                    <p>Departamento <input type="text" size="10" name="departamento" required>
                    <p>Localizacao <input type="text" size="10" name="localizacao" required>
                    <p>Centro de Custo <input type="text" size="10" name="centroDeCusto" required>
                    <p>Nome de Usuario <input type="text" size="10" name="nomeUsuario" required>
                    <p>Responsavel de TI <input type="text" size="10" name="ResponsavelTi" required>
                        <p><input type="submit" value="Alterar Usuario" name="enviar"></p>
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