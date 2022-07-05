<?php
    require_once(__DIR__.'/../database/connection.db.php');
    require_once(__DIR__.'/../database/user.class.php');
    require_once(__DIR__.'/../pages/login.php');
    
    global $db;
    global $session;
    $id = (int) $_GET['id'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    
    $ar = User::getUser($db, $id);
    $hashNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    if($session->getId() == $id){
        if( password_verify($oldPassword, $ar->password))
            if($newPassword !== null && $id !== null){
                $query = "UPDATE 'User' SET password = '$hashNewPassword' WHERE id = '$id'";
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