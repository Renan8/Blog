<?php $id = $_GET['admin']; //guardar o id do usuario administrador?>

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
		<header id = "titulo">Crie seu post</header>
		<section id = "box">
			<form id = "cadastro" method="post" action="postar.php?admin=<?php echo $id; ?>">
				<fieldset>
						Título: <input type="text" name="titulo" size ="124"><br /><br />
						Conteúdo: <br />
						<textarea name="conteudo"></textarea><br /><br />
						Tagged: <input type="text" name="tag" size ="122"><br /><br />
						<input type="submit" name="postar" value = "Postar">
				</fieldset>
			</form>
		</section>
		<br /><br /><br />
		<footer>
			<img class = "voltar" src = "img/voltar.png" onclick="goBack()" />
		</footer>
	</body>
</html>