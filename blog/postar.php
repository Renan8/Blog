<?php
	require('connection.php'); // se estiver adicionado, adiciona de novo
	include('include_dao.php');
	
	$idUse = $_GET['admin'];
	$titulo = $_POST['titulo'];
	$corpo = $_POST['conteudo'];
	$tag = $_POST['tag'];
	$data = date("Y-m-d"); //data atual
		
	$tags = split(',', $tag); // Quebrando a string em tags separadas por ','
		
	$post = new Post();
	$post->idUsuario = $idUse;
	$post->titulo = $titulo;
	$post->corpo = $corpo;
	$post->Data = $data;
	
	if(empty($titulo) || empty($corpo) || empty($data)){echo "Existe campo não preenchido";}
	else {
		$tagged = new Tag();
			
		// Inserindo as tags na tabela tag e recuperando os id's
		for($i = 0; $i < count($tags); $i++){
		
			// Verificando se já existe a tag no banco de dados
			$tagged = DAOFactory::getTagDAO()->getIdNome($tags[$i]);
			echo $tagged->id;
			if(count($tagged) == 0){ // Se retornar 0 é pq não foi encontrado, insere no bd
				$tagged->nome = $tags[$i];
				$ids_tag[$i] = DAOFactory::getTagDAO()->insert($tagged);
			} else { // Caso contrário, guardar tag já existente
				$ids_tag[$i] = $tagged->id;
			}
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
		header("location: index.php?admin=$idUse");
	} 
?>
