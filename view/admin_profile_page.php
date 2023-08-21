<?php
session_start();

echo"admin profile page<br>";

 $employee_name= $_SESSION['username'];
      $dept_id= $_SESSION['dept_id'];
      $role= $_SESSION['role'];
      $id=$_SESSION['id'];


      echo "employee basic details<br>";

      echo "welcome ".$employee_name."<br>";

      if($role==1){
      	echo"loging as admin<br>";
      }

      echo"<a href='../view/dept_master.php'>department master</a><br>";
      echo"<a href='../view/employee_master.php'>employee master</a><br>";
      echo"<a href='../view/leave_master.php'>leave master</a><br>";

?>