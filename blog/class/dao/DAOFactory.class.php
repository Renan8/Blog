<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return PostDAO
	 */
	public static function getPostDAO(){
		return new PostMySqlExtDAO();
	}

	/**
	 * @return TagDAO
	 */
	public static function getTagDAO(){
		return new TagMySqlExtDAO();
	}

	/**
	 * @return TemDAO
	 */
	public static function getTemDAO(){
		return new TemMySqlExtDAO();
	}

	/**
	 * @return UsuarioDAO
	 */
	public static function getUsuarioDAO(){
		return new UsuarioMySqlExtDAO();
	}
}
?>