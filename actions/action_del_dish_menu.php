<?php
    require_once(__DIR__.'/../database/connection.db.php');
    require_once(__DIR__.'/../database/user.class.php');
    require_once(__DIR__.'/../database/menu.class.php');
    require_once(__DIR__.'/../database/restaurant.class.php');
    require_once(__DIR__.'/../pages/login.php');
    
    global $db;
    global $session;
    $idMenu = $_GET['menu'];
    $idDish = $_POST['dish'];

    $ar = Menu::getMenu($db, $idMenu);
    if ($session->getId() == Restaurant::getRestaurant($db, $ar->restaurantID)->ownerID){
        if($idMenu !== null && $idDish !== null){
            $query="DELETE FROM MenuDish WHERE (idMenu = '$idMenu' AND idDish = '$idDish')";
            $conn->exec($query); 
            header('location: /../pages/management.php');
        }
        else{
            echo "<div class='alert alert-danger'>Please fill in all fields</div>";
        }
    }
    else{
        echo "<div class='alert alert-danger'>Operation Denied</div>";
    }
        
?>