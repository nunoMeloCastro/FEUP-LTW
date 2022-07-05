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
    
    
    //$restaurant = $_GET['restaurantId'];
    global $db;
    global $session;
    //$id = (int) $_GET['id'];

    //$ar = Restaurant::getRestaurant($db, $id);

    $cats = Category::getAllCategories($db);
    if (User::isOwner($db, $session->getId())){
        drawHeader(5);
        drawCreateRest( $cats);
        drawFooter();
    }
    else{
        echo "<div class='alert alert-danger'>Access Denied</div>";
    }

?>