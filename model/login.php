<?php

include '../db.php';
 
 session_start();

$email=$_POST['email'];
$password=$_POST['password'];

//echo $email." ".$password;

$sql= "select * from leave_management_employee_new where email='$email' and password ='$password'";
$stmt= $db->prepare($sql);
$result = $stmt->execute();
if($result){
	
	$data= $stmt->fetch(PDO::FETCH_ASSOC);
	echo"<pre>";
	print_r($data);
      
     $_SESSION['username']= $data['name'];
      $_SESSION['dept_id']= $data['dept_id'];
       $_SESSION['role']= $data['role'];
        $_SESSION['id']= $data['id'];
    // echo "welcome".$_SESSION['username'];



	  header("Location: ../view/profile_page.php");
        exit();
}

?>