<?php
	require('connection.php'); // se estiver adicionado, adiciona de novo
	include('include_dao.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Renanblog</title>
		<link rel="stylesheet" href = "CSS/style.css">
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
	</head>
	<body>
		<form method="post" action="cadastrar.php">
				<fieldset>
					<legend>Cadastro</legend>
						Nome: <input type = "text" name = "nome">
						E-mail: <input type = "text" name = "email"><br /><br />
						Senha: <input type = "password" name = "senha">
						Foto: <input type = "file" name = "foto"><br /><br />
						<input type = "submit" value = "Confirmar" name = "confirmar">
				</fieldset>
			</form>
	</body>
</html>