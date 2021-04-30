<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<style type="text/css">
			h1, form {
				margin-left: 150px;
			}
			h1 {
				display: inline-block;
			}
			form {
				width: 600px;
			}
			form[name="login"] {
				height: 100px;
			}
			label {
				display: inline-block;
				width: 200px;
				font-size: 25px;
			}
			input {
				height: 3	0px;
				width: 372px;
				margin-bottom: 10px;
				padding: 5px;
			}
			input[type="submit"] {
				display: block;
				width: 100px;
				margin-left: 492px;
			}
			span {
				color: red;
				margin-left: 50px;
				font-size: 18px;
			}
			div {
				width: 700px;
				margin: 20px auto;
				border: 1px solid black;
				height: 100px;
				padding: 10px;
				text-align: center;
				font-size: 18px;
				color: red;
			}
		</style>
	</head>
	<body>
		<?= "<div>" . $this->session->flashdata("login_error")
		. $this->session->flashdata("errors") . "</div>"?>
		<h1>Login</h1>
		<form name="login" action="Students/login" method="post">
			<input type="hidden" name="action" value="login">
			<label>Email Address :</label>
			<input type="text" name="email">
			<label>Password :</label>
			<input type="password" name="password">
			<input type="submit" value="Login">
		</form>
		<h1>Register</h1>
		<form action="Students/register" method="post">
			<input type="hidden" name="action" value="register">
			<label>First Name : </label>
			<input type="text" name="first_name">
			<label>Last Name : </label>
			<input type="text" name="last_name">
			<label>Email : </label>
			<input type="text" name="email">
			<label>Password : </label>
			<input type="password" name="password">
			<label>Confirm Password : </label>
			<input type="password" name="confirm_password">
			<input type="submit" value="Register">
		</form>
	</body>
</html>