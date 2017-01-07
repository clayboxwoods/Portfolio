
		
<ul class="tab">
	<li><button class="tablinks" data-toggle="collapse" data-target= <?php echo '"Lead',$row['account_id'],'"';?> >Lead</button></li>
	<li><a href="javascript:void(0)" class="tablinks" onclick="openform(event, 'Contract')">Contract</a></li>
	<li><a href="javascript:void(0)" class="tablinks" onclick="openform(event, 'FLOP')">FLOP</a></li>
	
	<div class="tab" style="text-align: right;">	
		<li><strong><?php echo $row['account_id'];?></strong></li>
	</div>
	<div class="tab" style="text-align: right;">
		<li><strong><?php echo $row['username'];?></strong></li>
	</div>
	
	<?php 
				//echo $row_user['account_id']
				$sql_employees_info = $db->prepare("SELECT * FROM employees
													WHERE account_id = ?
													LIMIT 1");
				$sql_employees_info->bindValue(1, $row['account_id']);
				$sql_employees_info->execute();
				
				$row_employees = $sql_employees_info->fetch();				
	?>
	
</ul>

<div id=<?php echo '"Lead', $row['account_id'] ,'"';?> class="collapse">
	<span onclick="this.parentElement.style.display='none'" class="topright">x</span>
	<h5>Lead Form</h5>
	<form method="post" action="update_lead.php" >
		<div class="col_one">
			<h5>
			<label class="short"><h5>Time:</h5></label>
			<input type="datetime-local" name="leadtime"><br>
			
			<label class="short"><h5>Today's Date:</h5></label>
			<input type="date" name="Today"><br>
			
			<label class="short"><h5>Assigned To:</h5></label>
			<input type="text" name="AssignedTo"><br>
												
			<label class="short"><h5>Taken By:</h5></label>
			<input type="text" name="TakenBy"><br>
			
			<label class="short"><h5>Name:</h5></label>
			<input type="text" name="Name"><br>
			
			<label class="short"><h5>Address:</h5></label>
			<input type="text" name="Address"><br>
			
			<label class="short"><h5>City:</h5></label>
			<input type="text" name="City"><br>
			
			<label class="short"><h5>State:</h5></label>
			<select>
				<option value="AL">Alabama</option>
				<option value="AK">Alaska</option>
				<option value="AZ">Arizona</option>
				<option value="AR">Arkansas</option>
				<option value="CA">California</option>
				<option value="CO">Colorado</option>
				<option value="CT">Connecticut</option>
				<option value="DE">Delaware</option>
				<option value="DC">District Of Columbia</option>
				<option value="FL">Florida</option>
				<option value="GA">Georgia</option>
				<option value="HI">Hawaii</option>
				<option value="ID">Idaho</option>
				<option value="IL">Illinois</option>
				<option value="IN">Indiana</option>
				<option value="IA">Iowa</option>
				<option value="KS">Kansas</option>
				<option value="KY">Kentucky</option>
				<option value="LA">Louisiana</option>
				<option value="ME">Maine</option>
				<option value="MD">Maryland</option>
				<option value="MA">Massachusetts</option>
				<option value="MI">Michigan</option>
				<option value="MN">Minnesota</option>
				<option value="MS">Mississippi</option>
				<option value="MO">Missouri</option>
				<option value="MT">Montana</option>
				<option value="NE">Nebraska</option>
				<option value="NV">Nevada</option>
				<option value="NH">New Hampshire</option>
				<option value="NJ">New Jersey</option>
				<option value="NM">New Mexico</option>
				<option value="NY">New York</option>
				<option value="NC">North Carolina</option>
				<option value="ND">North Dakota</option>
				<option value="OH">Ohio</option>
				<option value="OK">Oklahoma</option>
				<option value="OR">Oregon</option>
				<option value="PA">Pennsylvania</option>
				<option value="RI">Rhode Island</option>
				<option value="SC">South Carolina</option>
				<option value="SD">South Dakota</option>
				<option value="TN">Tennessee</option>
				<option value="TX" selected="selected">Texas</option>
				<option value="UT">Utah</option>
				<option value="VT">Vermont</option>
				<option value="VA">Virginia</option>
				<option value="WA">Washington</option>
				<option value="WV">West Virginia</option>
				<option value="WI">Wisconsin</option>
				<option value="WY">Wyoming</option>
			</select><br>
			
			<label class="short"><h5>Zip:</h5></label>
			<input type="text" name="Zip"><br>
			
			<label class="short"><h5>Email:</h5></label>
			<input type="email" name="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"><br>
			
			<label class="short"><h5>Home:</h5></label>
			<input type="tel" name="Home"><br>
			
			<label class="short"><h5>Cell:</h5></label>
			<input type="tel" name="Cell"><br>
			
			<br><input type="submit" value="Update Lead"><br>
		</div>
		<div class="col_two">
			<label class="long"><h5>What type of buiulding?</h5></label>
			<input type="radio" name="liscence" value="commercial"> Commercial
			<input type="radio" name="liscence" value="residential"> Residential
			<br>
												
			<label class="long"><h5>How many stories is you home?</h5></label>
			<input type="radio" name="height" value="singleStory"> 1 Story
			<input type="radio" name="height" value="twoStory"> 2 Story
			<input type="radio" name="height" value="storyAndHalf"> 1 1/2 Story
			<br>
			
			<label class="long"><h5>What type of roof do you have?</h5></label>
			<input type="radio" name="roof_type" value="stdShingles"> Standard Shingles (Asphalt)
			<input type="radio" name="roof_type" value="wood"> Wood
			<input type="radio" name="roof_type" value="metal"> Metal
			<br>
			
			<label class="long"><h5>How old is your roof?</h5></label>
			<input type="text" name="RoofAge"><br>
			
			<label class="long"><h5>Is your roof leaking?</h5></label>
			<input type="radio" name="RoofLeak" value="yes"> Yes
			<input type="radio" name="RoofLeak" value="no"> No
			<br>
			
			<label class="long"><h5>Where?</h5></label>
			<input type="text" name="RoofLeak_Where"><br>
												
			<label class="long"><h5>Is your roof missing any shingles?</h5></label>
			<input type="radio" name="MissingShingles" value="yes"> Yes  
			<input type="radio" name="MissingShingles" value="no"> No  
			<br>
			
			<label class="long"><h5>Do you have gutters on your home?</h5></label>
			<input type="radio" name="Gutters" value="yes"> Yes  
			<input type="radio" name="Gutters" value="no"> No
			<br>
			
			<label class="long"><h5>Does your home have siding?</h5></label>
			<input type="radio" name="Siding" value="yes"> Yes
			<input type="radio" name="Siding" value="no"> No
			<br>
			
			<label class="long"><h5>What is the name of your insurance company?</h5></label>
			<input type="text" name="Insurances"><br>
			
			<label class="long"><h5>Have you called your inssurance company?</h5></label>
			<input type="radio" name="CalledInsurance" value="yes"> Yes
			<input type="radio" name="CalledInsurance" value="no"> No
			<br>
			
			<label class="long"><h5>Has your insurance company to your home?</h5></label>
			<input type="radio" name="InsuranceCome" value="yes"> Yes
			<input type="radio" name="InsuranceCome" value="no"> No
			<br>
			
			<label class="long"><h5>Have you signed a contract with a roofing company?</h5></label>
			<input type="radio" name="Signed" value="yes"> Yes
			<input type="radio" name="Signed" value="no"> No
			<br>
			
			<label class="long"><h5>Additional Information:</h5></label>
			<input type="text" name="AdditionalInfo" size="50"><br>
			</h5>
		</div>
	</form>
</div>







        
		<div id=<?php echo '"employee', $row['account_id'] ,'"';?> class="collapse">
        <form method="post" action="submit_update.php" >
        <h5>
			<input type=hidden readonly name="account_id" value=<?php echo '"', $row['account_id'], '"' ?> >
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