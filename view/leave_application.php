<?php

include '../db.php';

session_start();

$role= $_SESSION['role'];

if($role==1){
	$stmt=$db->prepare("select * from leave_management_leave_application");
	$stmt->execute();


            if($stmt->rowcount()>0){
                  $data= $stmt->fetchAll(PDO::FETCH_ASSOC);
                  //echo "<pre>";
                  //print_r($data);
            
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td>id</td>";
            echo "<td>leave_type</td>";
            echo "<td>start_date</td>";
            echo "<td>end_date</td>";
            echo "<td>status</td>";
             echo "<td>modify</td>";
            echo "</tr>";

            foreach ($data as $row) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                //echo "<td>" . $row['leave_id'] . "</td>";
                //displaying the leave type form leave_management_leave using leave_id
$leave_id=$row['leave_id'];
$stmt3=$db->prepare("select leaveType from leave_management_leave where id = :id");
$stmt3->bindparam(':id',$leave_id);
$stmt3->execute();

if($stmt3->rowcount()>0){
      $leave_type= $stmt3->fetchAll(PDO::FETCH_ASSOC);
      foreach($leave_type as $type){
            echo"<td>".$type['leaveType']."</td>";
      }
}
                echo "<td>".$row['start_date']."</td>";
                echo "<td>".$row['start_date']."</td>" ;
                echo "<td>".$row['status']."</td>" ;
                  echo 
                "<td><a href='../view/modify_leave_application.php?id=" . $row['id'] . "'>modify</a></td>";
                echo "</tr>";
            }

            echo "</table>";

}
}
echo"<a href='../view/admin_profile_page.php'>back</a><br>";
?>