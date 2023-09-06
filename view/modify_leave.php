<?php
include '../db.php';

session_start();

$role = $_SESSION['role'];
$id = $_GET['id'];

//if($_SERVER['REQUEST_METHOD'] === 'POST'){
$proposed_leave=$_POST['proposed_leave_type'];
//}
if($role==1){
	echo "welcome to modify leave<br>";
	//echo $id;
echo $proposed_leave."<br>";
$str="update leave_management_leave set leaveType = :proposed_leave where id = :id";
//echo $str;
try{
$stmt=$db->prepare($str);
$stmt->bindparam(':proposed_leave',$proposed_leave);
$stmt->bindparam(':id',$id);
if($stmt->execute()){
	echo "record update successfully<br>";
	echo"<a href=../view/leave_master.php>back</a>";
}else {
	echo"error in try<br>";
}
}
catch(Exception $e){
echo $e."<br>";
echo"unable to perfrom upadation<br>";
}



	?>
<form method="post" action="../view/modify_leave.php?id=<?php echo $id;?>">
<table border="1">
	<tr>
		<td>
			proposed leave type:<input type="text" name="proposed_leave_type"/>
			<input type="submit" value="modify" name="modify_btn"/>
		</td>
	</tr>
</table>
</form>
	<?php

}else{
	echo"you are not logged in as admin , you don't have permission to modify leave<br>";
	echo"<a href='../view/admin_profile_page.php'>back</a>";

}

?>