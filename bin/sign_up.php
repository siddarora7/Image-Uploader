<!DOCTYPE html>
<html>
<head>
	<title>Sign-Up</title>
	<link rel="stylesheet" type="text/css" href="sign_up_style.css">
</head>
<body bgcolor="#A6E6FA">
<div id ="Sign-Up">
<fieldset style="width: 90%"><legend>Registration form</legend>
<table border="0">
	<tr>
		<form method="POST" action="connection-sign-up.php">
		<td>Name</td><td><input type="text" name="name"></td>
	</tr>
		<tr>
			<td>Email</td><td><input type="text" name="E-mail"></td>
		</tr>
		<tr>
			<td>Username</td><td><input type="text" name="User"></td>
		</tr>
		<tr>
			<td>Password</td><td><input type="password" name="Pass"></td>
		</tr>
		<tr>
			<td>Confirm Password</td><td><input type="password" name="CPass"></td>
		</tr>
		<tr>
			<td><input id="button" type="submit" name="submit" value="Sign-Up"></td>
		</tr>
		</form>
	
</table>
</fieldset>
</div>
</body>
</html>