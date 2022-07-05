<?php
    declare(strict_types = 1);
    require_once(__DIR__.'/../database/connection.db.php');
    require_once(__DIR__.'/../database/restaurant.class.php');
    require_once(__DIR__.'/../database/category.class.php');
    require_once(__DIR__.'/../database/user.class.php');
    require_once(__DIR__.'/../template/common.tpl.php');
    require_once(__DIR__.'/../template/edit.tpl.php');
    require_once(__DIR__.'/../template/restaurants.tpl.php');
    require_once __DIR__.'/../pages/login.php';
    require_once(__DIR__.'/../database/user.class.php');
    
    
    //$restaurant = $_GET['restaurantId'];
    global $db;

    $id = (int) $_GET['id'];

    $ar = Restaurant::getRestaurant($db, $id);

    $cats = Category::getAllCategories($db);
    global $session;
    if ($session->getId() == $ar->ownerID){
        drawHeader(5);
        drawEditRest($ar, $cats);
        drawFooter();
    }
    else{
        echo "<div class='alert alert-danger'>Access Denied</div>";
    }
?>