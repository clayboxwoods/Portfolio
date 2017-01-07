<form method="post" action="submit.php" >
							<h5>
							<br>First name:<br>
							<input readonly type="text" name="firstname" value="<?php echo $_SESSION['firstname']; ?>"><br>
							
							<br>Last name:<br>
							<input readonly type="text" name="lastname" value="<?php echo $_SESSION['lastname']; ?>"><br>
							
							<br>Branch:<br>
							<!--<input type="text" name="branch" value="<?php echo $_SESSION['branch']; ?>" readonly><br>-->
							<select name = "branch_id" >
								<?php
								$sql_branch_names = "SELECT * FROM branches";
								
								foreach($db->query($sql_branch_names) as $row_branches)
								{
									
									echo '<option value = "', $row_branches['branch_id'], '" ';
									
									if($_SESSION['branch_id'] === $row_branches['branch_id'])
										echo 'selected ';
									
									echo '>', $row_branches['branch_name'] ,'</option>';
								}
								?>
							</select>
							<br>
							<br>Language:<br>
							<input type="text" name="language" value="<?php echo $_SESSION['language']; ?>"><br>
							
							<br>Ladder Type:<br>
							
							<input type="radio" name="ladder_type" value="1" <?php if($_SESSION['ladder_type'] === '1'){echo 'checked';} ?> > One Story<br>
							<input type="radio" name="ladder_type" value="2" <?php if($_SESSION['ladder_type'] === '2'){echo 'checked';} ?>> Two Story<br>

							<!-- fix these two according to the query -->
							<br>Licensing:<br>
							<input type="checkbox" name="sales_type[]" value="Residential" <?php if($_SESSION['sales_type'] === 'Residential'){echo 'checked';} ?>>  Residential<br>
							<input type="checkbox" name="sales_type[]" value="Commercial" <?php if($_SESSION['sales_type'] === 'Commercial'){echo 'checked';} ?>>  Commercial<br>
							
							<br>Phone:<br>
							<input type="text" name="phone" min="10" max="11" value="<?php echo $_SESSION['phone']; ?>"><br>
							
							<br>Email:<br>
							<input type="text" name="email" value="<?php echo $_SESSION['email']; ?>"><br>
							
							<br><br>
							<fieldset>
								<legend><h5>Change Password</h5></legend>
								New Password:<br>
								<input type="password" name="pwd_n1" value="" placeholder="password"><br>
							<!--type="password"-->
								<br>Re-enter New Password:<br>
								<input type="password" name="pwd_n2" value="" placeholder="password"><br>
							
								<br>Current Password:<br>
								<input required type="password" name="password" value="" placeholder="password"><br>
							</fieldset>
							<br>
							
							<input name="submit" type="submit" value="Save Changes">
							<input type="reset">
							
							</h5>
						</form>