<?php
class todoList extends main
{
	protected $table='users';
	protected $table1='to_do_lists';
	public $type= 'user';
	
	public function createList($ID,$title,$description,$datetime,$status){
		global $pdo;
		$stmt = $pdo->prepare(" insert into $this->table1(
								user_id,
								task_title,
								task_description,
								date,
								task_status) 
								values(?,?,?,?,?)
							");
		$stmt->execute(array($ID,$title,$description,$datetime,$status));
		return true;
	}
	
	public function updateTask($ttitle,$tdes,$date,$tid){
		global $pdo;
		$stmt= $pdo->prepare("UPDATE $this->table1 
								SET 
								task_title=?,
								task_description=?,
								date=?
								WHERE task_id=? ");
		$stmt->execute(array($ttitle,$tdes,$date,$tid));
		return true;
	}
	
}
?>