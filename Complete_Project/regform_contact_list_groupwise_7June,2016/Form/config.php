<!-- database configuration here --><?php	//mysql_connect('localhost','root','') or die(mysql_error());	//mysql_select_db("sign_up");	/*$dbhost='localhost';	$dbname='sign_up';	$dbuser='root';	$dbpass='';	try	{		$db= new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass); //conection		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	}	catch(PDOException $e)	{		echo "connection error".$e->getMessage();	}*/	$dbhost='localhost';	$dbname='sign_up';	$dbuser='root';	$dbpass='';	try	{		$db=new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);			}		catch(PDOException $e)	{		echo " conection error".$e->getMessage();	}?>