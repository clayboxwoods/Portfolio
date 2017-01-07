<?php 
	//Not sure if this works...
	if($_SESSION['usertype_name'] != 'admin')
	{
		$_SESSION['message'] = '<strong>FAILURE!</strong> Access Denied.';
		header('Location: ../dashboard/');
		exit();
	}//
?>


<ul class="nav nav-tabs">
	<li class="active"><a data-toggle="tab" href="#edit_acc">Edit Accounts</a></li>
	<li><a data-toggle="tab" href="#add_acc">Add Account</a></li>
<!--	<li><a data-toggle="tab" href="#del_acc">Delete Accounts</a></li> -->
</ul>

<div class="tab-content">
	<div id="edit_acc" class="tab-pane fade in active">
		<div class="col-sm-8">
	<!--	<h3>Employee Name</h3> -->
		</div>
		
		<div class="col-sm-4">
	<!--	<h3>ID No.</h3>   -->
		</div>
		<!-- PHP SCRIPT AAAHHHH -->
		<br>
<?php 
	
$sql_acc = 'SELECT * FROM accounts';
			
foreach($db->query($sql_acc) as $row_user)
{
	include("employee.php");
}
		
?>

    </div>

<div id="add_acc" class="tab-pane fade">
	<h3>Enter the new account information and click "Create New Account"</h3>
	<form method="post" action="submit_new.php" >
	<h5>
		<br>First name:<br>
		<input required type="text" name="firstname" value=""><br>
        
        <br>Last name:<br>
        <input required type="text" name="lastname" value=""><br>
		
		<br>Account Type:<br>
		<select required name="user_id">
		<option disabled selected value></option>
		<?php 
			$sql_acc = "SELECT * FROM usertypes";
			foreach($db->query($sql_acc) as $row_acc)
			{
				echo '<option value=', $row_acc['usertype_id'] ,'>', $row_acc['usertype_name'] , '</option>';
			}
		?>
		</select> <br>
		
		
		<br>Branch:<br>
		<select required name="branch_id">
		<option disabled selected value></option>
		<?php 
			$sql_branch = "SELECT * FROM branches";
			foreach($db->query($sql_branch) as $row_branch)
			{
				echo '<option value=', $row_branch['branch_id'] ,'>', $row_branch['branch_name'] , '</option>';
			}
		?>
		</select> <br>
		
        <br>Language:<br>
        <input type="text" name="language" value=""><br>

<!-- RADIO BUTTONS -->        
        <br>Ladder Type:<br>
        <input type="radio" name="ladder_type" value="1">  One Story<br>
        <input type="radio" name="ladder_type" value="2">  Two Story<br>
       
       <br>Licensing:<br>
       <input type="checkbox" name="sales_type" value="Residential">  Residential<br>
       <input type="checkbox" name="sales_type" value="Commercial">  Commercial<br>
       
       <br>Phone:<br>
       <input required type="text" name="phone" value=""><br>
       
       <br>Email:<br>
       <input required type="text" name="email" value=""><br>

		<br>
        <fieldset>
        <legend><h5>Change Password</h5></legend>
        New Password:<br>
        <input required type="password" name="pwd_n1" value="" placeholder="password"><br>
        
        <br>Re-enter New Password:<br>
        <input required type="password" name="pwd_n2" value="" placeholder="password"><br>
        
        </fieldset>
		<br>
        
        <input name="submit" type="submit" value="Create New Account">
        
    </h5>
    </form>


    </div>
		<div id="del_acc" class="tab-pane fade">
		<h3>Menu 2</h3>
		<p>Lets Figure out add account first</p>
		</div>
    </div>
