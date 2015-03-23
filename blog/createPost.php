<?php $id = $_GET['admin']; //guardar o id do usuario administrador?>

<!DOCTYPE html>
<html>
	<head>
		<title>Renanblog</title>
		<link rel="stylesheet" href = "CSS/style.css">
		<script src = "js/goBack.js"></script>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
	</head>
	<body>
		<div>
			<form method="post" action="postar.php?admin=<?php echo $id; ?>">
				<fieldset>
					<legend>Post</legend>
						Título: <input type="text" name="titulo" size ="124"><br /><br />
						Conteúdo: <br />
						<textarea rows = "20" cols = "100" name="conteudo"></textarea><br /><br />
						Tagged: <input type="text" name="tag" size ="122"><br /><br />
						<input type="submit" name="postar">
				</fieldset>
			</form>
		</div>
		<button onclick="goBack()">Voltar</button>
	</body>
</html>