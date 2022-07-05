<?php
    declare(strict_types = 1);
    require_once(__DIR__.'/../database/connection.db.php');
    require_once(__DIR__.'/../database/category.class.php');
    require_once(__DIR__.'/../template/common.tpl.php');
    require_once(__DIR__.'/../template/categories.tpl.php');
    
    
    //$restaurant = $_GET['restaurantId'];
    global $db;

    $ar = Category::getAllCategories($db);

    drawHeader(2);
    drawCategories($ar);
    drawFooter();

?>