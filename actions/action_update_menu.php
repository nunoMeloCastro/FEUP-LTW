<?php
    require_once(__DIR__.'/../database/connection.db.php');
    require_once(__DIR__.'/../database/user.class.php');
    require_once(__DIR__.'/../database/menu.class.php');
    require_once(__DIR__.'/../database/restaurant.class.php');
    require_once(__DIR__.'/../pages/login.php');
    
    global $db;
    global $session;
    //var_dump($_POST);
    $name = $_POST['name'];
    echo "NAME".$name . PHP_EOL;
    $id = (int) $_GET['id'];

    $ar = Menu::getMenu($db, $id);
    if ($session->getId() == Restaurant::getRestaurant($db, $ar->restaurantID)->ownerID){
        if($name !== null && $id !== null){
            $query="UPDATE 'Menu' SET name = '$name' WHERE id = '$id'";
            $conn->exec($query); 
            header('location: /../pages/editMenu.php?id='.$id);
        }
        else{
            echo "<div class='alert alert-danger'>Please fill in all fields</div>";
        }
    }
    else{
        echo "<div class='alert alert-danger'>Operation Denied</div>";
    }
?>