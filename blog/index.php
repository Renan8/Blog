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
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Blog me</title>
		<link rel="stylesheet" href = "CSS/style.css">
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
						$result = DAOFactory::getPostDAO()->queryLimit($numPost, $ini); 
						
						foreach($result as $single){
							$contentPost = new Post();
							$contentPost = $single;
							$id = $contentPost->id;
							$titulo = $contentPost->titulo;
							$data = $contentPost->Data;
							$corpo = $contentPost->corpo;
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
						$result = DAOFactory::getPostDAO()->queryAll(); 
						$total = count($result); 
						if($ant >= 0){echo "<a href='index.php?p=$ant'>previous</a> ";}
						// Fazer leitura do número de linhas da tabela pos
						// Generalizar $prox <= 2 para $prox <= $p_max
						if($prox < ($total/$numPost)){echo "<a href='index.php?p=$prox'>next</a>";} // ($total/numPost) numero de paginacoes maxima
																		
					?>
		            
					
				</div>
				
				<div id="direita">
				
					<div id="sideBar">
						<div id="tSideBar">Login</div>
						<div id="cSideBar">
							<form method="post" action="logar.php"></form>
								E-mail:
									<input type = "text" name = "email"><br />
								Senha:
									<input type = "text" name = "senha"><br />
									<input type="submit" value="Entrar" />
						</div>
					</div>
					
				</div>
				
			</div>
			
			<div id="rodape">
				<div id="cRodape"></div>
			</div>
			
		</div>
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


