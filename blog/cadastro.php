<?php
	require('connection.php'); // se estiver adicionado, adiciona de novo
	include('include_dao.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Renanblog</title>
		<link rel="stylesheet" href = "CSS/styleCadastro.css">
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
	</head>
	<body>
		<span id = "titulo">Crie uma conta</span>
		<div id = "box">
		<form id="cadastro" method="post" action="cadastrar.php">
				<fieldset style="width: 150%; height: 250%;">
						Nome: 
						<input type = "text" name = "nome">
						E-mail: 
						<input type = "text" name = "email">
						Senha: 
						<input type = "password" name = "senha">
						Foto: <input type = "file" name = "foto">
						<input type = "submit" value = "Confirmar" name = "confirmar">
				</fieldset>
		</form>
		</div>
	</body>
</html>