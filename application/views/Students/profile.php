<?php 
	$student_name = $this->session->userdata("student_name");
	$student_first_name = $this->session->userdata("student_first_name");
	$student_last_name = $this->session->userdata("student_last_name");
	$student_email = $this->session->userdata("student_email");

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		div {
			border: 2px solid black;
			width: 500px;
			padding: 10px;
			height: 300px;
		}
		h1 {
			display: inline-block;
		}
		a {
			font-size: 20px;
			margin-left: 800px;
		}
	</style>
</head>
<body>
	<h1>Welcome <?= $student_name ?>!</h1>
	<a href="/Students/logout"> Logout </a>
	<div>
		<h2>First Name : <?= $student_first_name ?></h2>
		<h2>Last Name  : <?= $student_last_name ?></h2>
		<h2>Email Address : <?= $student_email ?></h2>
	</div>
</body>
</html>