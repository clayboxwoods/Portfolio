<?php
	
	session_start();
	//header('Location: ../edit_account/');
	if(isset($_POST['submit']))
	{ 
    $dbHost     = "localhost";  //Location Of Database usually its localhost 
    $dbUser     = "root";   //Database User Name 
    $dbPass     = "";   //Database Password 
    $dbDatabase = "wolfpack"; //Database Name 
    //Connect to the databasse 
    $db         = new PDO("mysql:dbname=$dbDatabase;host=$dbHost;port=3306", $dbUser, $dbPass); 
	

	// Search for correct account
	$sql_id = $db->prepare("SELECT * FROM accounts 
        WHERE account_id = ? AND 
        pass = ? 
        LIMIT 1"); 	
		
		// Hash the password
		$pas = hash('sha256', $_POST['password']);

		// Set account id and password search parameters
		$sql_id->bindValue(1, $_SESSION['account_id']); 
		$sql_id->bindValue(2, $pas); 

		// Search for corresponding account
		$sql_id->execute(); 
		
		if($sql_id->rowCount() == 1)
		{
//			echo 'success <br>';
			 
			// Check First Name
			if($_SESSION['firstname'] != $_POST['firstname'])
			{
				$sql= $db->prepare("UPDATE employees SET firstname = ? WHERE account_id = ?"); 
				$sql->bindValue(1, $_POST['firstname']);
				$sql->bindValue(2, $_SESSION['account_id']);
				$sql->execute();
			}
			
			// Check Last Name
			if($_SESSION['lastname'] != $_POST['lastname'])
			{
				$sql= $db->prepare("UPDATE employees SET lastname = ? WHERE account_id = ?");
				$sql->bindValue(1, $_POST['lastname']);
				$sql->bindValue(2, $_SESSION['account_id']); 
				$sql->execute();
			}
			
			// Check branch
			if( $_POST['branch_id'] != $_SESSION['branch_id'])
			{
				$sql= $db->prepare("UPDATE employees SET branch_id = ? WHERE account_id = ?");
				$sql->bindValue(1, $_POST['branch_id']);
				$sql->bindValue(2, $_SESSION['account_id']); 
				$sql->execute();
			}
			// Check language(s)
			
			// Check Ladder Type
			if( $_POST['ladder_type'] != $_SESSION['ladder_type'])
			{
				$sql= $db->prepare("UPDATE employees SET ladder_type = ? WHERE account_id = ?");
				$sql->bindValue(1, $_POST['ladder_type']);
				$sql->bindValue(2, $_SESSION['account_id']); 
				$sql->execute();
			}
			
			// Check certs
			if( $_SESSION['sales_type'] != $_POST['sales_type'][0])
			{
				$sql= $db->prepare("UPDATE employees SET sales_type = ? WHERE account_id = ?");
				$sql->bindValue(1, $_POST['sales_type'][0]);
				$sql->bindValue(2, $_SESSION['account_id']); 
				$sql->execute();
			}
			
			// Check Phone Number
			if( $_SESSION['phone'] != $_POST['phone'] )
			{
				$sql= $db->prepare("UPDATE employees SET phone = ? WHERE employee_id = ?");
				$sql->bindValue(1, $_POST['phone']);
				$sql->bindValue(2, $_SESSION['employee_id']); 
				$sql->execute();
			}
			
			// Check EMail
			if( ($_SESSION['email'] != $_POST['email']) || ($_SESSION['username'] != $_POST['email']) )
			{
				$sql= $db->prepare("UPDATE employees SET email = ? WHERE account_id = ?");
				$sql->bindValue(1, $_POST['email']);
				$sql->bindValue(2, $_SESSION['account_id']); 
				$sql->execute();
				
				$sql= $db->prepare("UPDATE accounts SET username = ? WHERE account_id = ?");
				$sql->bindValue(1, $_POST['email']);
				$sql->bindValue(2, $_SESSION['account_id']);
				$sql->execute();
				
//				echo 'Changed email<br>';
			}
			
			
			//Change password
			// Only change if the password fields are not empty
			// AND
			// If the two new password fields are the same
			if(($_POST['pwd_n1'] === $_POST['pwd_n2']) && !empty($_POST['pwd_n1']))
			{ 

				$npas = hash('sha256', $_POST['pwd_n1']);
				
				$sql_new_pass = $db->prepare("UPDATE accounts SET pass = ? WHERE account_id = ?");
				$sql_new_pass->bindvalue(1, $npas);
				$sql_new_pass->bindValue(2, $_SESSION['account_id']);
				
				$sql_new_pass->execute();
				
				//echo 'Changed password<br>';
				
			}
			
			$_SESSION['message'] = '<strong>SUCCESS!</strong> Your user account has been updated.';
			
		}
	
	}
	header('Location: ../edit_account/');
	exit;

?>