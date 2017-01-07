	<link href="generate_lead.css" rel="stylesheet">
	<form method="post" action="submit.php" >
	<div>
	<div class="col_one">
		<h5>
		<label class="short"><h5>Time:</h5></label>
		<input type="datetime-local" name="lead_time" value=""><br>
		
		<label class="short"><h5>Today's Date:</h5></label>
		<input type="date" name="todays_date" value=""><br>
		
		<label class="short"><h5>Name:</h5></label>
		<input type="text" name="name" value=""><br>
		
		<label class="short"><h5>Address:</h5></label>
		<input type="text" name="address" value=""><br>
		
		<label class="short"><h5>City:</h5></label>
		<input type="text" name="city" value=""><br>
		
		<label class="short" ><h5>state:</h5></label>
		<select name="state">
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
		
		<label class="short"><h5>Zip Code:</h5></label>
		<input type="text" name="zip" value=""><br>
		
		<label class="short"><h5>Email:</h5></label>
		<input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value=""><br>
		
		<label class="short"><h5>Home Phone Number:</h5></label>
		<input type="tel" name="home" value=""><br>
		
		<label class="short"><h5>Cell Phone Number:</h5></label>
		<input type="tel" name="cell" value=""><br>
		
		 
	</div>
	<div class="col_two">
		<label class="long"><h5>What type of building?</h5></label>
		<input type="radio" name="sales_type" value = "commercial"> Commercial
		<input type="radio" name="sales_type" value = "residential"> Residential
		<br>
											
		<label class="long"><h5>How many stories is you home?</h5></label>
		<input type="radio" name="height" value="1"> 1 Story
		<input type="radio" name="height" value="2"> 2 Story
		<input type="radio" name="height" value="3"> 1 1/2 Story
		<br>
		
		<label class="long"><h5>What type of roof do you have?</h5></label>
		<input type="radio" name="roof_type" value="Asphalt"> Standard Shingles (Asphalt)
		<input type="radio" name="roof_type" value="Wood"> Wood
		<input type="radio" name="roof_type" value="Metal"> Metal
		<br>
		
		<label class="long"><h5>How old is your roof?</h5></label>
	<input type="text" name="roof_age" value=""><br>
	
	<label class="long"><h5>Is your roof leaking?</h5></label>
	<input type="radio" name="roof_leak" value="1"> Yes
	<input type="radio" name="roof_leak" value="0"> No
		<br>
		
		<label class="long"><h5>Where?</h5></label>
		<input type="text" name="roof_leak_where"><br>
											
		<label class="long"><h5>Is your roof missing any shingles?</h5></label>
		<input type="radio" name="missing_shingles" value="1"> Yes  
		<input type="radio" name="missing_shingles" value="0"> No  
		<br>
		
		<label class="long"><h5>Do you have gutters on your home?</h5></label>
		<input type="radio" name="gutters" value="1"> Yes  
		<input type="radio" name="gutters" value="0"> No
		<br>
		
		<label class="long"><h5>Does your home have siding?</h5></label>
		<input type="radio" name="siding" value="1"> Yes
		<input type="radio" name="siding" value="0"> No
		<br>
		
		<label class="long"><h5>What is the name of your insurance company?</h5></label>
		<input type="text" name="insurance_company" value=""><br>
		
		<label class="long"><h5>Have you called your inssurance company?</h5></label>
		<input type="radio" name="called_insurance" value="1"> Yes
		<input type="radio" name="called_insurance" value="0"> No
		<br>
		
		<label class="long"><h5>Has your insurance company to your home?</h5></label>
		<input type="radio" name="insurance_come" value="1"> Yes
		<input type="radio" name="insurance_come" value="0"> No
		<br>
		
		<label class="long"><h5>Have you signed a contract with a roofing company?</h5></label>
		<input type="radio" name="signed" value="1"> Yes
		<input type="radio" name="signed" value="0"> No
		<br>
		
		<label class="long"><h5>Additional Information:</h5></label>
		<input type="text" name="additional_info" size="50" value=""><br>
		</h5>
		<br><input name="submit" type="submit" value="Generate Lead"><br>
	</div>
	</div>
	
</form>

<script type="text/javascript" src="datepair.js"></script>
<script type="text/javascript" src="jquery.datepair.js"></script>
<script>
// initialize input widgets first
$('#datepairExample .time').timepicker({
'showDuration': true,
'timeFormat': 'g:ia'
});

$('#datepairExample .date').datepicker({
'format': 'yyyy-m-d',
'autoclose': true
});

// initialize datepair
$('#datepairExample').datepair();
</script>
