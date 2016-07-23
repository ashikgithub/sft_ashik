<?php
 
// include 'Model/config.php';
	class conn{	

	
		function __construct(){	
			global $pdo;
			try{
				$pdo = new PDO('mysql:host=localhost;dbname=my_database','root','');
			}
			catch (PDOException $e){
				exit('Database Error');
			}
		}
		
			
	
	}

?>