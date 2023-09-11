<?php
include'../db.php';

session_start();



 $employee_name= $_SESSION['username'];
      $dept_id= $_SESSION['dept_id'];
      $role= $_SESSION['role'];
      $id=$_SESSION['id']; 


$emp_id=$_POST['employee_id'];
$department_id=$_POST['department_id'];
$leave_id=$_POST['leave_id'];
$starting_date=$_POST['leave_starting_date'];
$ending_date=$_POST['leave_ending_date'];

//echo $emp_id." ".$department_id."<br>";

//chech if session data and entered data is same or not
  if($emp_id==$id){
$stmt=$db->prepare("insert into leave_management_leave_application (emp_id, dept_id,leave_id,start_date,end_date) values(?,?,?,?,?)");
$stmt->bindparam(1,$emp_id);
$stmt->bindparam(2,$department_id);
$stmt->bindparam(3,$leave_id);
$stmt->bindparam(4,$starting_date);
$stmt->bindparam(5,$ending_date);

if($stmt->execute()){
	echo"leave appliaction successfully added<br>";
	echo"<a href='../view/profile_page.php'>back</a>";
}



  }else{
  	echo"your credential does not match<br>";
  	echo"<a herf='../view/profile_page'>back</a>";
  }
?>