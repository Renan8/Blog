<?php
	require('connection.php'); // se estiver adicionado, adiciona de novo
	include('include_dao.php');
	
	$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Renanblog</title>
		<link rel="stylesheet" href = "css/styleRPost.css">
		<script src = "js/goBack.js"></script>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
	</head>
	<body>
	
		<div id="header">
				<header>
					<span class = "titulo">{myBlog}</span>
				</header>
		</div>
		<?php
			//Recuperar o post completo
			$result = DAOFactory::getPostDAO()->load($id);
			
			$contentPost = new Post();
			$contentPost = $result;
			$id = $contentPost->id;
			$idUse = $contentPost->idUsuario;
			$titulo = $contentPost->titulo;
			$data = $contentPost->Data;
			$corpo = $contentPost->corpo;
			
			// Recuperar o nome do usuario que criou o post pelo id_usuario
			$aux = DAOFactory::getUsuarioDAO()->load($idUse); 
			$use = new Usuario();
			$use = $aux;
			
			$nome = $use->nome;
			
		?>		
			<fieldset>
				<div id="tPost" class = "post">
										
						<?php 					
							$texto = $titulo."\n";
							echo nl2br($texto); // nl2br para o navegador reconhecer a quebra de linha
						?>
						
						<span id = "inf">
							<?php
								echo "Por: ".$nome." | ".$data;
							?>
						</span>
				</div>
						
				<div id="cPost" class = "post">
					<?php
						$texto = $corpo;
						echo nl2br($texto); // Reconhecer quebra de linha
					?> 
				</div>
		
			<div id = "tagged" class = "post">
				Veja mais sobre:
				<?php
					$result = DAOFactory::getTagDAO()->load($id); // Encontrar todas as tag do post
					$tag = new Tag();
					foreach($result as $single){
						
						$tag = $single;
						$nome = $tag->nome;
						$id = $tag->id;
						echo "<a href = 'tagged.php?id=$id'>$nome</a> | ";
					}
				?>
			</fieldset>
			</div>
		 <img class = "voltar" src="img/voltar.png" onclick="goBack()" />
		 
	</body>
</html>