<?php

include'../db.php';

session_start();

$role = $_SESSION['role'];
$id=$_GET['id'];



if($role==1){
	echo" are you sure you want to delete the selected leave?<br>";
	//echo $id;
	//echo"<a href='../view/delete_leave.php?id=".$id."'>yes</a><br>";
	echo"<form method ='post'><input type='submit' name='yes' value='yes'/></form>";

if(isset($_POST['yes'])){
	//echo $id."<br>";
	try{
$stmt=$db->prepare("delete from leave_management_leave where id= :id");
$stmt->bindparam(':id',$id);
if($stmt->execute()){
	echo"record deleted successfully<br>";
	echo"<a href='../view/leave_master.php'>back</a><br>";
}
else{
	echo"unable to delete record<br>";
}
}catch(Exception $e){
	echo $e;

}
}
	



	echo"<a href='../view/leave_master.php'>no</a><br>";
}
else{
	echo"you are not loged in as admin...";
	echo"<a href='../view/admin_profile_page.php'>back</a>";
}
?>