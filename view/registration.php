<?php


?>
<div="container" align = "center" >
<h1>employee registration page</h1>
<h3>for new join, employee have to register himself/herself for single time</h3>

	<form method="post" action="../model/registration.php"  >
		<table border="1" align="center">
			<tr><td>
		name:<input type="text" name="name" placeholder="enter your name"/>
		</td></tr>
		<tr><td>
		email:<input type="text" name="email" placeholder="enter your email"/>
		</td></tr>
		<tr><td>
		password:<input type="password" name="password" placeholder="enter your password"/>
		</td></tr>
		<tr><td>
		mobile no:<input type="text" name="mob" placeholder="enter your mobile no"/>
		</td></tr>
		<tr><td>
		department id:<input type="text" name="dept_id" placeholder="enter your department id"/>
		</td></tr>
		<tr><td>
		date of birth:<input type="text" name="DOB" placeholder="enter your date of birth"/>
		</td></tr>
		<tr><td>
		role:<input type="text" name="role" placeholder="enter your role"/>
		</td></tr>
		<tr><td>
		address:<textarea name="address" placeholder="enter your name"></textarea>
		</td></tr>
		<tr><td><input type="submit" name="register" value="register"  /></td></tr>
	</table>
	</form>
</div>

<div="container" align = "center" >
<h1>employee log in page</h1>
<h3>for employee, who have alredy done register, have to log in</h3>

	<form method="post" action="../model/login.php"  >
		<table border="1" align="center">
			<tr><td>
		
		email:<input type="text" name="email" placeholder="enter your email"/>
		</td></tr>
		<tr><td>
		password:<input type="password" name="password" placeholder="enter your password"/>
		</td></tr>
		
		
		
		<tr><td><input type="submit" name="log in" value="log in"  /></td></tr>
	</table>
	</form>
</div>