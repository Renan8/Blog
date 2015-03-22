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
		<div>
			<form method="post" action="?go=postar">
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
	</body>
</html>

<?php
	if(@$_GET['go'] == 'postar'){
	
		$idUsuario = 1;
		$titulo = $_POST['titulo'];
		$corpo = $_POST['conteudo'];
		$tag = $_POST['tag'];
		$data = date("Y-m-d"); //data atual
		
		
		$post = new Post();
		$post->idUsuario = $idUsuario;
		$post->titulo = $titulo;
		$post->corpo = $corpo;
		$post->tag = $tag;
		$post->data = $data;
		
		if(empty($titulo) || empty($corpo) || empty($data)){echo "Existe campo não preenchido";}
		else {
			$result = DAOFactory::getPostDAO()->insert($post);
			header("location: index.php");
		} 
	}
?>
