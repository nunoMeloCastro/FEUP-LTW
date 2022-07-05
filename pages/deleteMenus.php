<?php
    declare(strict_types = 1);
    require_once(__DIR__.'/../database/connection.db.php');
    require_once(__DIR__.'/../database/menu.class.php');
    require_once(__DIR__.'/../template/common.tpl.php');
    require_once(__DIR__.'/../template/menus.tpl.php');
    require_once(__DIR__.'/../database/user.class.php');
    require_once(__DIR__.'/../pages/login.php');
    
    
    //$restaurant = $_GET['restaurantId'];
    global $db;

    $rest = (int) $_GET['id'];

    $ar = Menu::getRestaurantMenus($db, $rest);
    global $session;
    if ($session->getId() == User::getRestaurantOwner($db, $rest)->id){
        drawHeader(5);
        drawDeleteMenus($ar);
        drawFooter();
    }
    else{
        echo "<div class='alert alert-danger'>Access Denied</div>";
    }

?>