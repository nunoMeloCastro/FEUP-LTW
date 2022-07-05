<?php
    declare(strict_types = 1);
    require_once(__DIR__.'/../database/connection.db.php');
    require_once(__DIR__.'/../database/menu.class.php');
    require_once(__DIR__.'/../template/common.tpl.php');
    require_once(__DIR__.'/../template/menus.tpl.php');
    
    
    //$restaurant = $_GET['restaurantId'];
    global $db;

    $ar = Menu::getAllMenus($db);

    drawHeader(3);
    drawMenus($ar);
    drawFooter();

?>