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
	
	$apt_type 	= 2;
	$now 		= time();
	$duration 	= strtotime($_POST['endtime'], $now) - strtotime( $_POST['starttime'], $now );
	$start 		= strtotime($_POST['starttime'], $now  );
	echo $duration.'<br>'.date("Y-m-d H:i:s", $start).'<br>'.($duration/3600).'<br><br>';
	
	while($duration > 0)
	{
		
		echo $duration.'<br>'.date("Y-m-d H:i:s", $start).'<br>'.($duration/3600).'<br>';
		$sql_time_off = '	INSERT INTO `appointments`
						SET `time` = "'. date("Y-m-d H:i:s", $start) .'",
							`appointment_type` = "'.$apt_type.'",
							`employee_id` = "'. $_SESSION['employee_id'] .'"
						';
		$duration = $duration - 3600;
		$start = $start + 3600;	

		$db->exec($sql_time_off);
	}	


}

header("Location: ../request_time_off/");
exit();
?>