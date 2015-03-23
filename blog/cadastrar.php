<?php
	require('connection.php'); // se estiver adicionado, adiciona de novo
	include('include_dao.php');
	
	$use = new Usuario();
	$use->nome = $_POST['nome'];
	$use->eMail = $_POST['email'];
	$use->foto = $_POST['foto'];
	$use->Data = date("Y-m-d");
    $use->senha = $_POST['senha'];

	$confirmar = $_POST['confirmar'];
	
    if (isset($confirmar)) {
		$resp = DAOFactory::getUsuarioDAO()->queryByEMail($use->eMail); 
		if(count($resp) == 0){ 
			$result = DAOFactory::getUsuarioDAO()->insert($use); 
			$id = $use->id;
			header("Location:index.php?admin=$id");  
		} else {
			 echo"<script language='javascript' type='text/javascript'>alert('Email existente');window.location.href='cadastro.php';</script>";
		}
    }
?>