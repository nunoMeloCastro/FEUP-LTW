<?php
    declare(strict_types = 1);
    require_once(__DIR__.'/../database/connection.db.php');
    require_once(__DIR__.'/../database/restaurant.class.php');
    require_once(__DIR__.'/../template/common.tpl.php');
    require_once(__DIR__.'/../database/user.class.php');
    require_once(__DIR__.'/../template/restaurants.tpl.php');
    require_once (__DIR__.'/../pages/login.php');
    
    
    //$restaurant = $_GET['restaurantId'];
    global $db;
    global $session;

    $id = $session->getId();

    $op = (int) $_GET['op'];
    $en = (int) $_GET['en'];

    $ar = Restaurant::getAllOwnedRestaurant($db, $id);
    global $session;
    if (User::isOwner($db, $session->getId())){
        drawHeader(5);
        drawSelectRestaurants($ar, $en, $op);
        drawFooter();
    }
    else{
        echo "<div class='alert alert-danger'>Access Denied</div>";
    }

?>