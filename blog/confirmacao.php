<?php
	require('connection.php'); // se estiver adicionado, adiciona de novo
	include('include_dao.php');

	$email = $_POST['email'];
    $entrar = $_POST['entrar'];
    $senha = $_POST['senha'];
        if (isset($entrar)) {
            $result_email = DAOFactory::getUsuarioDAO()->queryByEMail($email); 
			$result_senha = DAOFactory::getUsuarioDAO()->queryBySenha($senha);
			
            if (count($result_email) == 0 || count($result_senha) == 0){
                echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.php';</script>";
                die();
            }else{
				setcookie("login",$login);
                header("Location:index.php?admin=");
            } 
        }
?>