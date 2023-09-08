<?php
include'../db.php';

session_start();
$role=$_SESSION['role'];

echo"department master<br>";
if($role==1){
	//admin role goes here
	echo"<a href='../view/add_dept.php'>add new department</a><br>";

try{
		$sql="select * from leave_management_department";
		$stmt=$db->prepare($sql);
		$result= $stmt->execute();

		if($stmt->rowcount()>0){
			$data= $stmt->fetchAll(PDO::FETCH_ASSOC);
			//echo "<pre>";
			//print_r($data);
		
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td>id</td>";
            echo "<td>department</td>";
            echo "<td>modify</td>";
            echo "<td>delete</td>";
            echo "</tr>";

            foreach ($data as $row) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['department'] . "</td>";
                echo 
                "<td><a href='../view/modify_dept.php?id=" . $row['id'] . "'>modify</a></td>";
                echo "<td><a href='../view/delete_dept.php?id=".$row['id']."'>delete</a></td>";
                echo "</tr>";
            }

            echo "</table>";
		
}

	}catch(Exception $e){
      echo"problem in dept_master.php->if->try<br>";
      echo $e;
	}


}else{
	//other than admin role goes here
}


echo"<a href='../view/admin_profile_page.php'>back</a><br>"

?>