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
						$result = DAOFactory::getPostDAO()->queryLimit(2);
						
						foreach($result as $single){
							$contentPost = new Post();
							$contentPost = $single;
							$idPost = $contentPost->id;
						    $idUsuario = $contentPost->idUsuario;
							$titulo = $contentPost->titulo;
							$Data = $contentPost->Data;
							$corpo = $contentPost->corpo;
					?>
					
					<div id="postagem">
						<div id="tPost"><?php echo $titulo; ?></div>
						<div id="cPost">
							<?php echo limString($corpo, 300, false); ?> 
							<a href = "#">Leia mais</a>
						</div>
					</div>
					
					
					<?php
						}
					?>
					
					
				</div>
				
				<div id="direita">
				
					<div id="sideBar">
						<div id="tSideBar">Categorias</div>
						<div id="cSideBar">
							<ul>
								<li><a href = "#">Todas as postagens</a></li>
							</ul>
						</div>
						
					</div>
					
					<div id="sideBar">
						<div id="tSideBar">Login</div>
						<div id="cSideBar">
							<form method="post" action="logar.php"></form>
								E_mail:
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


