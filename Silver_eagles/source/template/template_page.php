<?php 
ob_start();

	if(!isset($_SESSION['account_id']))
	{
		$_SESSION['message'] = '<strong>FAILURE!</strong> Please log in.';
		
		header("Location: ../signin/");
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Wolfpack Portal</title>
	<link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon.ico" />`


    <!-- Bootstrap Core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet">

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
                <a class="navbar-brand" href="../dashboard/" font-color="black">Wolfpack Portal</a>
				<!--<img src="../assets/images/logo.png" />-->
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                   <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
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
<!--
				<!-- Alert 
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
                </li> -->
				<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['firstname'], ' ', $_SESSION['lastname']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
<!--                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li> -->
                        <li>
                            <a href="../edit_account/"><i class="fa fa-fw fa-gear"></i> Edit Account</a>
                        </li>
						<?php if($_SESSION['usertype_name'] == 'admin'){echo '<li>
                            <a href="../account_management/"><i class="fa fa-cogs"></i> Management</a>
                        </li>';} ?>
                        <li class="divider"></li>
                        <li>
                            <a href="../template/signout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li <?php if($page_name == 'Dashboard'){echo 'class="active"';}?>>
                        <a href="../dashboard/"><i class="fa fa-fw fa-bar-chart-o"></i> Dashboard</a>
                    </li>
                    <li <?php if($page_name == 'Generate Lead'){echo 'class="active"';}?>>
                        <a href="../generate_lead/"><i class="fa fa-fw fa-edit"></i> Generate Lead</a>
                    </li>
<!--					<li <?php if($page_name == 'Edit Lead'){echo 'class="active"';}?>>
                        <a href="../edit_lead/"><i class="fa fa-fw fa-edit"></i> Edit Lead</a>
                    </li>-->
                    <li <?php if($page_name == 'View Contracts'){echo 'class="active"';}?>>
                        <a href="../view_contracts/"><i class="fa fa-fw fa-server"></i> View Contracts</a>
                    </li>
					<li <?php if($page_name == 'Request Time Off'){echo 'class="active"';}?>>
                        <a href="../request_time_off/"><i class="fa fa-fw fa-desktop"></i> Request Time Off</a>
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
<?php 
	if(isset($_SESSION['message']))
	{
		echo '	<div class="alert alert-warning">
					'. $_SESSION['message'] .'
				</div>' ;
				
		unset($_SESSION['message']);
	}
 ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo $page_name;?>
                          <!-- <small><?php echo $subheading;?></small> -->
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i <?php echo $page_icon; ?>></i> <?php echo $page_name;?>
                            </li>
                        </ol>
							<!--<?php echo $contents; ?>-->
							<?php include($page_dir); ?>
							
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

</body>

</html>
