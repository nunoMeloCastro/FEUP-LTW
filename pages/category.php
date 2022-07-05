<?php
    declare(strict_types = 1);
    require_once(__DIR__.'/../database/connection.db.php');
    require_once(__DIR__.'/../database/category.class.php');
    require_once(__DIR__.'/../database/dish.class.php');
    require_once(__DIR__.'/../template/common.tpl.php');
    require_once(__DIR__.'/../template/category.tpl.php');
    

    $id = (int) $_GET['id'];
    global $db;

    $ar = Category::getCategory($db, $id);
    $dishes = Dish::getCategoryDishes($db, $id);

    drawHeader(5);
    drawCatDishes($ar, $dishes);
    drawFooter();

?>