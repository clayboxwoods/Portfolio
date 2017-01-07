<?php 
	session_start();


	if(isset($_POST['submit']))
	{
		$_SESSION['message'] = '<strong>SUCCESS!</strong> New account created.';
		//	//	//	//	//
		// Login to database
		//
		$dbHost     = "localhost";  //Location Of Database usually its localhost 
		$dbUser     = "root";   	//Database User Name 
		$dbPass     = "";   		//Database Password 
		$dbDatabase = "wolfpack"; 	//Database Name 
		
		$db         = new PDO("mysql:dbname=$dbDatabase;host=$dbHost;port=3306", $dbUser, $dbPass);
		
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
		// Create new accounts row
		$sql_account =  "	INSERT into accounts (username, pass, usertype_id)
							VALUES('". $_POST['email']. "', '". hash('sha256', $_POST['pwd_n1']) ."', '". $_POST['user_id'] ."')";
		
		$db->exec($sql_account);
		
		// Create new employee row
		$sql_emp = "	INSERT INTO `employees` 
						SET `account_id`  =  (SELECT account_id FROM accounts WHERE username = '".$_POST['email']."' LIMIT 1 ),
							`firstname`   = '". $_POST['firstname']   ."', 
							`lastname`    = '". $_POST['lastname']    ."',
							`language`    = '". $_POST['language']    ."',
							`ladder_type` = '". $_POST['ladder_type'] ."',
							`sales_type`  = '". $_POST['sales_type']  ."',
							`branch_id`   = '". $_POST['branch_id']   ."',
							`phone`		  = '". $_POST['phone']       ."',
							`email`		  = '". $_POST['email']       ."'
					";
		$db->exec($sql_emp);
		
		
	}
	else
	{
		$_SESSION['message'] = '<strong>FAILURE!</strong> Attempt to access invalid page.';
	}
	
	header("Location: ../account_management/");
	exit;

?>