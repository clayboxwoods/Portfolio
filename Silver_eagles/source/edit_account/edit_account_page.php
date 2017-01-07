<!DOCTYPE html>
<html lang="en">

<?php
    session_start();

    $dbHost     = "localhost";  //Location Of Database usually its localhost 
    $dbUser     = "root";   //Database User Name 
    $dbPass     = "";   //Database Password 
    $dbDatabase = "wolfpack"; //Database Name 
    //Connect to the databasse 
    $db         = new PDO("mysql:dbname=$dbDatabase;host=$dbHost;port=3306", $dbUser, $dbPass); 

//	$sql = $db->prepare("SELECT * FROM accounts 
//        WHERE account_id = ?
//        LIMIT 1");
//	$sql->bindValue(1, $_SESSION['account_id']);
//	$sql->execute();
//	$row_employee_id = $sql->fetch();
	
	$sql = $db->prepare("SELECT * FROM employees
	WHERE account_id = ? 
	LIMIT 1");
 	$sql->bindValue(1,$_SESSION['account_id']);
	$sql->execute(); 
	$row_employee_info = $sql->fetch();
	
	$language = $row_employee_info['language'];
	//$ladder_type = $row['ladder_type']; should be ladder type bool seperate query from table
	$sales_type = $row_employee_info['sales_type'];
	$branch_id = $row_employee_info['branch_id'];
	
	$sql = $db->prepare("SELECT * FROM contact_info
	WHERE employee_id = ? 
	LIMIT 1");
 	$sql->bindValue(1,$row_employee_info['employee_id']);
	$sql->execute(); 
	$row_employee_contact = $sql->fetch();
	
	$email = $row_employee_contact['email'];
	$phone = $row_employee_contact['phone'];
	
	$sql_branch = $db->prepare("SELECT * FROM branches
	WHERE branch_id = ?
	LIMIT 1");
	$sql_branch->bindValue(1,$branch_id);
	$sql_branch->execute();
	$branch_row = $sql_branch->fetch();
	
	$branch = $branch_row['branch_name'];
	
	/*
	$firstname = $row_employee_info['firstname'];
	$lastname = $row_employee_info['lastname'];
	*/

?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Wolfpack Portal</title>
	<link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon.ico" />`


    <!-- Bootstrap Core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../dist/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../dashboard/dashboard.html" font-color="black">Wolfpack Portal</a>
				<!--<img src="../assets/images/logo.png" />-->
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong>INSERT NAME HERE EMAIL(1)</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong>INSERT NAME HERE EMAIL(2)</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong>INSERT EMAIL HERE(3)</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['firstname']; echo ' '; echo $_SESSION['lastname'];?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Edit Account</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="../dashboard/dashboard.html"><i class="fa fa-fw fa-bar-chart-o"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="../generate_lead/generate_lead.html"><i class="fa fa-fw fa-edit"></i> Generate Lead</a>
                    </li>
					<li>
                        <a href="../edit_lead/edit_lead.html"><i class="fa fa-fw fa-edit"></i> Edit Lead</a>
                    </li>
                    <li>
                        <a href="../view_contracts/view_contracts.html"><i class="fa fa-fw fa-server"></i> View Contracts</a>
                    </li>
					<li>
                        <a href="../request_time_off/request_time_off.html"><i class="fa fa-fw fa-desktop"></i> Request Time Off</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit Account
                            <small>User_type</small>
                        </h1>
                        <!-- aaction will be same page once I figure that out <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>
						see	form handler at the bottom of the page-->
						<form method="post" action="edit_account_act.php" >
							<h5>
							<br>First name:<br>
							<input type="text" name="firstname" value="<?php echo $_SESSION['firstname']; ?>"><br>
							
							<br>Last name:<br>
							<input type="text" name="lastname" value="<?php echo $_SESSION['lastname']; ?>"><br>
							
							<br>Branch:<br>
							<input type="text" name="branch" value="<?php echo $branch; ?>" readonly><br>
							
							<br>Language:<br>
							<input type="text" name="language" value="<?php echo $language; ?>"><br>
							
							<br>Ladder Type:<br>
							<input type="checkbox" name="ladder_type" value="<?php echo $ladder_type_10; ?>">  10ft<br>
							<input type="checkbox" name="ladder_type" value="<?php echo $ladder_type_15; ?>">  15ft<br>
							<input type="checkbox" name="ladder_type" value="<?php echo $ladder_type_20; ?>">  20ft<br>
							<!-- fix these two according to the query -->
							<br>Licensing:<br>
							<input type="checkbox" name="sales_type" value="residential">  Residential<br>
							<input type="checkbox" name="sales_type" value="comercial">  Commercial<br>
							
							<br>Phone:<br>
							<input type="text" name="phone" value="<?php echo $phone; ?>"><br>
							
							<br>Email:<br>
							<input type="text" name="email" value="<?php echo $email; ?>"><br>
							
							<br>
							<fieldset>
								<legend><h5>Change Password</h5></legend>
								New Password:<br>
								<input type="password" name="pwd_n1" value="" placeholder="password"><br>
							
								<br>Re-enter New Password:<br>
								<input type="password" name="pwd_n2" value="" placeholder="password"><br>
							
								<br>Current Password:<br>
								<input type="password" name="pwd" value="" placeholder="password"><br>
							</fieldset>
							<br>
							
							<input type="submit" value="Save Changes">
							<input type="reset">
							
							</h5>
						</form>
						
						
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../dist/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../dist/js/bootstrap.min.js"></script>

<?php
	//form handler for backend
?>	
	
	
</body>

</html>
