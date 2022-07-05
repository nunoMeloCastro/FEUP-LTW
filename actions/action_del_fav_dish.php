<?php
    require_once(__DIR__.'/../database/connection.db.php');
    require_once(__DIR__.'/../database/user.class.php');
    require_once(__DIR__.'/../database/menu.class.php');
    require_once(__DIR__.'/../database/restaurant.class.php');
    require_once(__DIR__.'/../pages/login.php');
    
    global $db;
    global $session;
    $userID = $session->getId();
    $dishID = $_POST['dish'];

    if ($session->getId() == $userID){
        if($userID !== null && $dishID !== null){
            $query="DELETE FROM UserFavDish WHERE (userID = '$userID' AND dishID = '$dishID')";
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