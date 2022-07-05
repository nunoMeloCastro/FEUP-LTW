<?php
    declare(strict_types = 1);
    require_once(__DIR__.'/../database/connection.db.php');
    require_once(__DIR__.'/../database/menu.class.php');
    require_once(__DIR__.'/../database/dish.class.php');
    require_once(__DIR__.'/../database/user.class.php');
    require_once(__DIR__.'/../database/restaurant.class.php');
    require_once(__DIR__.'/../template/common.tpl.php');
    require_once(__DIR__.'/../template/restaurant.tpl.php');
    

    $id = (int) $_GET['id'];
    global $db;

    $ar = Restaurant::getRestaurant($db, $id);
    $owner = User::getRestaurantOwner($db, $id);
    $menus = Menu::getRestaurantMenus($db, $id);
    //echo sizeof($menus);
    $dishes = Dish::getRestaurantDishes($db, $id);

    drawHeader(4);
    drawRestInfo($ar, $owner);
    drawRestMenus($menus);
    drawRestDishes($dishes);
    drawFooter();

?>