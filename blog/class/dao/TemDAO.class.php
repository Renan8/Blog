<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-03-20 20:46
 */
interface TemDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Tem 
	 */
	public function load($idPost, $idTag);

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
 	 * @param tem primary key
 	 */
	public function delete($idPost, $idTag);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Tem tem
 	 */
	public function insert($tem);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Tem tem
 	 */
	public function update($tem);	

	/**
	 * Delete all rows
	 */
	public function clean();



}
?>