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
		<?php
			$id = $_GET['id'];
			$result = DAOFactory::getPostDAO()->load($id);
			
			$contentPost = new Post();
			$contentPost = $result;
			$id = $contentPost->id;
			$idUse = $contentPost->idUsuario;
			$titulo = $contentPost->titulo;
			$data = $contentPost->Data;
			$corpo = $contentPost->corpo;
		?>		
					<div id="postagem">
						<div id="tPost">
						
						<?php 
							$texto = $titulo."\n Data:".$data;
							echo nl2br($texto); // nl2br para o navegador reconhecer a quebra de linha
							
						?></div>
						
						<div id="cPost">
							<?php echo $corpo ?> 
						</div>
					</div>

	</body>
</html>
