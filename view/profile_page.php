<?php
include '../db.php';

session_start();
echo"welcome to profile page <br>";
//if(isset($_SESSION['username'])){
//echo"welcome  ".$_SESSION['username']."<br>"
//.$_SESSION['dept_id']."<br>".$_SESSION['role']."<br>".$_SESSION['id']."<br>";
      
      $employee_name= $_SESSION['username'];
      $dept_id= $_SESSION['dept_id'];
      $role= $_SESSION['role'];
      $id=$_SESSION['id'];


      echo "employee basic details<br>";

      echo "welcome ".$employee_name."<br>";

//displaying the employee depatment from database using  dept_id

$stmt=$db->prepare("select department from leave_management_department where id = :id ");
$stmt->bindparam(':id',$dept_id);
$stmt->execute();
if($stmt->rowcount()>0){

      $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
       foreach ($data as $row ){

            echo "department name : " .$row['department']."<br>";
       }

      
      //echo "<pre>";
        //          print_r($data);
}
    
echo"<a href='../view/add_leave_application.php'>add leave appliaction</a>";

$stmt1 = $db->prepare("select id, leave_id, start_date, end_date, status from leave_management_leave_application where emp_id = :id");
$stmt1->bindparam(':id',$id);
$stmt1->execute();


            if($stmt1->rowcount()>0){
                  $data= $stmt1->fetchAll(PDO::FETCH_ASSOC);
                  //echo "<pre>";
                  //print_r($data);
            
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td>id</td>";
            echo "<td>leave_type</td>";
            echo "<td>start_date</td>";
            echo "<td>end_date</td>";
            echo "<td>status</td>";
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
                echo "</tr>";
            }

            echo "</table>";

}

?>