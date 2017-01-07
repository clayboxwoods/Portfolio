
<?php 

if(isset($_POST['Submit']))
{
	session_start();
	//////////
	//// Login to database
	////
	$dbHost     = "localhost";  //Location Of Database usually its localhost 
	$dbUser     = "root";   //Database User Name 
	$dbPass     = "";   //Database Password 
	$dbDatabase = "wolfpack"; //Database Name 
try{
	$db         = new PDO("mysql:dbname=$dbDatabase;host=$dbHost;port=3306", $dbUser, $dbPass);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	echo 	$_POST['time'], ' &emsp; | &emsp; ', $_POST['todays_date'] ,'<br>',
			$_POST['name'], ' &emsp; | &emsp; ', $_POST['address'] ,'<br>',
			$_POST['city'], ' &emsp; | &emsp; ', $_POST['state'] ,'<br>',
			$_POST['zip'], ' &emsp; | &emsp; ', $_POST['email'] ,'<br>',
			$_POST['phone_home'], ' &emsp; | &emsp; ', $_POST['phone_cell'] ,'<br>',
			$_POST['sales_type'], '&emsp; | &emsp; ', $_POST['stories'] ,'<br>',
			$_POST['roof_type'], ' &emsp; | &emsp; ', $_POST['roof_age'] ,'<br>',
			$_POST['roof_leaking'], ' &emsp; | &emsp; ', $_POST['roof_leaking_where'] ,'<br>',
			$_POST['missing_shingles'], ' &emsp; | &emsp; ', $_POST['gutters'] ,'<br>',
			$_POST['siding'], ' &emsp; | &emsp; ', $_POST['insurance_name'] ,'<br>',
			$_POST['called_insurance'], ' &emsp; | &emsp; ', $_POST['insurance_been_to_home'] ,'<br>',
			$_POST['signed_contract'], ' &emsp; | &emsp; ', $_POST['additional_info'] ,'<br>'
	;
	
	// Add the appointment
	$sql_apt ='	UPDATE appointments 
			SET time="'.$_POST['time'].'"
			WHERE appointment_id="'.$_POST['appointment_id'].'"';
	$db->exec($sql_apt);
echo $sql_apt,'<br>';
//	$apt_id = $db->lastInsertId();
/*	
	$sql_leads = '	INSERT INTO leads (time, customer_id, status, comments, employee_id)
					VALUES("'.$_POST['lead_time'].'","'.$customer_id.'","LEAD","'.$_POST['additional_info'].'",NULL)';
	$db->exec($sql_leads);
	$lead_id = $db->lastInsertId();
*/
	$sql_lead_gen ='	UPDATE lead_generation 
				SET	sales_type	=	"'.$_POST['sales_type']	.'",
					time		=	"'.$_POST['time']	.'", 
					todays_date	=	"'.$_POST['todays_date'].'",
 					name		=	"'.$_POST['name'].'",
					address		=	"'.$_POST['address'].'",
					city		=	"'.$_POST['city'].'", 
					state		=	"'.$_POST['state'].'",
					zip="'.$_POST['zip'].'",
					email="'.$_POST['email'].'",
					phone_home="'.$_POST['phone_home'].'", 
					phone_cell="'.$_POST['phone_cell'].'",
					stories="'.$_POST['stories'].'",
					roof_type="'.$_POST['roof_type'].'",
					roof_age="'.$_POST['roof_age'].'",
					roof_leaking="'.$_POST['roof_leaking'].'", 
					roof_leaking_where="'.$_POST['roof_leaking_where'].'", 
					missing_shingles="'.$_POST['missing_shingles'].'",
					gutters="'.$_POST['gutters'].'",
					siding="'.$_POST['siding'].'", 
					insurance_name="'.$_POST['insurance_name'].'",
					called_insurance="'.$_POST['called_insurance'].'", 
					insurance_been_to_home="'.$_POST['insurance_been_to_home'].'", 
					signed_contract="'.$_POST['signed_contract'].'",
					additional_info="'.$_POST['additional_info'].'"
					
					WHERE lead_id ="'.$_POST['appointment_id'].'"';								
	
	// customer
	$db->exec($sql_lead_gen);
	
	$_SESSION['message'] = '<strong>SUCCESS!</strong> Lead '.$_POST['appointment_id']. ' updated.';
}
catch(PDOException $e)
{
$_SESSION['message'] = '<strong>FAILURE!</strong>'.
			$sql_apt. ' <br>'. 
			$e->getMessage();
}
}	
else
{
	$_SESSION['message'] = '<strong>FAILURE!</strong> Attempt to access invalid page.';
}
header("Location: ../view_contracts/");
exit();
?> 
