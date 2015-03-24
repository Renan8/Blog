<?php
	require('connection.php'); // se estiver adicionado, adiciona de novo
	include('include_dao.php');
	$numPost = 2; // numero de posts

	// Paginacao do post
	if(isset($_GET['p'])){$pag =  $_GET['p'];} 
    else {$pag = 0;}
	
	$ini = $pag * $numPost;	// offset da busca no banco de dados (valor inicial a procurar no select)
	// monitorando a pagina anterior e proxima
	$prox = $pag + 1; 
	$ant = $pag - 1;
	
	$use = $_GET['admin'];
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Blog me</title>
		<link rel="stylesheet" href = "css/style.css">
		<link rel="stylesheet" href = "css/stylePadrao.css">
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
	</head>
	<body>
		
			<div id="header">
				<header>
						<span class = "titulo">{myBlog}</span>
				</header>
				<span id = "newPost">
					<?php
						if($use != 0){
							echo "<a href='createPost.php?admin=$use'>Criar post</a>";
						} else {
							echo "<a href='cadastro.php'>Cadastrar</a>";
						}
					?>
				</span>
			</div>
			
			<section>
				
					<?php
						// Pegando 2 posts no banco de dados 
						$result = DAOFactory::getPostDAO()->queryLimit($numPost, $ini); 
						$contentPost = new Post();
						foreach($result as $single){
							
							$contentPost = $single;
							$id = $contentPost->id;
							$titulo = $contentPost->titulo;
							$data = $contentPost->Data;
							$corpo = $contentPost->corpo;
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
							$result = DAOFactory::getPostDAO()->queryAll(); 
							$total = count($result); 
							if($ant >= 0){echo "<a href='index.php?admin=$use&p=$ant'>previous</a> ";}
							// Fazer leitura do número de linhas da tabela pos
							// Generalizar $prox <= 2 para $prox <= $p_max
							if($prox < ($total/$numPost)){echo "<a href='index.php?admin=$use&p=$prox'>next</a>";} // ($total/numPost) numero de paginacoes maxima
																		
						?>
					</footer>
			</section>	
	</body>
</html>


<?php
	//Tirar isso daqui! (Arrumar uma classe)
	function limString($string, $value, $clean){
		if($clean == true){
			$string = stripp_tags($string);
		} 
		if(strlen($string) <= $value){
			return $string;
		}
		// Corte do texto no corpo do post
		$lim_String = substr($string, 0, $value);
		$last = strrpos($lim_String, ' '); // Procurar o ultimo espaco em branco (evitando cortar palavras ao meio)
		return substr($string, 0, $last);
	}
?>


