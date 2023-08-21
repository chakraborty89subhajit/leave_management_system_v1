<?php

include'../db.php';

session_start();

echo"add new type of  leave to database<br>";

$role=$_SESSION['role'];

if($role==1){



}else{
	echo"unmatched role<br>";
	echo"go to profile page <a herf='../view/profile_page.php'>profile page</a><br>";
}
echo"<a href='../view/admin_profile_page.php'>back</a><br>";

?>

