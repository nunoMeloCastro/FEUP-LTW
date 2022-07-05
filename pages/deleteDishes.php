<?php
    declare(strict_types = 1);
    require_once(__DIR__.'/../database/connection.db.php');
    require_once(__DIR__.'/../database/dish.class.php');
    require_once(__DIR__.'/../template/common.tpl.php');
    require_once(__DIR__.'/../template/restaurant.tpl.php');
    require_once(__DIR__.'/../database/user.class.php');
    require_once(__DIR__.'/../pages/login.php');
    
    //$restaurant = $_GET['restaurantId'];
    global $db;
    global $session;

    $rest = (int) $_GET['id'];

    $ar = Dish::getRestaurantDishes($db, $rest);
    if ($session->getId() == User::getRestaurantOwner($db, $rest)->id){
        drawHeader(5);
        drawDeleteDishes($ar);
        drawFooter();
    }
    else{
        echo "<div class='alert alert-danger'>Access Denied</div>";
    }

?>