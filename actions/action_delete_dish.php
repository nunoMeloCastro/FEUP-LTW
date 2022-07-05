<?php
    require_once(__DIR__.'/../database/connection.db.php');
    require_once(__DIR__.'/../database/user.class.php');
    require_once(__DIR__.'/../database/dish.class.php');
    require_once(__DIR__.'/../database/restaurant.class.php');
    require_once(__DIR__.'/../pages/login.php');
    
    global $db;
    global $session;
    $id = (int) $_GET['id'];

    $ar = Dish::getDish($db, $id);
    if ($session->getId() == Restaurant::getRestaurant($db, $ar->idRestaurant)->ownerID){
        if($id !== null){
            $query="DELETE FROM 'Dishes' WHERE id = '$id'";
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