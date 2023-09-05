<?php

include '../db.php';

session_start();

$new_leave = $_POST['new_leave'];

 $role=$_SESSION['role'];
//echo $new_leave;

if($role == 1){
    try{
        $stmt= $db->prepare("insert into leave_management_leave (leaveType) values(?)");
        $stmt->bindparam(1,$new_leave);
        if($stmt->execute()){
            echo"new leave type added successfully<br>";
            echo"click here to <a href='../view/leave_master.php'>back</a><br>";
        }else{
            echo"error in model->add_leave->if->try->if<br>";
        }

    }catch(Exception $e){
      echo $e;

    }

}else{

    echo"can not perform opt. other than admin log in<br>";
}



?>