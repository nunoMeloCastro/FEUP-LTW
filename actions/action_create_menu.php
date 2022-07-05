<?php
    require_once(__DIR__.'/../database/connection.db.php');
    require_once(__DIR__.'/../database/user.class.php');
    require_once(__DIR__.'/../database/restaurant.class.php');
    require_once(__DIR__.'/../pages/login.php');
    
    global $db;
    global $session;
    $name = $_POST['name'];
    $id = (int) $_GET['id'];

    if ($session->getId() == User::getRestaurantOwner($db, $id)->id){
        if($name !== null && $id !== null){
            $query="INSERT INTO Menu(name, restaurantID) VALUES('$name', '$id')";
            $conn->exec($query); 
            header('location: /../pages/management.php');
        }
        else{
            echo "<div class='alert alert-danger'>Please fill in all fields</div>";
        }
    }
    else{
        echo "<div class='alert alert-danger'>Operation Denied</div>";
    }
        
?>