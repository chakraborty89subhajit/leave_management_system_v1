<?php
include '../db.php';

session_start();

$role=$_SESSION['role'];

echo" employee master<br>";

if($role==1){
	try{
		$sql="select * from leave_management_employee_new";
		$stmt=$db->prepare($sql);
		$result= $stmt->execute();

		if($stmt->rowcount()>0){
			$data= $stmt->fetchAll(PDO::FETCH_ASSOC);
			//echo "<pre>";
			//print_r($data);
		
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td>id</td>";
            echo "<td>name</td>";
            echo "<td>email</td>";
            echo "<td>mobile</td>";
            echo "<td>department</td>";
            echo "<td>address</td>";
            echo "<td>dob</td>";
            echo "<td>role</td>";
            echo "<td>modify</td>";
            echo "<td>delete</td>";
            echo "</tr>";

            foreach ($data as $row) {
           

    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['mob'] . "</td>";

    $dept_id = $row['dept_id'];
    try {
        // Fetch the department name based on dept_id from another table
        $stmt = $db->prepare("SELECT department FROM leave_management_department WHERE id = :id");
        $stmt->bindParam(':id', $dept_id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Fetch the department name and display it
            $departmentData = $stmt->fetch(PDO::FETCH_ASSOC);
            echo "<td>" . $departmentData['department'] . "</td>";
        } else {
            // Handle the case where department data is not found
            echo "<td>Department not found</td>";
        }
    } catch (Exception $e) {
        echo "Error in fetching department: " . $e->getMessage();
    }
     echo "<td>" . $row['address'] . "</td>";
      echo "<td>" . $row['DOB'] . "</td>";
       echo "<td>" . $row['role'] . "</td>";
         echo 
                "<td><a href='../view/modify_dept.php?id=" . $row['id'] . "'>modify</a></td>";
                echo "<td><a href='../view/delete_dept.php?id=".$row['id']."'>delete</a></td>";
                echo"</tr>";

            }

            echo "</table>";
		
}

	}catch(Exception $e){
      echo"problem in employee_master.php->if->try<br>";
      echo $e;
	}


}else{
	echo"you must have to log in with admin role<br>";
}


echo"<a href='../view/admin_profile_page.php'>back</a><br>"

?>