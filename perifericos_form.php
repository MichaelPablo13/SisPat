<html>
<head>
	<link rel="stylesheet" href="estilo.css"></link>
	<title>Sistema</title>
</head>
<body>
	<div class="cabecalho">
	     <center><img src="imagens/logo.png" alt="Logo"/></center>
	</div>
	<br />
	<div class="conteudo">
    <form method="post" action="perifericos_consulta.php">
<center>
<h2>Pesquisa de registros da tabela Periféricos</h2>
<p><h3>Etapa 1 - Seleção dos registros</h3></p>

<label>Campo
  <select name="campo">
    <option value="nome_periferico">Nome do Periferico</option>
    <option value="descricao">Descriacao</option>
    <option value="nome_de_usuario">Nome do Usuario Responsavel</option>
  </select>
</label>

<label>Operador
<select name="operador">
  <option value="=" selected="selected">Igual</option>
  <option value=">">Maior que</option>
  <option value=">=">Maior ou igual a</option>
  <option value="<">Menor que</option>
  <option value="<=">Menor ou igual a</option>
  <option value="<>">Diferente de</option>
  <option value="CONTEM">Contém</option>
</select></label>

<label>Valor
  <input type="text" name="valor" width="150" />
<br /> <br /> </label>

<p><h3>Etapa 2 - Ordenação dos registros</h3></p>
<label>Ordenar por
<select name="ordenar">
  <option value="nome_periferico">Nome do Periferico</option>
  <option value="descricao">Descriacao</option>
  <option value="nome_de_usuario">Nome do Usuario Responsavel</option>
</select></label>

<select name="forma_ordem">
  <option value="ASC" selected="selected">Crescente</option>
  <option value="DESC">Decrescente</option>
</select></label>

 
<p><input type="submit" class="botao" value="Pesquisar" name="Submit"></p>
<p><a href="perifericos.php">VOLTAR</a></p>
</center>
</form>
</div>
    
        
</body>
</html>