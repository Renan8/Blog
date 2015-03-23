<!DOCTYPE html>
<html>
	<head>
		<title>Renanblog</title>
		<link rel="stylesheet" href = "CSS/styleLogin.css">
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
	</head>
	<body>
	
		<div id = box>
		
			<div id = "cadastro">
				<form method="post" action="confirmacao.php">
					<fieldset>
						<legend class = "borda">Login</legend>
							E-mail: <input type = "text" name = "email">
							Senha: <input type = "password" name = "senha">
							<input type = "submit" value = "Entrar" name = "entrar" id = "botao">
					</fieldset>
				</form>
			</div>
			
			<div class = "cadastrar">
				<a href="cadastro.php">Cadastrar</a>
			</div> 
			
			<div class = "visitante">
				<a href="index.php?admin=0">Entrar como visitante</a>
			</div>
		</div>
		
	</body>
</html>