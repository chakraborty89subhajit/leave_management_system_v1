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
    




?>