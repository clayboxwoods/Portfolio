 <link href="view_contracts.css" rel="stylesheet">

 
 <ul class="nav nav-tabs tab">
   <!-- <li class="active"><a data-toggle="tab" href=<?php echo '"#Close',$row_appt['appointment_id'],'"'; ?> >Close</a></li>
    <li><a data-toggle="tab" href=<?php echo '"#Lead',$row_appt['appointment_id'],'"'; ?> >Lead</a></li>
    <li><a data-toggle="tab" href=<?php echo '"#Contract',$row_appt['appointment_id'],'"'; ?>>Contract</a></li>
    <li><a data-toggle="tab" href=<?php echo '"#FLOP',$row_appt['appointment_id'],'"'; ?>>FLOP</a></li>
	-->
	
	
	<li><strong><?php echo $row_appt['appointment_id'];?></strong></li>
	
	
	
	
	<div class="tab" style="text-align: right;">
	<li ><button style="text-align: right; padding: 0;">x</button></li>
	</div>

	
	
	
	<div class="tab" style="text-align: left;">	
	<li style="width: 200px; width: 100%; text-align:center;"><strong><?php echo $row_appt['time'];?></strong></li>
	</div>
  </ul>