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
	
		$idUsuario = $_POST['admin'];
		$titulo = $_POST['titulo'];
		$corpo = $_POST['conteudo'];
		$tag = $_POST['tag'];
		$data = date("Y-m-d"); //data atual
		
		$tags = split(',', $tag); // Quebrando a string em tags separadas por ','
		
		$post = new Post();
		$post->idUsuario = $idUsuario;
		$post->titulo = $titulo;
		$post->corpo = $corpo;
		$post->Data = $data;
		
		if(empty($titulo) || empty($corpo) || empty($data)){echo "Existe campo não preenchido";}
		else {
			$tagged = new Tag();
			
			// Inserindo as tags na tabela tag e recuperando is id's
			for($i = 0; $i < count($tags); $i++){
				$tagged->nome = $tags[$i];
				$ids_tag[$i] = DAOFactory::getTagDAO()->insert($tagged);
			}
			// Inserindo o post e recuperando o id
			$id_post = DAOFactory::getPostDAO()->insert($post);
				
			// Inserindo na tabela Tem 
			$tem = new Tem();
			$tem->idPost = $id_post;
			for($i = 0; $i < count($tags); $i++){
				$tem->idTag = $ids_tag[$i];
				DAOFactory::getTemDAO()->insert($tem);
			}
			
			// Voltar para a página inicial
			header("location: index.php");
		} 
	}
?>
