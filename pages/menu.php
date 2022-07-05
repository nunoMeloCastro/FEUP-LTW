<?php
    declare(strict_types = 1);
    require_once(__DIR__.'/../database/connection.db.php');
    require_once(__DIR__.'/../database/menu.class.php');
    require_once(__DIR__.'/../database/dish.class.php');
    require_once(__DIR__.'/../database/restaurant.class.php');
    require_once(__DIR__.'/../template/common.tpl.php');
    require_once(__DIR__.'/../template/menu.tpl.php');
    

    $id = (int) $_GET['id'];
    global $db;

    $ar = Menu::getMenu($db, $id);
    $dishes = Dish::getMenuDishes($db, $id);
    $restaurant = Restaurant::getRestaurantFromMenu($db, $id);
    drawHeader(5);
    drawMenu($restaurant, $ar, $dishes);
    drawFooter();

?>