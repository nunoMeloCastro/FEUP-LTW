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

    $id = (int) $_GET['id'];

    $ar = Menu::getMenu($db, $id);
    $di = Dish::getMenuDishes($db, $id);

    global $session;
    if ($session->getId() == Restaurant::getRestaurant($db, $ar->restaurantID)->ownerID){
        drawHeader(5);
        drawEditMenu($ar, $di);
        drawFooter();
    }
    else{
        echo "<div class='alert alert-danger'>Access Denied</div>";
    }
?>