<?php

	$_host_Blog = "localhost";
	$_user_Blog = "root";
	$_pass_Blog = "";
	$_database_Blog = "blog";
	
	$conn = @mysql_connect($_host_Blog, $_user_Blog, $_pass_Blog) or die (mysql_error());
	@mysql_select_db($_database_Blog) or die (mysql_error);
	
?>