<?php


class input extends main
{
	protected $table='users';
	protected $table1='to_do_lists';
	public $type= 'user';
	
	public function setFname($fname)
	{
		$this->_fname=$fname;
	}
	public function setLname($lname)
	{
		$this->_lname=$lname;
	}
	public function setEmail($email)
	{
		$this->_email=$email;
	}
	public function setSession($session)
	{
		$this->_session=$session;
	}
	public function setRoll($roll)
	{
		$this->_roll=$roll;
	}
	public function setSubject($subject)
	{
		$this->_subject=$subject;
	}
	public function setPassword($pwd)
	{
		$this->_pwd=$pwd;
	}
	
	public function insert()
	{
 		global $pdo;
		$sql ="insert into $this->table(
				user_fname,
				user_lname, 
				user_email, 
				user_session, 
				user_roll, 
				user_subject,
				user_pwd,
				user_type
				) 
			values(?,?,?,?,?,?,?,?)";
		$stmt = $pdo->prepare($sql);

		return $stmt->execute(array(
			$this->_fname,
			$this->_lname,
			$this->_email,
			$this->_session,
			$this->_roll,
			$this->_subject,
			$this->_pwd,
			$this->type
		));
		
	}
	public function update($ID)
	{
		global $pdo;
		$stmt= $pdo->prepare("UPDATE $this->table SET 
			user_fname=?,
			user_lname=?, 
			user_email=?, 
			user_session=?, 
			user_roll=?, 
			user_subject=? 
			WHERE user_id=? 
		");
		$stmt->execute(array(
			$this->_fname,
			$this->_lname,
			$this->_email,
			$this->_session,
			$this->_roll,
			$this->_subject,
			$ID
		));
	}
	/*code here for user login*/

	public function setPass($password){
		$this->_password=$password;

	}
	public function setEml($email){
		$this->_email=$email;

	}

	public function login()
	{
		global $pdo;
		$stmt = $pdo-> prepare("SELECT * FROM $this->table WHERE user_email =? AND user_pwd =? ");
		$stmt->execute(array($this->_email,$this->_password));
		$result = $stmt->fetch();
		$count = $stmt->rowCount();
		if($count == 1)
		{
			session_start();
			$_SESSION['login'] = true;
			$_SESSION['uid'] = $result['user_id'];
			return true;
		}
		else
		{
			return false;
		}
		
	}
	
}
?>