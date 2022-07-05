<?php
	require_once(__DIR__ . '/../utils/session.php');
	$session = new Session();
	$session->logout();
	$session->setCartDish("");
	$session->setCartMenu("");
	header('location:/../pages/register.login.php');
?>