<?php

//	DASHBOARD
//	DASHBOARD
//	DASHBOARD

//*
	include('../template/db_fetch.php');
	$page_name = 'Dashboard';
	$subheading = 'Subheading';
	$page_icon = 'class="fa fa-bar-chart-o"';
	$contents = '<?php include(\'../edit_account/page.php\'); ?>';
	$page_dir = '../dashboard/page.php';
// */

//	include("../template/index.php");

/*	// Database Queries!!
	$dbHost     = "localhost";  //Location Of Database usually its localhost
    $dbUser     = "root";   //Database User Name
    $dbPass     = "";   //Database Password
    $dbDatabase = "wolfpack"; //Database Name
    //Connect to the databasse
    $db         = new PDO("mysql:dbname=$dbDatabase;host=$dbHost;port=3306", $dbUser, $dbPass);

	$sql_employee_info = $db->prepare("SELECT * FROM employees
	WHERE account_id = ?
	LIMIT 1");

	$sql_employee_info->bindValue(1,$_SESSION['account_id']);
	$sql_employee_info->execute();
	$row_employee_info = $sql_employee_info->fetch();

	$language = $row_employee_info['language'];
	//$ladder_type = $row['ladder_type']; should be ladder type bool seperate query from table
	$sales_type = $row_employee_info['sales_type'];
	$branch_id = $row_employee_info['branch_id'];
	*/

	include("../template/template_page.php");
?>
