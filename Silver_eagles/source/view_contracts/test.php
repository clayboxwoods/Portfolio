  <script src="../dist/js/jquery.js"></script>
  <script src="../dist/js/bootstrap.min.js"></script>

<body>
<?php
	$sql_lead = $db->prepare('SELECT * FROM lead_generation
				 WHERE lead_id = ?
				 LIMIT 1');
	$sql_lead->bindValue(1, $row['appointment_id']);
	$sql_lead->execute();
	
	$row_lead = $sql_lead->fetch();
?>
  <ul class="nav nav-tabs tab">
    <li class="active"><a data-toggle="tab" href=<?php echo '"#Close',$row['appointment_id'],'"'; ?> >Close</a></li>
    <li><a data-toggle="tab" href=<?php echo '"#Lead',$row['appointment_id'],'"'; ?> >Lead</a></li>
    <li><a data-toggle="tab" href=<?php echo '"#Contract',$row['appointment_id'],'"'; ?>>Contract</a></li>
    <li><a data-toggle="tab" href=<?php echo '"#FLOP',$row['appointment_id'],'"'; ?>>FLOP</a></li>
	
	<div class="tab" style="text-align: right;">	
	<li style="width: 50px; text-align:center;"><strong><?php echo $row['appointment_id'];?></strong></li>
	</div>
	
	<div class="tab" style="text-align: right;">
	<li style="width: 400px; text-align:center;"><strong><?php echo $row_lead['address'], ', ', $row_lead['city'], ', ', $row_lead['state'], ' ', $row_lead['zip'];?></strong></li>
	</div>
  </ul>

  <div class="tab-content">
    
	<!-- CLOSE THE TABS (FIND A BETTER WAY LATER) -->
	<div id=<?php echo '"Close',$row['appointment_id'],'"'; ?> class="tab-pane fade in active">
    </div>
    
	<!-- DISPLAY LEADS -->
	<div id=<?php echo '"Lead',$row['appointment_id'],'"'; ?> class="tab-pane fade">
      <h5>Lead Form</h5>
		<form method="post" action="submit.php" >
		<div class="col_one">
			<h5>
<input type="text" name="appointment_id" hidden readonly value=<?php echo '"', $row['appointment_id'],'"'; ?>>
				<label class="short"><h5>Time:</h5></label>
				<input type="datetime-local" name="time" value=<?php echo '"', str_replace(" ", "T", $row_lead['time']), '"';?> ><br>
			
				<label class="short"><h5>Date Created:</h5></label>
				<input type="date" name="todays_date" value=<?php echo '"', substr($row_lead['todays_date'], 0, 10), '"';?>><br>
	<!--REMOVE ME -->		
				<label class="short"><h5>Assigned To:</h5></label>
				<input type="text" name="AssignedTo"><br>
	<!--FIGURE OUT HOW TO DO THE THING -->											
				<label class="short"><h5>Taken By:</h5></label>
				<input type="text" name="TakenBy"><br>
			
				<label class="short"><h5>Name:</h5></label>
				<input type="text" name="name" value=<?php echo '"', $row_lead['name'], '"';?>><br>
			
				<label class="short"><h5>Address:</h5></label>
				<input type="text" name="address" value=<?php echo '"', $row_lead['address'], '"';?>><br>
			
				<label class="short"><h5>City:</h5></label>
				<input type="text" name="city" value=<?php echo '"', $row_lead['city'], '"';?>><br>
			
			<label class="short"><h5>State:</h5></label>
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
			
				<label class="short"><h5>Zip:</h5></label>
				<input type="text" name="zip" value=<?php echo '"', $row_lead['zip'], '"';?>><br>
			
				<label class="short"><h5>Email:</h5></label>
				<input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value=<?php echo '"', $row_lead['email'], '"';?>><br>
			
				<label class="short"><h5>Home:</h5></label>
				<input type="tel" name="phone_home" value=<?php echo '"', $row_lead['phone_home'], '"';?>><br>
				
				<label class="short"><h5>Cell:</h5></label>
				<input type="tel" name="phone_cell" value=<?php echo '"', $row_lead['phone_cell'], '"';?>><br>
				
				<br><input type="submit" name="Submit" value="Update Lead"><br>
		</div>
		<div class="col_two">
			<label class="long"><h5>What type of building?</h5></label>
			<input type="radio" name="sales_type" value="commercial" <?php if($row_lead['sales_type'] == "commercial"){echo 'checked';}?>> Commercial
			<input type="radio" name="sales_type" value="residential" <?php if($row_lead['sales_type'] == "residential"){echo 'checked';}?>> Residential
			<br>
												
			<label class="long"><h5>How many stories is you home?</h5></label>
			<input type="radio" name="stories" value="1" <?php if($row_lead['stories'] == "1"){echo 'checked';}?>> 1 Story
			<input type="radio" name="stories" value="2" <?php if($row_lead['stories'] == "2"){echo 'checked';}?>> 2 Story
			<input type="radio" name="stories" value="3" <?php if($row_lead['stories'] == "3"){echo 'checked';}?>> 1 1/2 Story
			<br>
			
			<label class="long"><h5>What type of roof do you have?</h5></label>
			<input type="radio" name="roof_type" value="Asphalt" <?php if($row_lead['roof_type'] == "Asphalt"){echo 'checked';}?>> Standard Shingles (Asphalt)
			<input type="radio" name="roof_type" value="Wood" <?php if($row_lead['roof_type'] == "Wood"){echo 'checked';}?>> Wood
			<input type="radio" name="roof_type" value="Metal" <?php if($row_lead['roof_type'] == "Metal"){echo 'checked';}?>> Metal
			<br>
			
			<label class="long"><h5>How old is your roof?</h5></label>
			<input type="text" name="roof_age" <?php echo 'value="', $row_lead['roof_age'] ,'"'; ?>><br>
			
			<label class="long"><h5>Is your roof leaking?</h5></label>
			<input type="radio" name="roof_leaking" value="1" <?php if($row_lead['roof_leaking'] == "1"){echo 'checked';}?>> Yes
			<input type="radio" name="roof_leaking" value="0" <?php if($row_lead['roof_leaking'] == "0"){echo 'checked';}?>> No
			<br>
			
			<label class="long"><h5>Where?</h5></label>
			<input type="text" name="roof_leaking_where" <?php echo 'value="', $row_lead['roof_leaking_where'], '"';?>><br>
												
			<label class="long"><h5>Is your roof missing any shingles?</h5></label>
			<input type="radio" name="missing_shingles" value="1" <?php if($row_lead['missing_shingles'] == "1"){echo 'checked';}?>> Yes  
			<input type="radio" name="missing_shingles" value="0" <?php if($row_lead['missing_shingles'] == "0"){echo 'checked';}?>> No  
			<br>
			
			<label class="long"><h5>Do you have gutters on your home?</h5></label>
			<input type="radio" name="gutters" value="1" <?php if($row_lead['gutters'] == "1"){echo 'checked';}?>> Yes  
			<input type="radio" name="gutters" value="0" <?php if($row_lead['gutters'] == "0"){echo 'checked';}?>> No
			<br>
			
			<label class="long"><h5>Does your home have siding?</h5></label>
			<input type="radio" name="siding" value="1" <?php if($row_lead['siding'] == "1"){echo 'checked';}?>> Yes
			<input type="radio" name="siding" value="0" <?php if($row_lead['siding'] == "0"){echo 'checked';}?>> No
			<br>
			
			<label class="long"><h5>What is the name of your insurance company?</h5></label>
			<input type="text" name="insurance_name" <?php echo'value="', $row_lead['insurance_name'], '"';?>><br>
			
			<label class="long"><h5>Have you called your inssurance company?</h5></label>
			<input type="radio" name="called_insurance" value="1" <?php if($row_lead['called_insurance'] == "1"){echo 'checked';}?>> Yes
			<input type="radio" name="called_insurance" value="0" <?php if($row_lead['called_insurance'] == "0"){echo 'checked';}?>> No
			<br>
			
			<label class="long"><h5>Has your insurance company to your home?</h5></label>
			<input type="radio" name="insurance_been_to_home" value="1" <?php if($row_lead['insurance_been_to_home'] == "1"){echo 'checked';}?>> Yes
			<input type="radio" name="insurance_been_to_home" value="0" <?php if($row_lead['insurance_been_to_home'] == "0"){echo 'checked';}?>> No
			<br>
			
			<label class="long"><h5>Have you signed a contract with a roofing company?</h5></label>
			<input type="radio" name="signed_contract" value="1"  <?php if($row_lead['signed_contract'] == "1"){echo 'checked';}?>> Yes
			<input type="radio" name="signed_contract" value="0" <?php if($row_lead['signed_contract'] == "0"){echo 'checked';}?>> No
			<br>
			
			<label class="long"><h5>Additional Information:</h5></label>
			<input type="text" name="additional_info" size="50" <?php echo'value="', $row_lead['additional_info'], '"';?>><br>
			</h5>
		</div>
		</form>
    </div>
	
	<!-- DISPLAY CONTRACTS -->
    <div id=<?php echo '"Contract',$row['appointment_id'],'"'; ?> class="tab-pane fade">
      <h5>Contract</h5>
	<form method="post" action="update_contract.php">
		<table>
			<tr>
				<td><label class="short"><h5>Customer Name</h5></label><input type="text" name="customerName"></td>
				<td><label class="short"><h5>Email</h5></label><input type="text" name="email"></td>
			</tr>
			<tr>
				<td><label class="short"><h5>Street</h5></label><input type="text" name="street"></td>
				<td><label class="short"><h5>Phone</h5></label><input type="text" name="phone"></td>
			</tr>
			<tr>
				<td><label class="short"><h5>City:</h5></label>
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
				<input type="text" name="Zip"><br></td>
				<td><label class="short"><h5>Representative</h5></label><input type="text" name="representative"></td>
			</tr>
		</table>
		
		<div class="col-lg-12">
			<p>Wolfpack Roofing & COnstruction will assist Customer as needed with Customer's insurance claim. <mark>If the claim is not apporved by
			Customers insurance company. this Agreement shall be withdrawn and Custmer will have no oblilgation hereunder.</mark>If Customer's
			insurance claim is approved, ALL WORK included is said claim will be performed by WRC for the ammount apporved by Customer's
			insurance company, subject to WRC approval and agreement to accept said amount. Customer will be resposible for the deductible
			amount, if any, under his insurance policy. WRC will assist Customer with supplemental claims, as meeded, for additional work not
			covered/included in the initial approaved claim and any monies negotiated become part of the total claim.</p>
		</div>
		
		<table>
			<col width="100">
			<col width="40">
			<col width="40">
			<col width="240">
			<tr>
				<td><h5>Recover Roof # of Squares</h5></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><h5>Felt 30# 15# Split</h5></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><h5>____Years Bonded Roof</h5></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><h5>Tear off</h5></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><h5>Amount of Layers</h5></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><h5>Style of Shingles</h5></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><h5>Color of Shingles</h5></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><h5>New Valleys</h5></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><h5>Ridge</h5></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><h5>Galvanized Nails/Cap</h5></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><h5>Roof Jacks</h5></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><h5>Drip Edge</h5></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><h5>Clean up & haul Roof trash</h5></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><h5>Roll yard with magnetic roller</h5></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><br></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><br></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><br></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>

		</table>
		<p>Customer authorizes WRC to act as Customer's representative as to any and all persons or companies dealing with my insurance claim 
		including but not limited tp customer's insurance company, its adjustor, any independent adjustor, and Customer's Lender.</p>
		<a href="conditions.html"><marked>ACCEPTED AND AGREED TO TERMS AND CONDITIONS</marked></a><br><br>
		
		<label><h5>Customer Signature:</h5></label>
		<input type="text" name="customerSignature" width="50"><br>
		<label><h5>Date:</h5></label>
		<input type="date" name="Date1"><br>
		
		<label><h5>WRC Representative Signature:</h5></label>
		<input type="text" name="WRCrepresentativeSignature" width="50"><br>
		<label><h5>Date:</h5></label>
		<input type="date" name="Date1"><br>
	</form>
    </div>
	
	<!-- DISPLAY FLOP -->
    <div id=<?php echo '"FLOP',$row['appointment_id'],'"' ?> class="tab-pane fade">
      <h5>FLOP</h5>
	<form method="post" action="update_contract.php">
		<div class="col_one">
			<label class="short"><h5>Today's Date:</h5></label>
			<input type="date" name="Today"><br>
			
			<label class="short"><h5>Sales Rep:</h5></label>
			<input type="text" name="SalesRep"><br>
												
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
			
			<label class="short"><h5>Phone:</h5></label>
			<input type="tel" name="Phone"><br>
			
			<label class="short"><h5>Email:</h5></label>
			<input type="email" name="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"><br>
			
			<label class="short"><h5>Total Invoice Amount:</h5></label>
			<input type="text" name="totInvoice"><br>
			
			<label class="short"><h5>Lead ID</h5></label>
			<input type="text" name="LeadID" readonly><br>
			
			<label class="short"><h5>Number of Squares</h5></label>
			<input type="text" name="numsquares"><br>
			
			<label class="short"><h5>Style</h5></label>
			<input type="text" name="style"><br>
			
			<label class="short"><h5>Warranty Type</h5></label>
			<input type="text" name="warrantyType"><br>
			
			<label class="short"><h5>Shingle Manufacturer</h5></label>
			<input type="text" name="manufacturer"><br>
			
			<label class="short"><h5>25 year</h5></label>
			<input type="text" name="twentyFiveYear"><br>
			
			<label class="short"><h5>30 year</h5></label>
			<input type="text" name="thirtyYear"><br>
			
			<label class="short"><h5>Shingle Color</h5></label>
			<input type="text" name="shingleColor"><br>
			
			<label class="long"><h5>Full Perimeter of Structure (Outside Edges)</h5></label><br>
			<input type="text" name="perimeter"><br>
			
			<label class="short"><h5>Replacing Drip Edge:</h5></label>
			<input type="radio" name="dripEdge" value="yes">Yes
			<input type="radio" name="dripEdge" value="no">No<br>
			
			<label class="short"><h5>Size:</h5></label>
			<input type="radio" name="size" value="oneInch">1"
			<input type="radio" name="size" value="oneHalfInch">1.5"
			<input type="radio" name="size" value="twoInch">2"<br>
			
			<label class="short"><h5>Paint Drip:</h5></label>
			<input type="radio" name="paintDrip" value="yes">Yes
			<input type="radio" name="paintDrip" value="no">No<br>
			
			<label class="short"><h5>Drip Color:</h5></label>
			<input type="text" name="dripColor"><br>
			
			<br><input type="submit" value="Update FLOP"><br>
		
		</div>
		<div class="col_two">
			<label class="long"><h5>Roof Pitch:</h5></label>
			<input type="text" name="roofPitch"><br>
			
			<label class="long"><h5>Ridge LF:</h5></label>
			<input type="text" name="ridgeLF"><br>
			
			<label class="long"><h5>Ridge Style:</h5></label>
			<input type="text" name="ridgeStyle"><br>
			
			<label class="long"><h5>Valley LF:</h5></label>
			<input type="text" name="valleyLF"><br>
			
			<label class="long"><h5>Exhaust caps:</h5></label>
			<input type="radio" name="exhaustCaps" value="dr">D and R
			<input type="radio" name="exhaustCaps" value="rr">D and D<br>
						
			<label class="long"><h5>Sizes:</h5></label>
			<input type="text" name="sizes"><br>
			
			<label class="long"><h5>Pipe jacks: 3in1's</h5></label>
			<input type="text" name="pipeJacks"><br>
			
			<label class="long"><h5>Lead:</h5></label>
			<input type="text" name="lead"><br>
			
			<label class="long"><h5>Size Needed:</h5></label>
			<input type="radio" name="sizeNeeded" value="oneAndHalfInch">1.5"
			<input type="radio" name="sizeNeeded" value="twoInch">2"
			<input type="radio" name="sizeNeeded" value="threeInch">3"
			<input type="radio" name="sizeNeeded" value="fourInch">4"<br>
			
			<label class="long"><h5>Turbines:</h5></label>
			<input type="text" name="turbines"><br>
			
			<label class="long"><h5>Color BR/Bl/Mill:</h5></label>
			<input type="text" name="Trubinescolor"><br>
			
			<label class="long"><h5>Turbine Size:</h5></label>
			<input type="radio" name="turbineSize" value="12 IN">12 In
			<input type="radio" name="turbineSize" value="14 IN">14 In<br>
			
			<label class="long"><h5>Ridge Vents LF:</h5></label>
			<input type="text" name="ridgeVentsLF"><br>
			
			<label class="long"><h5>Box Vents:</h5></label>
			<input type="text" name="boxVents"><br>
			
			<label class="long"><h5>Vent Color:</h5></label>
			<input type="text" name="ventColor"><br>
			
			<label class="long"><h5>Decking:</h5></label>
			<input type="text" name="decking"><br>
			
			<label class="long"><h5>Decking Sheets OSB 7/16:</h5></label>
			<input type="text" name="deckingSheets"><br>
			
			<label class="long"><h5>Windows:</h5></label>
			<input type="text" name="windows"><br>
			
			<label class="long"><h5>Vinyl Replascement:</h5></label>
			<input type="text" name="vinylReplacement"><br>
			
			<label class="long"><h5>Screens with Frames:</h5></label>
			<input type="text" name="screensFrames"><br>
			
			<label class="long"><h5>A/C Comb:</h5></label>
			<input type="text" name="acComb"><br>
			
			<label class="long"><h5>Satellite Dishes:</h5></label>
			<input type="radio" name="satelliteDishes" value="Dr">D and R
			<input type="radio" name="satelliteDishes" value="Dispose">Dispose
			<br>
			
			<label class="long"><h5>Gutters 5 or 6 inch LF:</h5></label>
			<input type="text" name="gutters5or6LF"><br>
			
			<label class="long"><h5>Number of Downspouts:</h5></label>
			<input type="text" name="numDownspouts"><br>
			
			<label class="long"><h5>Gutter Color:</h5></label>
			<input type="text" name="gutterColor"><br>
			
			<label class="long"><h5>Skylights:</h5></label>
			<input type="text" name="skylights"><br>
			
			<label class="long"><h5>Skylight Size:</h5></label>
			<input type="text" name="skylightSize"><br>
			
			<label class="long"><h5>Skylight Color:</h5></label>
			<input type="text" name="skylightColor"><br>
		</div>
	</form>
    </div>
  </div>

</body>
<br>
