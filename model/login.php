<?php

include '../db.php';
 
 session_start();

$email=$_POST['email'];
$password=$_POST['password'];

//echo $email." ".$password;
try{
$sql= "select * from leave_management_employee_new where email='$email' and password ='$password'";
//echo $sql;
$stmt= $db->prepare($sql);
$result = $stmt->execute();

$row_num=$stmt->rowcount();
//echo $row_num;
if($row_num>=1){
	
	$data= $stmt->fetch(PDO::FETCH_ASSOC);
	//echo"<pre>";
	//print_r($data);
      
     $_SESSION['username']= $data['name'];
      $_SESSION['dept_id']= $data['dept_id'];
       $_SESSION['role']= $data['role'];
        $_SESSION['id']= $data['id'];
    // echo "welcome".$_SESSION['username'];

 if($_SESSION['role']===1){
    header("Location: ../view/admin_profile_page.php");
        exit();
 }else{

	  header("Location: ../view/profile_page.php");
        exit();
    }
}else{

    echo"invalid credentials<br>";
    echo "pls.<a href='../view/registration.php'>log in</a> to continue...";
}

}catch(Exception $e){
    echo"unable to perfrom the log in ops<br>";
    echo $e;
}

?>