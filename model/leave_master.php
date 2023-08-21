<?php
include '../db.php';

session_start();

echo"leave master<br>";


$role= $_SESSION['role'];



if($role==1){
echo"add new leave<br>";
echo"<a href="">click here</a>";

	try{
		$sql="select * from leave_management_leave";
		$stmt=$db->prepare($sql);
		$result= $stmt->execute();

		while($stmt->rowcount()>=0){
			$data= $stmt->fetch(PDO::FETCH_ASSOC);
			echo "<pre>";
			print_r($data);
		}


	}catch(Exception $e){
      echo"problem in leave_master.php->if->try<br>"
      echo $e;
	}

}else{
	echo"you have logged in as other than admin<br>";
	echo" unable to access leave master...<br>";
	echo"go to profile page <a herf='../view/profile_page.php'>profile page</a><br>";
}



echo"<a href='../view/admin_profile_page.php'>back</a><br>";

?>