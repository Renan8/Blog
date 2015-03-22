<?php
	require('connection.php'); // se estiver adicionado, adiciona de novo
	include('include_dao.php');

	$email = $_POST['email'];
    $entrar = $_POST['entrar'];
    $senha = $_POST['senha'];
        if (isset($entrar)) {
                     
            $verifica = mysql_query("SELECT * FROM usuario WHERE e_mail = '$email' AND senha = '$senha'") or die("erro ao selecionar");
                if (mysql_num_rows($verifica)<=0){
                    echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.php';</script>";
                    die();
                }else{
                    setcookie("login",$login);
                    header("Location:index.php?admin");
                }
        }
?>