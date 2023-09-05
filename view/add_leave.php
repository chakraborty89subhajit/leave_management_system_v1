<?php

include'../db.php';

session_start();

echo"add new type of  leave to database<br>";

$role=$_SESSION['role'];

if($role==1){

	?>
<form method="post" action="../model/add_leave.php"  >
		<table border="1" align="center">
			<tr><td>
		add new type of leave:<input type="text" name="new_leave" placeholder="add new type of leave"/>
		</td></tr>
		<tr><td><input type="submit" name="add_leave" value="add_leave"  /></td></tr>
</form>

<?php
}else{
	echo"unmatched role<br>";
	echo"go to profile page <a herf='../view/profile_page.php'>profile page</a><br>";
}
echo"<a href='../view/admin_profile_page.php'>back</a><br>";

?>

