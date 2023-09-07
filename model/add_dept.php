<?php

include '../db.php';

session_start();

$new_dept = $_POST['new_dept'];

 $role=$_SESSION['role'];
//echo $new_dept;

if($role == 1){
    try{
        $stmt= $db->prepare("insert into leave_management_department (department) values(?)");
        $stmt->bindparam(1,$new_dept);
        if($stmt->execute()){
            echo"new department added successfully<br>";
            echo"click here to <a href='../view/dept_master.php'>back</a><br>";
        }else{
            echo"error in model->add_dept->if->try->if<br>";
        }

    }catch(Exception $e){
      echo $e;

    }

}else{

    echo"can not perform opt. other than admin log in<br>";
}



?>