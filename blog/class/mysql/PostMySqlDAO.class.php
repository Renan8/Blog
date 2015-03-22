<?php
/**
 * Class that operate on table 'post'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-03-20 20:46
 */
class PostMySqlDAO implements PostDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return PostMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM post WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM post';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	public function queryLimit($limit, $offset){ 
		$sql = 'SELECT * FROM post ORDER BY dat DESC LIMIT '.$limit.' OFFSET '.$offset; // ordenando pela última data
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM post ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param post primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM post WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PostMySql post
 	 */
	public function insert($post){
		$sql = 'INSERT INTO post (id_usuario, titulo, _data, corpo) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($post->idUsuario);
		$sqlQuery->set($post->titulo);
		$sqlQuery->set($post->Data);
		$sqlQuery->set($post->corpo);

		$id = $this->executeInsert($sqlQuery);	
		$post->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param PostMySql post
 	 */
	public function update($post){
		$sql = 'UPDATE post SET id_usuario = ?, titulo = ?, _data = ?, corpo = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($post->idUsuario);
		$sqlQuery->set($post->titulo);
		$sqlQuery->set($post->Data);
		$sqlQuery->set($post->corpo);

		$sqlQuery->setNumber($post->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM post';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}
	
	public function queryByIdUsuario($value){
		$sql = 'SELECT * FROM post WHERE id_usuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTitulo($value){
		$sql = 'SELECT * FROM post WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByData($value){
		$sql = 'SELECT * FROM post WHERE _data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCorpo($value){
		$sql = 'SELECT * FROM post WHERE corpo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByIdUsuario($value){
		$sql = 'DELETE FROM post WHERE id_usuario = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTitulo($value){
		$sql = 'DELETE FROM post WHERE titulo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByData($value){
		$sql = 'DELETE FROM post WHERE _data = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCorpo($value){
		$sql = 'DELETE FROM post WHERE corpo = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return PostMySql 
	 */
	protected function readRow($row){
		$post = new Post();
		$post->id=$row['id'];
		$post->idUsuario = $row['id_usuario'];
		$post->titulo = $row['titulo'];
		$post->Data = $row['dat'];
		$post->corpo = $row['corpo'];

		return $post;
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
	 * @return PostMySql 
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