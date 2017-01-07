
<tr>
  <th>
    <?php
        //echo $row_user['account_id']
        $sql_employees_info = $db->prepare("SELECT * FROM employees
                          WHERE account_id = ?
                          LIMIT 1");
        $sql_employees_info->bindValue(1, $row_user['account_id']);
        $sql_employees_info->execute();

        $row_employees = $sql_employees_info->fetch();

        echo $row_employees['firstname'], ' ', $row_employees['lastname'];
      ?>
  </th>
  <th class=<?php echo $schedule[$itr][0]; ?>> </th>
  <th class=<?php echo $schedule[$itr][1]; ?>> </th>
  <th class=<?php echo $schedule[$itr][2]; ?>> </th>
  <th class=<?php echo $schedule[$itr][3]; ?>> </th>
  <th class=<?php echo $schedule[$itr][4]; ?>> </th>
  <th class=<?php echo $schedule[$itr][5]; ?>> </th>
  <th class=<?php echo $schedule[$itr][6]; ?>> </th>
  <th class=<?php echo $schedule[$itr][7]; ?>> </th>
  <th class=<?php echo $schedule[$itr][8]; ?>> </th>
  <th class=<?php echo $schedule[$itr][9]; ?>> </th>
</tr>
