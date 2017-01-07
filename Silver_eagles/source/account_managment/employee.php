
		
		<button type="button" class="btn btn-info" data-toggle="collapse" data-target=<?php echo '"#employee', $row_user['account_id'] ,'"';?> style="width:100%; background-color:#1E407F">
		<div class="col-sm-8">
		<p><?php 
				//echo $row_user['account_id']
				$sql_employees_info = $db->prepare("SELECT * FROM employees
													WHERE account_id = ?
													LIMIT 1");
				$sql_employees_info->bindValue(1, $row_user['account_id']);
				$sql_employees_info->execute();
				
				$row_employees = $sql_employees_info->fetch();
				
				echo $row_employees['firstname'], ' ', $row_employees['lastname'];
				
			?>
		</p>
		</div>
		
		<div class="col-sm-4">
		<p><?php echo $row_user['account_id']?></p>
        </div>
        </button>
        
		<div id=<?php echo '"employee', $row_user['account_id'] ,'"';?> class="collapse">
        <form method="post" action="submit_update.php" >
        <h5>
			<input type=hidden readonly name="account_id" value=<?php echo '"', $row_user['account_id'], '"' ?> >
			<br>First name:<br>
            <input type="text" name="firstname" value=<?php echo '"', $row_employees['firstname'], '"'; ?>><br>
                                            
            <br>Last name:<br>
            <input type="text" name="lastname" value=<?php echo '"', $row_employees['lastname'], '"'; ?>><br>
			
            <br>Phone:<br>
            <input type="text" name="phone" value=<?php echo '"', $row_employees['phone'] ,'"'; ?>><br>
            
            <br>Email:<br>
			<input type="text" name="email" value=<?php echo '"', $row_employees['email'] ,'"'; ?>><br>
			
			<br>Branch:<br>
			<select name = "branch_id" >
			<?php
				$sql_branch_names = "SELECT * FROM branches";
				
				foreach($db->query($sql_branch_names) as $row_branches)
				{
									
					echo '<option value = "', $row_branches['branch_id'], '" ';
				
					if($row_employees['branch_id'] === $row_branches['branch_id'])
					echo 'selected ';
				
					echo '>', $row_branches['branch_name'] ,'</option>';
				}
			?>
			</select>
			<br>
			
<!-- FIX THE LANGUAGE THING "MAKE A NEW FUCKING TABLE" -->  
            <br>Language:<br>
            <input type="text" name="language" value=<?php echo '"', $row_employees['language'], '"'; ?>><br>
            
            <br>Ladder Type:<br>
            <input type="radio" name="ladder_type" value=1 <?php if($row_employees['ladder_type'] == 1){echo ' checked ';}?>>  One Story<br>
            <input type="radio" name="ladder_type" value=2 <?php if($row_employees['ladder_type'] == 2){echo ' checked ';}?>>  Two Story<br>
                                            
            <br>Licensing:<br>
            <input type="checkbox" name="sales_type" value="Residential" <?php if($row_employees['sales_type'] === 'Residential'){echo 'checked';} ?>>  Residential<br>
            <input type="checkbox" name="sales_type" value="Commercial" <?php if($row_employees['sales_type'] === 'Commercial'){echo 'checked';} ?>>  Commercial<br>
			
			
            
            <br>
            <fieldset>
            <legend><h5>Change Password</h5></legend>
            New Password:<br>
            <input type="password" name="pwd_n1" value="" placeholder="password"><br>
            
            <br>Re-enter New Password:<br>
			<input type="password" name="pwd_n2" value="" placeholder="password"><br>
            
            <br>Current Password:<br>
            <input required type="password" name="pwd" value="" placeholder="password"><br>
            </fieldset>
            <br>
                                            
            <input name="submit" type="submit" value="Save Changes">
            <input type="reset">
			<input name="delete" type="submit" value="Delete">
                                            
        </h5>
        </form>
        </div>
									
		<br>
		<br>
