<?php
	require('connection.php'); // se estiver adicionado, adiciona de novo
	include('include_dao.php');
	include('limitar.php');
	
	$numPost = 2; // numero de posts

	// Paginacao do post
	if(isset($_GET['p'])){$pag =  $_GET['p'];} 
    else {$pag = 0;}
	
	$ini = $pag * $numPost;	// offset da busca no banco de dados (valor inicial a procurar no select)
	// monitorando a pagina anterior e proxima
	$prox = $pag + 1; 
	$ant = $pag - 1;
	
	$idTag = $_GET['id'];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Blog me</title>
		<link rel="stylesheet" href = "css/style.css">
		<link rel="stylesheet" href = "css/stylePadrao.css">
		<script src = "js/goBack.js"></script>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
	</head>
	<body>
		
			<div id="header">
				<header>
						<span class = "titulo">{myBlog}</span>
				</header>
			</div>
			
			<section>
				
					<?php
						// Pegando 2 posts no banco de dados 
						$post = new Post();
						$result = DAOFactory::getPostDAO()->queryLimitIdTag($idTag, $numPost, $ini); 
						
						foreach($result as $single){
							$post = $single;
							$id = $post->id;						
							$titulo = $post->titulo;
							$data = $post->Data;
							$corpo = $post->corpo;
					?>
					
					<fieldset>
						<div id="postagem">
							<div id="tPost" class = "post">
							<?php 
								$texto = $titulo;
								echo nl2br($texto); // nl2br para o navegador reconhecer a quebra de linha
							
							?></div>
							<div id="cPost" class = "post">
								<?php echo limString($corpo, 600, false); ?> ...
								<a id = "mais" href = "readPost.php?id=<?php echo $id;?>">+</a>
							
							</div>
						</div>
					</fieldset>
					
					<footer>
						<?php
						}
						$result = DAOFactory::getPostDAO()->queryAllIdTag($idTag); 
						$total = count($result); 
						if($ant >= 0){echo "<a id = 'ant' href='tagged.php?p=$ant&id=$idTag'>Anterior</a> ";}
						// Fazer leitura do número de linhas da tabela pos
						if($prox < ($total/$numPost)){echo "<a id = 'prox' href='tagged.php?p=$prox$&id=$idTag'>Próximo</a>";} // ($total/numPost) numero de paginacoes maxima
																	
					?>
					</footer>
			</section>	
			<footer>
				<img class = "voltar" src = "img/voltar.png" onclick="goBack()" />
			</footer>
	</body>
</html>