<?php
/**
 * Class that operate on table 'tem'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-03-20 20:46
 */
class TemMySqlDAO implements TemDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TemMySql 
	 */
	public function load($idPost, $idTag){
		$sql = 'SELECT * FROM tem WHERE id_post = ?  AND id_tag = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idPost);
		$sqlQuery->setNumber($idTag);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tem';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tem ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tem primary key
 	 */
	public function delete($idPost, $idTag){
		$sql = 'DELETE FROM tem WHERE id_post = ?  AND id_tag = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($idPost);
		$sqlQuery->setNumber($idTag);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TemMySql tem
 	 */
	public function insert($tem){
		$sql = 'INSERT INTO tem ( id_post, id_tag) VALUES ( ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($tem->idPost);

		$sqlQuery->setNumber($tem->idTag);

		$this->executeInsert($sqlQuery);	
		//$tem->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TemMySql tem
 	 */
	public function update($tem){
		$sql = 'UPDATE tem SET  WHERE id_post = ?  AND id_tag = ? ';
		$sqlQuery = new SqlQuery($sql);
		

		
		$sqlQuery->setNumber($tem->idPost);

		$sqlQuery->setNumber($tem->idTag);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tem';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}



	
	/**
	 * Read row
	 *
	 * @return TemMySql 
	 */
	protected function readRow($row){
		$tem = new Tem();
		
		$tem->idPost = $row['id_post'];
		$tem->idTag = $row['id_tag'];

		return $tem;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return TemMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>