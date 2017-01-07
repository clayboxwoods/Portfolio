<form method="post" action="request_time_off.php">
	<h5>
		<br>Start Time:<br>
		<input type="datetime-local" name="starttime">
		<br>
									
		<br>End Time:<br>
		<input type="datetime-local" name="endtime">
		<br>
									
		<br>
		<input type="submit" name="submit" value="Submit"><br>
	</h5>
</form>

<br>

<?php
	$sql_appt = '	SELECT * FROM appointments
					WHERE appointment_type = "2"
					';			
					
	foreach($db->query($sql_appt) as $row_appt)
	{
		echo $row_appt['appointment_id'].'<br>';
		include("tab.php");
	}
?>

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