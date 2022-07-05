<?php
	require_once __DIR__.'/../database/connection.db.php';
	if(ISSET($_POST['register'])){
		$username=$_POST['username'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$address=$_POST['address'];
		$phone=$_POST['phone'];
		$user_type=$_POST['user_type'];
		$hash_password = password_hash($password, PASSWORD_DEFAULT);

		$query="INSERT INTO 'User' ( username, name, email, address, phone, password) VALUES( '$username', '$name','$email','$address', '$phone','$hash_password')";
		$conn->exec($query);
		if($user_type == "customer"){
			$query_user_type="INSERT INTO 'Customer' Select id from User where username = '$username'";
		}
		elseif($user_type == "owner"){
			$query_user_type="INSERT INTO 'RestaurantOwner' Select id from User where username = '$username'";
		}	
		
		$conn->exec($query_user_type);
 
		echo "<center><h4 class='text-success'>Successfully registered!</h4></center>";
	}
?>