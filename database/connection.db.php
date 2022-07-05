<?php
  declare(strict_types = 1);

  $conn=new SQLite3(__DIR__.'/../database/database.db') or die("Unable to open database!");
	$query="CREATE TABLE IF NOT EXISTS `User`(user_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username TEXT, password TEXT, name TEXT)";	
	$conn->exec($query);

  $db = new PDO('sqlite:'. __DIR__ .'/../database/database.db');
  $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>