<?php

session_start();


 $employee_name= $_SESSION['username'];
      $dept_id= $_SESSION['dept_id'];
      $role= $_SESSION['role'];
      $id=$_SESSION['id']; 

echo"leave appliaction form<br>";
?>

<div="conatainer" align="center">
<table border="1">
<form method="post" action ="../model/add_leave_application.php">
<tr><td>employee_id:<input type="text" name="employee_id" value="<?php echo $id; ?>"/></tr></td>
<tr><td>depatment_id:<input type="text" name="department_id" value="<?php echo $dept_id; ?>"/></tr></td>
<tr><td>leave_id:<input type="text" name="leave_id" /></tr></td>
<tr><td>starting_date:<input type="text" name="leave_starting_date"/></tr></td>
<tr><td>ending_date:<input type="text" name="leave_ending_date"/></tr></td>

<tr><td><input type="submit" name="submit" value="submit"></tr></td>

</form>
</table>

</div>

