<?php
include '../db.php';
session_start();

echo"admin profile page<br>";

 $employee_name= $_SESSION['username'];
      $dept_id= $_SESSION['dept_id'];
      $role= $_SESSION['role'];
      $id=$_SESSION['id'];


      echo "employee basic details<br>";

      echo "welcome ".$employee_name."<br>";

     // if($role==1){
      	//echo"loging as admin<br>";
      
$stmt=$db->prepare("select department from leave_management_department where id = :id");
$stmt->bindparam(':id',$role);
$stmt->execute();
if($stmt->rowcount()>0){
     $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
     foreach($data as $row){
         echo $row['department'].' dept.  <br>';
     }

}
      
else{
     echo"loging in as employee roll<br>";
}

      echo"<a href='../view/dept_master.php'>department master</a><br>";
      echo"<a href='../view/employee_master.php'>employee master</a><br>";
      echo"<a href='../view/leave_master.php'>leave master</a><br>";
      echo"<a href='../view/leave_application.php'>leave application</a><br>"
?>