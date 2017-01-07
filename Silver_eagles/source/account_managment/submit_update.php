<?php

	session_start();

	$dbHost     = "localhost";  //Location Of Database usually its localhost 
	$dbUser     = "root";   	//Database User Name 
	$dbPass     = "";   		//Database Password 
	$dbDatabase = "wolfpack"; 	//Database Name 
	$db         = new PDO("mysql:dbname=$dbDatabase;host=$dbHost;port=3306", $dbUser, $dbPass);

	if(isset($_POST['submit']))
	{
			 
		
		
// Confirm Admin's Password
		$sql_cred = $db->prepare("	SELECT * FROM accounts
									WHERE account_id = ?
									AND
									pass = ?
									LIMIT 1");
		$pas = hash('sha256', $_POST['pwd']);
		$sql_cred->bindValue(1, $_SESSION['account_id']);
		$sql_cred->bindValue(2, $pas);
		$sql_cred->execute();
		
// Find User's row in the Employees Table
			$sql_employee_info = $db->prepare("	SELECT * FROM employees
												WHERE account_id = ? 
												LIMIT 1");
										
			$sql_employee_info->bindValue(1,$_POST['account_id']);
			$sql_employee_info->execute(); 
			
// Check if User exists, and admin supplied correct credentials
			if(($sql_cred->rowCount() == 1) && ($sql_employee_info->rowCount() == 1))
			{
				$row = $sql_employee_info->fetch();
				
				if($_POST['firstname'] != $row['firstname'])
				{
					$sql= $db->prepare("UPDATE employees SET firstname = ? WHERE account_id = ?"); 
					$sql->bindValue(1, $_POST['firstname']);
					$sql->bindValue(2, $_POST['account_id']);
					$sql->execute();
					//echo 'Change firstname<br>';
				}

				if($_POST['lastname'] != $row['lastname'])
				{
					$sql= $db->prepare("UPDATE employees SET lastname = ? WHERE account_id = ?");
					$sql->bindValue(1, $_POST['lastname']);
					$sql->bindValue(2, $_POST['account_id']); 
					$sql->execute();
					//echo 'Change lastname<br>';
				}
				
				if($_POST['phone'] != $row['phone'])
				{
					$sql= $db->prepare("UPDATE employees SET phone = ? WHERE employee_id = ?");
					$sql->bindValue(1, $_POST['phone']);
					$sql->bindValue(2, $_POST['account_id']); 
					$sql->execute();
					//echo 'Change phone<br>';
				}
				
				if($_POST['email'] != $row['email'])
				{
					$sql= $db->prepare("UPDATE employees SET email = ? WHERE account_id = ?");
					$sql->bindValue(1, $_POST['email']);
					$sql->bindValue(2, $_POST['account_id']); 
					$sql->execute();
				
					$sql= $db->prepare("UPDATE accounts SET username = ? WHERE account_id = ?");
					$sql->bindValue(1, $_POST['email']);
					$sql->bindValue(2, $_POST['account_id']);
					$sql->execute();
					//echo 'Change email<br>';
				}
				
				if($_POST['branch_id'] != $row['branch_id'])
				{
					$sql= $db->prepare("UPDATE employees SET branch_id = ? WHERE account_id = ?");
					$sql->bindValue(1, $_POST['branch_id']);
					$sql->bindValue(2, $_POST['account_id']); 
					$sql->execute();
					//echo 'Change branch_id<br>';
				}
				
				// Language should be a whole new table. We'll talk about fixing that later. It's not hard...
				if($_POST['language'] != $row['language'])
				{
					//echo 'Change language<br>';
				}
				
				if($_POST['ladder_type'] != $row['ladder_type'])
				{
					$sql= $db->prepare("UPDATE employees SET ladder_type = ? WHERE account_id = ?");
					$sql->bindValue(1, $_POST['ladder_type']);
					$sql->bindValue(2, $_POST['account_id']); 
					$sql->execute();
					//echo'Change ladder_type<br>'
				}
				
				if($_POST['sales_type'] != $row['sales_type'])
				{
					$sql= $db->prepare("UPDATE employees SET sales_type = ? WHERE account_id = ?");
					$sql->bindValue(1, $_POST['sales_type']);
					$sql->bindValue(2, $_POST['account_id']); 
					$sql->execute();
					//echo 'Change sales_type<br>';
				}
				
				if(($_POST['pwd_n1'] === $_POST['pwd_n2']) && !empty($_POST['pwd_n1']))
				{ 

					$npas = hash('sha256', $_POST['pwd_n1']);
				
					$sql_new_pass = $db->prepare("UPDATE accounts SET pass = ? WHERE account_id = ?");
					$sql_new_pass->bindvalue(1, $npas);
					$sql_new_pass->bindValue(2, $_POST['account_id']);
				
					$sql_new_pass->execute();
				
//					echo 'Changed password<br>';
				
				}
				
				$_SESSION['message'] = '<strong>SUCCESS!</strong> Account #'. $_POST['account_id'] .' updated.';
			}
			else
			{
				$_SESSION['message'] = '<strong>FAILURE!</strong> Account #'. $_POST['account_id'] .' not updated.';
			}
	}
	else if(isset($_POST['delete']))
	{
		echo 'Delete instead!<br>';
		$sql_cred = $db->prepare("	SELECT * FROM accounts
									WHERE account_id = ?
									AND
									pass = ?
									LIMIT 1");
		$pas = hash('sha256', $_POST['pwd']);
		$sql_cred->bindValue(1, $_SESSION['account_id']);
		$sql_cred->bindValue(2, $pas);
		$sql_cred->execute();
		
		if($sql_cred->rowCount() == 1)
		{
			echo 'It\'s time to delete!!!<br>';
			
			$sql_del_emp = $db->prepare("	DELETE FROM employees
											WHERE account_id = ?
										");
										
			$sql_del_emp->bindValue(1, $_POST['account_id']);
			$sql_del_emp->execute();
			
			$sql_del_acc = $db->prepare("	DELETE FROM accounts
											WHERE account_id = ?
										");
										
			$sql_del_acc->bindValue(1, $_POST['account_id']);
			$sql_del_acc->execute();
			
			$_SESSION['message'] = '<strong>SUCCESS!</strong> Account #'. $_POST['account_id'] .' removed.';
		}
		else
		{
			$_SESSION['message'] = '<strong>FAILURE!</strong> Account #'. $_POST['account_id'] .' not found.';
		}
	}
	else
	{
		$_SESSION['message'] = '<strong>FAILURE!</strong> Attempt to access invalid page.';
	}

	header("Location: ../account_management/");
	exit;

?>
