<?php

	//	REQUEST TIME OFF
	//	REQUEST TIME OFF
	//	REQUEST TIME OFF
	
	
	include("../template/db_fetch.php");
	$page_name = 'Request Time Off';
	$subheading = $_SESSION['firstname'] . ' ' . $_SESSION['lastname'];
	$page_icon = 'class="fa fa-fw fa-desktop"';
	$page_dir = '../request_time_off/page.php';
	
	include("../template/template_page.php");
?>