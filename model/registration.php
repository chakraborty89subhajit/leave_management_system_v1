<?php
include '../db.php';


$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$mob=$_POST['mob'];
$dept_id=$_POST['dept_id'];
$DOB=$_POST['DOB'];
$role=$_POST['role'];
$address=$_POST['address'];

//echo"$name"."$email"."$password"."$mob"."dept_id"."$DOB"."$role"."$address";
//if(isset(""))

 try{$stmt= $db->prepare("insert into leave_management_employee_new(name,email,mob,password,dept_id,address,DOB,role) values(?,?,?,?,?,?,?,?)");
$stmt->bindparam(1,$name);
$stmt->bindparam(2,$email);
$stmt->bindparam(3,$mob);
$stmt->bindparam(4,$password);
$stmt->bindparam(5,$dept_id);
$stmt->bindparam(6,$address);
$stmt->bindparam(7,$DOB);
$stmt->bindparam(8,$role);

if($stmt->execute()){
	echo"you have successfully registered";
	echo "pls.<a href='../view/registration.php'>log in</a> to continue...";
}else{
	echo"unable to registered from try block";
}
}catch(Exception $e){
	echo "the exceptiom is ";
	echo $e;

}



?>