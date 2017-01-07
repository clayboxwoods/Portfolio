
<?php 

if(isset($_POST['submit']))
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

	echo 	$_POST['lead_time'], ' &emsp; | &emsp; ', $_POST['todays_date'] ,'<br>',
			$_POST['AssignedTo'], ' &emsp; | &emsp; ', $_POST['TakenBy'] ,'<br>',
			$_POST['name'], ' &emsp; | &emsp; ', $_POST['address'] ,'<br>',
			$_POST['city'], ' &emsp; | &emsp; ', $_POST['state'] ,'<br>',
			$_POST['zip'], ' &emsp; | &emsp; ', $_POST['email'] ,'<br>',
			$_POST['home'], ' &emsp; | &emsp; ', $_POST['cell'] ,'<br>',
			$_POST['sales_type'], '&emsp; | &emsp; ', $_POST['height'] ,'<br>',
			$_POST['roof_type'], ' &emsp; | &emsp; ', $_POST['roof_age'] ,'<br>',
			$_POST['roof_leak'], ' &emsp; | &emsp; ', $_POST['roof_leak_where'] ,'<br>',
			$_POST['missing_shingles'], ' &emsp; | &emsp; ', $_POST['gutters'] ,'<br>',
			$_POST['siding'], ' &emsp; | &emsp; ', $_POST['insurance_company'] ,'<br>',
			$_POST['called_insurance'], ' &emsp; | &emsp; ', $_POST['insurance_come'] ,'<br>',
			$_POST['signed'], ' &emsp; | &emsp; ', $_POST['additional_info'] ,'<br>'
	;
	
	// Add the appointment
	$sql_apt ='	INSERT INTO appointments (time, appointment_type)
				VALUES ("'. $_POST['lead_time'] .'", "1")';
	$db->exec($sql_apt);
	$apt_id = $db->lastInsertId();
/*	
	$sql_leads = '	INSERT INTO leads (time, customer_id, status, comments, employee_id)
					VALUES("'.$_POST['lead_time'].'","'.$customer_id.'","LEAD","'.$_POST['additional_info'].'",NULL)';
	$db->exec($sql_leads);
	$lead_id = $db->lastInsertId();
*/
	$sql_lead_gen ='	INSERT INTO lead_generation (lead_id, sales_type, time, 
													todays_date, name, address,
													city, state, zip,
													email, phone_home, phone_cell,
													stories, roof_type, roof_age,
													roof_leaking, roof_leaking_where, missing_shingles,
													gutters, siding, insurance_name,
													called_insurance, insurance_been_to_home, signed_contract,
													additional_info)
													
						VALUES(	"'.$apt_id						.'","'.$_POST['sales_type']			.'","'.$_POST['lead_time']			.'",
								"'.$_POST['todays_date']		.'","'.$_POST['name']				.'","'.$_POST['address']			.'",
								"'.$_POST['city']				.'","'.$_POST['state']				.'","'.$_POST['zip']				.'",
								"'.$_POST['email']				.'","'.$_POST['home']				.'","'.$_POST['cell']				.'",
								"'.$_POST['height']				.'","'.$_POST['roof_type']			.'","'.$_POST['roof_age']			.'",
								"'.$_POST['roof_leak']			.'","'.$_POST['roof_leak_where']	.'","'.$_POST['missing_shingles']	.'",
								"'.$_POST['gutters']			.'","'.$_POST['siding']				.'","'.$_POST['insurance_company']	.'",
								"'.$_POST['called_insurance']	.'","'.$_POST['insurance_come']		.'","'.$_POST['signed']				.'",
								"'.$_POST['additional_info']	.'")';
	
	// customer
	$db->exec($sql_lead_gen);
	
	$_SESSION['message'] = '<strong>SUCCESS!</strong> Lead '.$apt_id. ' added.';
}
catch(PDOException $e)
{
	$_SESSION['message'] = '<strong>FAILURE!</strong> '.$sql_customer. ' <br>'.
			$sql_apt. ' <br>'. 
			$sql_leads. ' <br>'.
			$e->getMessage();
}
	/*
		$sql_lead =	"INSERT INTO "lead_generation"(time,todays_date,name,address,city,state,zip,email,phone_home,phone_cell,sales_type,stories,roof_type,roof_age,roof_leak,roof_leaking_where,missing_shingles,gutters,siding,insurance_name,insurance_called,insurance_been_to_home, signed_contract,additional_info)
			VALUE('$leadtime','$Today','$Name','$Address','$City','$State','$Email','$Home','$Cell','$liscence','$height','$roof_type','$RoofAge','$RoofLeak','$RoofLeaking_Where','$MissingShingles','$Gutters''$Siding','$Insurance','$CalledInsurance','$InsuranceCome','$Signed','$AdditionalInfo');
		";


		$db->exec($sql_lead);
	
		$_SESSION['message'] = '<strong>SUCCESS!';
	*/
}	
else
{
	$_SESSION['message'] = '<strong>FAILURE!</strong> Attempt to access invalid page.';
}
header("Location: ../generate_lead/");
exit();
?> 
