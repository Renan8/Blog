<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-03-20 20:46
 */
interface PostDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Post 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	public function queryLimit($limit, $offset);
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param post primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Post post
 	 */
	public function insert($post);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Post post
 	 */
	public function update($post);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByIdUsuario($value);

	public function queryByTitulo($value);

	public function queryByData($value);

	public function queryByCorpo($value);


	public function deleteByIdUsuario($value);

	public function deleteByTitulo($value);

	public function deleteByData($value);

	public function deleteByCorpo($value);


}
?>