<?php
	require('connection.php'); // se estiver adicionado, adiciona de novo
	include('include_dao.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Renanblog</title>
		<link rel="stylesheet" href = "css/styleForm.css">
		<link rel="stylesheet" href = "css/stylePadrao.css">
		<script src = "js/goBack.js"></script>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
	</head>
	<body>
	
		<header id = "titulo">Crie uma conta</header>
		
		<section id = "box">
			<form id="cadastro" method="post" action="cadastrar.php">
				<fieldset>
						<label>Nome:</label><input type = "text" name = "nome"><br /><br />
						 E-mail: <input type = "text" name = "email"><br /><br />
						<label>Senha:</label><input type = "password" name = "senha"><br /><br />
						Foto: <input type = "file" name = "foto"><br /><br />
						<input type = "submit" value = "Confirmar" name = "confirmar">
				</fieldset>
			</form>
		</section>
		<br /><br /><br />
		<footer>
			<img class = "voltar" src = "img/voltar.png" onclick="goBack()" />
		</footer>
		
	</body>
</html>