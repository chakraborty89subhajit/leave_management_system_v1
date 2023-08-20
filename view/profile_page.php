<?php
session_start();
echo"welcome to profile page <br>";
//if(isset($_SESSION['username'])){
//echo"welcome  ".$_SESSION['username']."<br>"
//.$_SESSION['dept_id']."<br>".$_SESSION['role']."<br>".$_SESSION['id']."<br>";
      
      $employee_name= $_SESSION['username'];
      $dept_id= $_SESSION['dept_id'];
      $role= $_SESSION['role'];
      $id=$_SESSION['id'];


      echo "employee basic details<br>";

      echo "welcome ".$employee_name."<br>";

        
?>