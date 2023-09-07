<?php

include'../db.php';

session_start();

echo"add new type of  department to database<br>";

$role=$_SESSION['role'];

if($role==1){

	?>
<form method="post" action="../model/add_dept.php"  >
		<table border="1" align="center">
			<tr><td>
		add new type of department:<input type="text" name="new_dept" placeholder="add new type of department"/>
		</td></tr>
		<tr><td><input type="submit" name="add_dept" value="add_dept"  /></td></tr>
</form>

<?php
}else{
	echo"unmatched role<br>";
	echo"go to profile page <a herf='../view/profile_page.php'>profile page</a><br>";
}
echo"<a href='../view/admin_profile_page.php'>back</a><br>";

?>

