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
		$sql_id = $db->prepare("SELECT * FROM lead_generation 
			WHERE lead_id = ? AND 
			LIMIT 1"); 

		$sql_id->bindValue(1, $_SESSION['lead_id']); 

		$sql_id->execute();
	
		if($sql_id->rowCount() == 1)
		{
			if($_SESSION['time'] != $_POST['leadtime'])
			{
				$sql= $db->prepare("UPDATE lead_generation SET time = ? WHERE lead_id = ?"); 
				$sql->bindValue(1, $_POST['leadtime']);
				$sql->bindValue(2, $_SESSION['lead_id']);
				$sql->execute();
			}
		
			if($_SESSION['todays_date'] != $_POST['Today'])
			{
				$sql= $db->prepare("UPDATE lead_generation SET todays_date = ? WHERE lead_id = ?"); 
				$sql->bindValue(1, $_POST['Today']);
				$sql->bindValue(2, $_SESSION['lead_id']);
				$sql->execute();
			}

			if($_SESSION['assign_to'] != $_POST['AssignedTo'])
			{
				$sql= $db->prepare("UPDATE lead_generation SET assign_to = ? WHERE lead_id = ?"); 
				$sql->bindValue(1, $_POST['AssignedTo']);
				$sql->bindValue(2, $_SESSION['lead_id']);
				$sql->execute();
			}
	
			if($_SESSION['taken_by'] != $_POST['TakenBy'])
			{
				$sql= $db->prepare("UPDATE lead_generation SET taken_by = ? WHERE lead_id = ?"); 
				$sql->bindValue(1, $_POST['TakenBy']);
				$sql->bindValue(2, $_SESSION['lead_id']);
				$sql->execute();
			}

			if($_SESSION['name'] != $_POST['Name'])
			{
				$sql= $db->prepare("UPDATE lead_generation SET name = ? WHERE lead_id = ?"); 
				$sql->bindValue(1, $_POST['Name']);
				$sql->bindValue(2, $_SESSION['lead_id']);
				$sql->execute();
			}

			if($_SESSION['address'] != $_POST['Address'])
			{
				$sql= $db->prepare("UPDATE lead_generation SET address = ? WHERE lead_id = ?"); 
				$sql->bindValue(1, $_POST['Address']);
				$sql->bindValue(2, $_SESSION['lead_id']);
				$sql->execute();
			}

			if($_SESSION['city'] != $_POST['City'])
			{
				$sql= $db->prepare("UPDATE lead_generation SET city = ? WHERE lead_id = ?"); 
				$sql->bindValue(1, $_POST['City']);
				$sql->bindValue(2, $_SESSION['lead_id']);
				$sql->execute();
			}

			if($_SESSION['state'] != $_POST['State'])
			{
				$sql= $db->prepare("UPDATE lead_generation SET state = ? WHERE lead_id = ?"); 
				$sql->bindValue(1, $_POST['State']);
				$sql->bindValue(2, $_SESSION['lead_id']);
				$sql->execute();
			}

			if($_SESSION['zip'] != $_POST['Zip'])
			{
				$sql= $db->prepare("UPDATE lead_generation SET zip = ? WHERE lead_id = ?"); 
				$sql->bindValue(1, $_POST['Zip']);
				$sql->bindValue(2, $_SESSION['lead_id']);
				$sql->execute();
			}

			if($_SESSION['email'] != $_POST['Email'])
			{
				$sql= $db->prepare("UPDATE lead_generation SET email = ? WHERE lead_id = ?"); 
				$sql->bindValue(1, $_POST['Email']);
				$sql->bindValue(2, $_SESSION['lead_id']);
				$sql->execute();
			}

			if($_SESSION['phone_home'] != $_POST['Home'])
			{
				$sql= $db->prepare("UPDATE lead_generation SET Home = ? WHERE lead_id = ?"); 
				$sql->bindValue(1, $_POST['phone_home']);
				$sql->bindValue(2, $_SESSION['lead_id']);
				$sql->execute();
			}		

			if($_SESSION['phone_cell'] != $_POST['Cell'])
			{
				$sql= $db->prepare("UPDATE lead_generation SET Cell = ? WHERE lead_id = ?"); 
				$sql->bindValue(1, $_POST['phone_cell']);
				$sql->bindValue(2, $_SESSION['lead_id']);
				$sql->execute();
			}

			if($_SESSION['stories'] != $_POST['height'])
			{
				$sql= $db->prepare("UPDATE lead_generation SET height = ? WHERE lead_id = ?"); 
				$sql->bindValue(1, $_POST['stories']);
				$sql->bindValue(2, $_SESSION['lead_id']);
				$sql->execute();
			}

			if($_SESSION['roof_type'] != $_POST['roof_type'])
			{
				$sql= $db->prepare("UPDATE lead_generation SET roof_type = ? WHERE lead_id = ?"); 
				$sql->bindValue(1, $_POST['roof_type']);
				$sql->bindValue(2, $_SESSION['lead_id']);
				$sql->execute();
			}
		
			if($_SESSION['roof_age'] != $_POST['RoofAge'])
			{
				$sql= $db->prepare("UPDATE lead_generation SET roof_age = ? WHERE lead_id = ?"); 
				$sql->bindValue(1, $_POST['RoofAge']);
				$sql->bindValue(2, $_SESSION['lead_id']);
				$sql->execute();
			}

			if($_SESSION['roof_leaking'] != $_POST['roofLeak'])
			{
				$sql= $db->prepare("UPDATE lead_generation SET roof_leaking = ? WHERE lead_id = ?"); 
				$sql->bindValue(1, $_POST['roofLeak']);
				$sql->bindValue(2, $_SESSION['lead_id']);
				$sql->execute();
			}
		
			if($_SESSION['missing_shingles'] != $_POST['MissingShingles'])
			{
				$sql= $db->prepare("UPDATE lead_generation SET missing_shingles = ? WHERE lead_id = ?"); 
				$sql->bindValue(1, $_POST['MissingShingles']);
				$sql->bindValue(2, $_SESSION['lead_id']);
				$sql->execute();
			}

			if($_SESSION['gutters'] != $_POST['Gutters'])
			{
				$sql= $db->prepare("UPDATE lead_generation SET gutters = ? WHERE lead_id = ?"); 
				$sql->bindValue(1, $_POST['Gutters']);
				$sql->bindValue(2, $_SESSION['lead_id']);
				$sql->execute();
			}
	
			if($_SESSION['siding'] != $_POST['Siding'])
			{
				$sql= $db->prepare("UPDATE lead_generation SET siding = ? WHERE lead_id = ?"); 
				$sql->bindValue(1, $_POST['Siding']);
				$sql->bindValue(2, $_SESSION['lead_id']);
				$sql->execute();
			}

			if($_SESSION['insurance_name'] != $_POST['Insurance'])
			{
				$sql= $db->prepare("UPDATE lead_generation SET insurance_name = ? WHERE lead_id = ?"); 
				$sql->bindValue(1, $_POST['Insurance']);
				$sql->bindValue(2, $_SESSION['lead_id']);
				$sql->execute();
			}

			if($_SESSION['called_insurance'] != $_POST['CalledInurance'])
			{
				$sql= $db->prepare("UPDATE lead_generation SET insurance_called = ? WHERE lead_id = ?"); 
				$sql->bindValue(1, $_POST['CalledInurance']);
				$sql->bindValue(2, $_SESSION['lead_id']);
				$sql->execute();
			}

			if($_SESSION['insurance_been_to_home'] != $_POST['InsuranceCome'])
			{
				$sql= $db->prepare("UPDATE lead_generation SET insurance_been_to_home = ? WHERE lead_id = ?"); 
				$sql->bindValue(1, $_POST['Insurance']);
				$sql->bindValue(2, $_SESSION['lead_id']);
				$sql->execute();
			}
			
			if($_SESSION['signed_contract'] != $_POST['Signed'])
			{
				$sql= $db->prepare("UPDATE lead_generation SET signed_contract = ? WHERE lead_id = ?"); 
				$sql->bindValue(1, $_POST['Signed']);
				$sql->bindValue(2, $_SESSION['lead_id']);
				$sql->execute();
			}

			if($_SESSION['additional_info'] != $_POST['AdditionalInfo'])
			{
				$sql= $db->prepare("UPDATE lead_generation SET additional_info = ? WHERE lead_id = ?"); 
				$sql->bindValue(1, $_POST['AdditionalInfo']);
				$sql->bindValue(2, $_SESSION['lead_id']);
				$sql->execute();
			}
		}
	}
	else
	{
		echo "FAILED";
	}
?>
