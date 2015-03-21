<?php
	//include all DAO files
	require_once('class/sql/Connection.class.php');
	require_once('class/sql/ConnectionFactory.class.php');
	require_once('class/sql/ConnectionProperty.class.php');
	require_once('class/sql/QueryExecutor.class.php');
	require_once('class/sql/Transaction.class.php');
	require_once('class/sql/SqlQuery.class.php');
	require_once('class/core/ArrayList.class.php');
	require_once('class/dao/DAOFactory.class.php');
 	
	require_once('class/dao/PostDAO.class.php');
	require_once('class/dto/Post.class.php');
	require_once('class/mysql/PostMySqlDAO.class.php');
	require_once('class/mysql/ext/PostMySqlExtDAO.class.php');
	require_once('class/dao/TagDAO.class.php');
	require_once('class/dto/Tag.class.php');
	require_once('class/mysql/TagMySqlDAO.class.php');
	require_once('class/mysql/ext/TagMySqlExtDAO.class.php');
	require_once('class/dao/TemDAO.class.php');
	require_once('class/dto/Tem.class.php');
	require_once('class/mysql/TemMySqlDAO.class.php');
	require_once('class/mysql/ext/TemMySqlExtDAO.class.php');
	require_once('class/dao/UsuarioDAO.class.php');
	require_once('class/dto/Usuario.class.php');
	require_once('class/mysql/UsuarioMySqlDAO.class.php');
	require_once('class/mysql/ext/UsuarioMySqlExtDAO.class.php');

?>