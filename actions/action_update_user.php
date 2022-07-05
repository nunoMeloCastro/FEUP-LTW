<?php
    require_once(__DIR__.'/../database/connection.db.php');
    require_once(__DIR__.'/../database/user.class.php');
    require_once(__DIR__.'/../pages/login.php');
    
    global $db;
    global $session;
    $username= $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $id = User::getUserID($db, $username);

    if($session->getId() == $id){
        if($username !== null && $name !== null && $email !== null && $address !== null && $phone !== null){
            $query="UPDATE 'User' SET username = '$username', name = '$name', email = '$email', address = '$address', phone = '$phone' WHERE id = '$id'";
            $conn->exec($query);
            header('location: /../pages/user.php'); 
        }
        else{
            echo "<div class='alert alert-danger'>Please fill in all fields</div>";
        }
    }
    else{
        echo "<div class='alert alert-danger'>Operation Denied</div>";
    }
?>