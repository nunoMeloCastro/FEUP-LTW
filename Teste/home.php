<?php
	session_start();
	if(!ISSET($_SESSION['id'])){
		header('location: ../Teste/index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="https://sourcecodester.com">Sourcecodester</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">PHP - Complete Registration Login Form In SQLite</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<center><h1>WELCOME USER</h1></center>
		<a href="logout.php">logout</a>
	</div>

</body>	
</html>