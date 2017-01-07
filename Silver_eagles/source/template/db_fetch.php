<?php
	session_start();

	// Database Credentials
	$dbHost     = "localhost";  //Location Of Database usually its localhost 
	$dbUser     = "root";   	//Database User Name 
	$dbPass     = "";   		//Database Password 
	$dbDatabase = "wolfpack"; 	//Database Name 
	
	$db         = new PDO("mysql:dbname=$dbDatabase;host=$dbHost;port=3306", $dbUser, $dbPass);
	
	// Fetch 'employees' table
	$sql_employee_info = $db->prepare("	SELECT * FROM employees
										WHERE account_id = ? 
										LIMIT 1");
										
	$sql_employee_info->bindValue(1,$_SESSION['account_id']);
	$sql_employee_info->execute(); 
	
	$row_employee_info = $sql_employee_info->fetch();
	

	// Fill $_SESSION with 'employees' information
	$_SESSION['firstname'] 		= $row_employee_info['firstname'];
	$_SESSION['lastname'] 		= $row_employee_info['lastname'];
	$_SESSION['language'] 		= $row_employee_info['language'];
//
// LADDER SHOULD BE AN ARRAY
// FIX LATER
    $_SESSION['ladder_type'] 	= $row_employee_info['ladder_type'];
	$_SESSION['sales_type']		= $row_employee_info['sales_type'];
	$_SESSION['branch_id']		= $row_employee_info['branch_id'];
	$_SESSION['employee_id']    = $row_employee_info['employee_id'];
	$_SESSION['email']			= $row_employee_info['email'];
	$_SESSION['phone']			= $row_employee_info['phone'];
	
	// Fetch 'branches' table
	$sql_branch = $db->prepare("SELECT * FROM branches
								WHERE branch_id = ?
								LIMIT 1");
								
	$sql_branch->bindValue(1,$_SESSION['branch_id']);
	$sql_branch->execute();
	
	$branch_row = $sql_branch->fetch();
	
	// Set branch in session
	$_SESSION['branch'] = $branch_row['branch_name'];

?>