<?php
    declare(strict_types = 1);
    require_once(__DIR__.'/../database/connection.db.php');
    require_once(__DIR__.'/../database/restaurant.class.php');
    require_once(__DIR__.'/../database/category.class.php');
    require_once(__DIR__.'/../template/common.tpl.php');
    require_once(__DIR__.'/../template/create.tpl.php');
    require_once(__DIR__.'/../template/restaurants.tpl.php');
    require_once __DIR__.'/../pages/login.php';
    require_once(__DIR__.'/../database/user.class.php');
    
    global $db;
    $id = (int) $_GET['id'];
    global $session;
    if ($session->getId() == User::getRestaurantOwner($db, $id)->id){
        drawHeader(5);
        drawCreateDish((int) $id);
        drawFooter();
    }
    else{
        echo "<div class='alert alert-danger'>Access Denied</div>";
    }


?>