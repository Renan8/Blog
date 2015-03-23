<!DOCTYPE html>
<html>
	<head>
		<title>Renanblog</title>
		<link rel="stylesheet" href = "CSS/style.css">
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
	</head>
	<body>
		<div>
			<form method="post" action="confirmacao.php">
				<fieldset>
					<legend>Login</legend>
						E-mail: <input type = "text" name = "email">
						Senha: <input type = "password" name = "senha">
						<input type = "submit" value = "Entrar" name = "entrar">
				</fieldset>
			</form>
		</div>
		<div id="visitante">
			<a href="index.php?admin=0">Entrar como visitante</a>
		</div>
	</body>
</html>