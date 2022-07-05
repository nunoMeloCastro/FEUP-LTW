<?php
    declare(strict_types = 1);
    require_once(__DIR__.'/../database/connection.db.php');
    require_once(__DIR__.'/../database/restaurant.class.php');
    require_once(__DIR__.'/../template/common.tpl.php');
    require_once(__DIR__.'/../template/homepage.tpl.php');
    
    
    //$restaurant = $_GET['restaurantId'];
    global $db;

    $ar = Restaurant::getAllRestaurant($db);

    drawHeader(0);
    drawSlideShow($ar);
    drawFooter();

?>