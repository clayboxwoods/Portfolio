<!--
DASHBOARD
DASHBOARD
DASHBOARD
-->
<?php
  date_default_timezone_set('America/Chicago');
  //array for employee_id to reference for appts
  $employee_ids = array();
  //2d array for each employee and time
  $schedule = array();
  //Counter for number of employees
  $num_employees = 0;

  $sql_acc = 'SELECT * FROM employees';
  foreach($db->query($sql_acc) as $row_user)
  {
    $employee_id[$num_employees] = $row_user["employee_id"];
    $schedule[$num_employees] = array("clear","clear","clear","clear","clear","clear","clear","clear","clear","clear");
    $num_employees = $num_employees + 1;
  }

  //array for available times: 09:00:00 - 18:00:00 (24 hour format)
  $times = array();
  $times[0]=date('Y-m-d 09:00:00');
  for( $k = 1; $k < 10; $k++ ){
    $timestamp = strtotime($times[$k-1]) + 3600;
    $times[$k] = date('Y-m-d H:i:s', $timestamp);
  }

  //Check appointments assign them appropriately to the schedule
  for( $i = 0; $i < 10; $i++){
    $num_appts = 0;
    $sql_appts = "SELECT * FROM appointments";
    foreach($db->query($sql_appts) as $row_appts)
    {
      //Check appropiate time
      if($row_appts['time'] == $times[$i]){
        if($row_appts['appointment_type'] == 2){ //time_off
          for($empl_itr = 0; $empl_itr < $num_employees; $empl_itr++){
            if($employee_id[$empl_itr] == $row_appts['employee_id']){
              $schedule[$empl_itr][$i] = "block";
            }// if
          }// for
        }// if time_off
        else
          $num_appts++;
      }// if
    }

    //Assign appointments to schedule
    for( $j = 0; $j < $num_appts; $j++){
      if($schedule[$j][$i] === "clear"){
        $schedule[$j][$i] = "appt";
      } //if
    } //for
  }
?>

<html>
  <head>
    <link rel="stylesheet" href="<?php echo 'table_style.css'; ?>" type="text/css">
  </head>
  <table>
    <thead>
      <tr>
        <td>Employee Name</td>
        <td>09:00am</td>
        <td>10:00am</td>
        <td>11:00am</td>
        <td>12:00pm</td>
        <td>01:00pm</td>
        <td>02:00pm</td>
        <td>03:00pm</td>
        <td>04:00pm</td>
        <td>05:00pm</td>
        <td>06:00pm</td>
      </tr>
      <tbody>
        <?php
        $itr = 0;
        $sql_acc = 'SELECT * FROM employees';
        foreach($db->query($sql_acc) as $row_user)
        {
        	include("employee_schedule.php");
          $itr = $itr + 1;
        }
        ?>
      </tbody>
    </thead>
  </table>
</html>
