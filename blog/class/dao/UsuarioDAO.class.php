<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-03-20 20:46
 */
interface UsuarioDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Usuario 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param usuario primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Usuario usuario
 	 */
	public function insert($usuario);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Usuario usuario
 	 */
	public function update($usuario);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByNome($value);

	public function queryByEMail($value);

	public function queryByFoto($value);

	public function queryByData($value);

	public function queryBySenha($value);


	public function deleteByNome($value);

	public function deleteByEMail($value);

	public function deleteByFoto($value);

	public function deleteByData($value);

	public function deleteBySenha($value);


}
?>