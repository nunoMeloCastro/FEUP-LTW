<?php
	require_once __DIR__.'/../database/connection.db.php';
	require_once __DIR__.'/../utils/session.php';
	$session = new Session();
	
	if(ISSET($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query1=$conn->query("SELECT password , id FROM `User` WHERE `username`='$username'");

		$row=$query1->fetchArray();
		$count=$row['password'];
		$id = $row['id'];
        $hash_check = password_verify($password, $count);
        //echo "Hash".$hash_check;
        //echo "Count".$count;
		if($hash_check){
            //echo "Password is correct";
			$session->setId($row['id']);
			header('location: /../pages/user.php');
		}else{
            //echo "Password is incorrect";
			echo "<div class='alert alert-danger'>Invalid username or password</div>";
		}
	}
?>