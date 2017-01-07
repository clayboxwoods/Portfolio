<link href="view_contracts.css" rel="stylesheet">

<form method="post" action="find_lead.php">
	<label class="medium"><h5>Search for lead by ID:</h5></label>
	<input type="search" name="find_lead">
	<input type="submit" value="search">
</form>

<?php 
	$test = 'SELECT * FROM appointments';
	foreach($db->query($test) as $row)
	{
		//echo '"openform(event, \'Lead',$row['account_id'],'\')"';
		//echo '"Lead',$row['account_id'],'"';
		
		if($row['appointment_type'] == 1)
		{
			include("test.php");
		}
	
	}
	
?>

<script>
	function openform(evt, docName) 
	{
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		
		for (i = 0; i < tabcontent.length; i++) 
		{
			tabcontent[i].style.display = "none";
		}
		
		tablinks = document.getElementsByClassName("tablinks");
		
		if(!evt.currentTarget.className.includes(" active"))
		{
			for (i = 0; i < tablinks.length; i++) 
			{
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}
			document.getElementById(docName).style.display = "block";
			evt.currentTarget.className += " active";
		}
		else
		{
			for (i = 0; i < tablinks.length; i++) 
			{
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}
		}
		
	}

	// Get the element with id="defaultOpen" and click on it
	document.getElementById("defaultOpen").click();
</script>