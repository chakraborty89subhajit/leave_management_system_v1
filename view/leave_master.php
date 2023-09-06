<?php
include '../db.php';

session_start();

echo"leave master<br>";


$role= $_SESSION['role'];



if($role==1){
echo"add new leave<br>";
echo"<a href='../view/add_leave.php'>click here</a>";

	try{
		$sql="select * from leave_management_leave";
		$stmt=$db->prepare($sql);
		$result= $stmt->execute();

		if($stmt->rowcount()>0){
			$data= $stmt->fetchAll(PDO::FETCH_ASSOC);
			//echo "<pre>";
			//print_r($data);
		
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td>id</td>";
            echo "<td>leave type</td>";
            echo "<td>modify</td>";
            echo "<td>delete</td>";
            echo "</tr>";

            foreach ($data as $row) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['leaveType'] . "</td>";
                echo 
                "<td><a href='../view/modify_leave.php?id=" . $row['id'] . "'>modify</a></td>";
                echo "<td><a href=''>delete</a></td>";
                echo "</tr>";
            }

            echo "</table>";
		
}

	}catch(Exception $e){
      echo"problem in leave_master.php->if->try<br>";
      echo $e;
	}

}else{
	echo"you have logged in as other than admin<br>";
	echo" unable to access leave master...<br>";
	echo"go to profile page <a herf='../view/profile_page.php'>profile page</a><br>";
}



echo"<a href='../view/admin_profile_page.php'>back</a><br>";

?>