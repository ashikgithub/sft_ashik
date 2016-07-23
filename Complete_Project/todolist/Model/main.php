<?php
include "Model/conn.php";

abstract class main{
	protected $table;
	protected $table1;

	/*abstract function insert();
	abstract function update($ID);
	abstract function createList($ID,$title,$description,$datetime,$status);
	abstract function updateTask($ttitle,$tdes,$date,$tid);*/
	
	function __construct()
	{
		$dbase = new conn();
	}
	public function getID()
	{
		return $_SESSION['uid'];
	}
	
	public function getUser($id)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT * FROM $this->table WHERE user_id=?"); 
		$stmt->execute(array($id));

		return $stmt->fetchAll();
	}
	public function getSession()
	{
		return @$_SESSION['login'];
	}
	public function viewProfile($ID)
	{
		global $pdo;
		$stmt = $pdo->prepare("SELECT * FROM $this->table WHERE user_id=?");
		$stmt->execute(array($ID));
		return $stmt->fetchAll();
	}
	public function delete($id){
		global $pdo;
		$stmt= $pdo->prepare("DELETE FROM $this->table WHERE user_id=?");
		return $stmt->execute(array($id));
	}
	public function task_view($id){
		global $pdo;$tid="";
		$stmt = $pdo->prepare("SELECT task_id,task_title,task_description,date,task_status
							FROM $this->table1 WHERE user_id=?");
		$stmt->execute(array($id));
		$result= $stmt->fetchAll();
		
		return $result;
	}
	public function task_eidt($taskid)
	{
		global $pdo;
		$stmt= $pdo->prepare(" SELECT task_title,task_description,date FROM $this->table1 WHERE task_id=? ");
		$stmt->execute(array($taskid));
		$result= $stmt->fetchAll();
		
		return $result;
	}
	public function taskDelete($tsid){
		global $pdo;

		$stmt = $pdo->prepare("DELETE FROM $this->table1  WHERE task_id=? ");
		$stmt->execute(array($taskid));
		return true;		
	}
}
?>