<?php
    declare(strict_types = 1);
    require_once(__DIR__.'/../database/connection.db.php');
    require_once(__DIR__.'/../database/menu.class.php');
    require_once(__DIR__.'/../template/common.tpl.php');
    require_once(__DIR__.'/../template/edit.tpl.php');
    require_once(__DIR__.'/../database/user.class.php');
    require_once(__DIR__.'/../database/dish.class.php');
    require_once(__DIR__.'/../database/restaurant.class.php');
    require_once(__DIR__.'/../template/menus.tpl.php');
    require_once(__DIR__.'/../pages/login.php');
    
    
    //$restaurant = $_GET['restaurantId'];
    global $db;
    global $session;
    $id = (int) $_GET['id'];
    $usr = User::getUser($db, $id);
    $dish = Dish::getAllDishes($db);

    if ($session->getId() == $id){
        drawHeader(5);
        drawAddFavD($usr, $dish);
        drawFooter();
    }
    else{
        echo "<div class='alert alert-danger'>Access Denied</div>";
    }
?>