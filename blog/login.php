<!DOCTYPE html>
<html>
	<head>
		<title>Renanblog</title>
		<link rel="stylesheet" href = "css/styleLogin.css">
		<link rel="stylesheet" href = "css/stylePadrao.css">
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
	</head>
	<body>
	
		<section id = "box">
		
			<div id = "cadastro">
				<form method="post" action="confirmacao.php">
					<fieldset>
						<legend>Login</legend>
							E-mail: <input type = "text" name = "email"><br /><br />
							<label>Senha:</label> <input type = "password" name = "senha"> <br /><br />
							<input type = "submit" value = "Entrar" name = "entrar" id = "botao">
					</fieldset>
				</form>
			</div>
			
			<div id = "visitante">
				<a href="index.php?admin=0">Entrar como visitante</a>
			</div>
			
		</section>
		
	</body>
</html>