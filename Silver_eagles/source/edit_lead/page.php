<<<<<<< HEAD
<link href="generate_lead.css" rel="stylesheet">
        <form method="post" action="generate_lead.php" >
        <div class="col_one">
                <h5>
                <label class="short"><h5>Time:</h5></label>
                <input type="datetime-local" name="leadtime" value="<?php echo $time; ?>"><br>

                <label class="short"><h5>Today's Date:</h5></label>
                <input type="date" name="Today" value="<?php echo $todays_date; ?>"><br>

                <label class="short"><h5>Assigned To:</h5></label>
                <input type="text" name="AssignedTo" value="<?php echo $assign_to; ?>"><br>

                <label class="short"><h5>Taken By:</h5></label>
                <input type="text" name="TakenBy" value="<?php echo $taken_by; ?>"><br>

                <label class="short"><h5>Name:</h5></label>
                <input type="text" name="Name" value="<?php echo $name; ?>"><br>

                <label class="short"><h5>Address:</h5></label>
                <input type="text" name="Address" value="<?php echo $address; ?>"><br>

                <label class="short"><h5>City:</h5></label>
                <input type="text" name="City" value="<?php echo $city; ?>"><br>

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
                <input type="text" name="Zip" value="<?php echo $zip; ?>"><br>

                <label class="short"><h5>Email:</h5></label>
                <input type="email" name="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $email; ?>"><br>

                <label class="short"><h5>Home:</h5></label>
                <input type="tel" name="Home" value="<?php echo $phone_home; ?>"><br>

                <label class="short"><h5>Cell:</h5></label>
                <input type="tel" name="Cell" value="<?php echo $phone_cell; ?>"><br>

                <br><input type="submit" value="Generate Lead"><br>
        </div>
        <div class="col_two">
                <label class="long"><h5>What type of buiulding?</h5></label>
                <input type="radio" name="liscence"> Commercial
                <input type="radio" name="liscence"> Residential
                <br>

                <label class="long"><h5>How many stories is you home?</h5></label>
                <input type="radio" name="height" value="<?php echo $stories; ?>"> 1 Story
                <input type="radio" name="height" value="<?php echo $stories; ?>"> 2 Story
                <input type="radio" name="height" value="<?php echo $stories; ?>"> 1 1/2 Story
                <br>

                <label class="long"><h5>What type of roof do you have?</h5></label>
                <input type="radio" name="roof_type" value="<?php
echo $roof_type; ?>"> Standard Shingles (Asphalt)
                <input type="radio" name="roof_type" value="<?php
echo $roof_type; ?>"> Wood
                <input type="radio" name="roof_type" value="<?php echo $roof_type; ?>"> Metal
<br>

                <label class="long"><h5>How old is your roof?</h5></label>
        <input type="text" name="RoofAge" value="<?php echo $roof_age; ?>"><br>

        <label class="long"><h5>Is your roof leaking?</h5></label>
        <input type="radio" name="RoofLeak" value="<?php echo $roof_leaking; ?>"> Yes
        <input type="radio" name="RoofLeak" value="<?php echo $roof_leaking; ?>"> No
                <br>

                <label class="long"><h5>Where?</h5></label>
                <input type="text" name="RoofLeak_Where"><br>

                <label class="long"><h5>Is your roof missing any shingles?</h5></label>
                <input type="radio" name="MissingShingles" value="<?php echo $missing_shingles; ?>"> Yes
                <input type="radio" name="MissingShingles" value="<?php echo $missing_shingles; ?>"> No
                <br>

                <label class="long"><h5>Do you have gutters on your home?</h5></label>
                <input type="radio" name="Gutters" value="<?php echo $gutters; ?>"> Yes
                <input type="radio" name="Gutters" value="<?php echo $gutters; ?>"> No
                <br>

                <label class="long"><h5>Does your home have siding?</h5></label>
                <input type="radio" name="Siding" value="<?php echo $siding; ?>"> Yes
                <input type="radio" name="Siding" value="<?php echo $siding; ?>"> No
                <br>

                <label class="long"><h5>What is the name of your insurance company?</h5></label>
                <input type="text" name="Insurances" value="<?php echo $insurance_name; ?>"><br>

                <label class="long"><h5>Have you called your inssurance company?</h5></label>
                <input type="radio" name="CalledInsurance" value="<?php echo $called_insurance; ?>"> Yes
                <input type="radio" name="CalledInsurance" value="<?php echo $called_insurance; ?>"> No
                <br>

<label class="long"><h5>Has your insurance company to your home?</h5></label>
                <input type="radio" name="InsuranceCome" value="<?php echo $insurnace_been_to_home; ?>"> Yes
                <input type="radio" name="InsuranceCome" value="<?php echo $insurance_been_to_home; ?>"> No
                <br>

                <label class="long"><h5>Have you signed a contract with a roofing company?</h5></label>
                <input type="radio" name="Signed" value="<?php echo $signed_contract; ?>"> Yes
                <input type="radio" name="Signed" value="<?php echo $signed_contract; ?>"> No
                <br>

                <label class="long"><h5>Additional Information:</h5></label>
                <input type="text" name="AdditionalInfo" size="50" value="<?php echo $additional_info; ?>"><br>
                </h5>
        </div>
</form>

<script type="text/javascript" src="datepair.js"></script>
<script type="text/javascript" src="jquery.datepair.js"></script>
<script>
// initialize input widgets first
// $('#datepairExample .time').timepicker({
// 'showDuration': true,
// 'timeFormat': 'g:ia'
// });
//
// $('#datepairExample .date').datepicker({
// 'format': 'yyyy-m-d',
// 'autoclose': true
// });
//
// // initialize datepair
// $('#datepairExample').datepair();
// </script>
=======
<link href="edit_lead.css" rel="stylesheet">

<form method="post" action="find_lead.php">
	<label class="medium"><h5>Search for lead by ID:</h5></label>
	<input type="search" name="find_lead">
	<input type="submit" value="search">
</form>

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
>>>>>>> d386f7123f15acb3b33f56808b05035302aff9ee
