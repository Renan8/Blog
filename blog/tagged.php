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
	
	$idTag = $_GET['id'];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Blog me</title>
		<link rel="stylesheet" href = "CSS/style.css">
		<script src = "js/goBack.js"></script>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
	</head>
	<body>
	
		<div id="box">
			<div id="top"></div>
			
			<div id="header">
				<div id="subHeader">
					<div id="left">
						<span class="titulo">meBlog</span>
					</div>
				</div>
			</div>
	
			<div id="content">
				<div id="esquerda">
				
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
					
					<div id="postagem">
						<div id="tPost">
						<?php 
							$texto = $titulo;
							echo nl2br($texto); // nl2br para o navegador reconhecer a quebra de linha
							
						?></div>
						<div id="cPost">
							<?php echo limString($corpo, 300, false); ?> 
							<a href = "readPost.php?id=<?php echo $id;?>">Leia mais</a>
							
						</div>
					</div>
					
					
					<?php
						}
						$result = DAOFactory::getPostDAO()->queryAllIdTag($idTag); 
						$total = count($result); 
						if($ant >= 0){echo "<a href='tagged.php?p=$ant&id=$idTag'>previous</a> ";}
						// Fazer leitura do número de linhas da tabela pos
						if($prox < ($total/$numPost)){echo "<a href='tagged.php?p=$prox$&id=$idTag'>next</a>";} // ($total/numPost) numero de paginacoes maxima
																	
					?>
		            
					
				</div>
			</div>
			<button onclick="goBack()">Voltar</button>
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

