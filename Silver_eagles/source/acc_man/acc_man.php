<!DOCTYPE html>
<html lang="en">

<?php
session_start();

$servername = "localhost";
$username = "root";
$dbPass = "";
$dbDatabase = "wolfpack";

$db         = new PDO("mysql:dbname=$dbDatabase;host=$dbHost;port=3306", $dbUser, $dbPass); 
/*
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
*/
$sql = "INSERT INTO accounts (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";
/*
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
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

    <!-- Man.css -->
    <link href="man.css" rel="stylesheet" type="text/css">

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
                <a class="navbar-brand" href="dashboard.html" font-color="black">Wolfpack Portal</a>
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> INSERT EMPLOYEE NAME <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="../edit_account/edit_account.html"><i class="fa fa-fw fa-gear"></i> Edit Account</a>
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
                    <li class="active">
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

<!--
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
					-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                          <h1 class="page-header">Account Management</h1>
                          <p>To make the tabs toggleable, add the data-toggle="tab" attribute to each link. Then add a .tab-pane class with a unique ID for every tab and wrap them inside a div element with class .tab-content.</p>

                          <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#edit_acc">Edit Accounts</a></li>
                            <li><a data-toggle="tab" href="#add_acc">Add Account</a></li>
                            <li><a data-toggle="tab" href="#del_acc">Delete Accounts</a></li>
                          </ul>

                          <div class="tab-content">
                            <div id="edit_acc" class="tab-pane fade in active">
                                <div class="col-sm-8">
                                    <h3>Employee Name</h3>
                                </div>
                                <div class="col-sm-4">
                                    <h3>ID #</h3>
                                </div>
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">
                                <div class="col-sm-8">
                                    <p>Blues Henderson</p>
                                </div>
                                <div class="col-sm-4">
                                    <p>222</p>
                                </div>
                            </button>
                                    <div id="demo" class="collapse">
                                        <form method="post" action="edit_account_act.php" >
                                            <h5>
                                            <br>First name:<br>
                                            <input type="text" name="firstname" value="Mickey"><br>
                                            
                                            <br>Last name:<br>
                                            <input type="text" name="lastname" value="Mouse"><br>
                                            
                                            <br>Language:<br>
                                            <input type="text" name="language" value="Spanish"><br>
                                            
                                            <br>Ladder Type:<br>
                                            <input type="checkbox" name="ladder_type" value=10>  10ft<br>
                                            <input type="checkbox" name="ladder_type" value=15ft>  15ft<br>
                                            <input type="checkbox" name="ladder_type" value=20>  20ft<br>
                                            
                                            <br>Licensing:<br>
                                            <input type="checkbox" name="sales_type" value="residential">  Residential<br>
                                            <input type="checkbox" name="sales_type" value="comercial">  Commercial<br>
                                            
                                            <br>Phone:<br>
                                            <input type="text" name="phone" value="940-567-8309"><br>
                                            
                                            <br>Email:<br>
                                            <input type="text" name="email" value="Mickey.mouse@wolfpack.com"><br>
                                            
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
                                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#dem2">
                                    <div class="col-sm-8">
                                        <p>Brian Reeder</p>
                                    </div>
                                    <div class="col-sm-4">
                                        <p>223</p>
                                    </div>
                                </button>

                                    <div id="dem2" class="collapse">

                                        <form method="post" action="edit_account_act.php" >
                                            <h5>
                                            <br>First name:<br>
                                            <input type="text" name="firstname" value="Mickey"><br>
                                            
                                            <br>Last name:<br>
                                            <input type="text" name="lastname" value="Mouse"><br>
                                            
                                            <br>Language:<br>
                                            <input type="text" name="language" value="Spanish"><br>
                                            
                                            <br>Ladder Type:<br>
                                            <input type="checkbox" name="ladder_type" value=10>  10ft<br>
                                            <input type="checkbox" name="ladder_type" value=15ft>  15ft<br>
                                            <input type="checkbox" name="ladder_type" value=20>  20ft<br>
                                            
                                            <br>Licensing:<br>
                                            <input type="checkbox" name="sales_type" value="residential">  Residential<br>
                                            <input type="checkbox" name="sales_type" value="comercial">  Commercial<br>
                                            
                                            <br>Phone:<br>
                                            <input type="text" name="phone" value="940-567-8309"><br>
                                            
                                            <br>Email:<br>
                                            <input type="text" name="email" value="Mickey.mouse@wolfpack.com"><br>
                                            
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
                            <div id="add_acc" class="tab-pane fade">

                                    <h3>Enter the new account information and click "Create New Account"</h3>

                                     <form method="post" action="edit_account_act.php" >
                                            <h5>
                                            <br>First name:<br>
                                            <input type="text" name="firstname" value="Mickey"><br>
                                            
                                            <br>Last name:<br>
                                            <input type="text" name="lastname" value="Mouse"><br>
                                            
                                            <br>Language:<br>
                                            <input type="text" name="language" value="Spanish"><br>
                                            
                                            <br>Ladder Type:<br>
                                            <input type="checkbox" name="ladder_type" value=10>  10ft<br>
                                            <input type="checkbox" name="ladder_type" value=15ft>  15ft<br>
                                            <input type="checkbox" name="ladder_type" value=20>  20ft<br>
                                            
                                            <br>Licensing:<br>
                                            <input type="checkbox" name="sales_type" value="residential">  Residential<br>
                                            <input type="checkbox" name="sales_type" value="comercial">  Commercial<br>
                                            
                                            <br>Phone:<br>
                                            <input type="text" name="phone" value="940-567-8309"><br>
                                            
                                            <br>Email:<br>
                                            <input type="text" name="email" value="Mickey.mouse@wolfpack.com"><br>
                                            
                                            <br>
                                            <fieldset>
                                                <legend><h5>Change Password</h5></legend>
                                                New Password:<br>
                                                <input type="password" name="pwd_n1" value="" placeholder="password"><br>
                                            
                                                <br>Re-enter New Password:<br>
                                                <input type="password" name="pwd_n2" value="" placeholder="password"><br>
                                            
                                            </fieldset>
                                            <br>
                                            
                                            <input type="submit" value="Create New Account">
                                            
                                            </h5>
                                        </form>


                            </div>
                            <div id="del_acc" class="tab-pane fade">
                              <h3>Menu 2</h3>
                              <p>Lets Figure out add account first</p>
                            </div>
                          </div>
                    </div>
                    <!-- col-lg-12 -->
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

</body>

</html>
