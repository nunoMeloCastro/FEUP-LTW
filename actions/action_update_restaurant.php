<?php
    require_once(__DIR__.'/../database/connection.db.php');
    require_once(__DIR__.'/../database/user.class.php');
    require_once(__DIR__.'/../database/restaurant.class.php');
    require_once(__DIR__.'/../pages/login.php');
    
    global $db;
    global $session;
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $category= $_POST['category'];
    $id = $_GET['id'];
    echo $name . PHP_EOL;
    echo $address. PHP_EOL ;
    echo $phone. PHP_EOL ;
    echo "Category".$category. PHP_EOL ;
    echo "ID".$id. PHP_EOL ;


    $ar = Restaurant::getRestaurant($db, $id);
    if ($session->getId() == $ar->ownerID){
        if($name !== null && $address !== null && $phone !== null && $category !== null){
            $query="UPDATE 'Restaurant' SET name = '$name', address = '$address', phone = '$phone', categoryID = '$category' WHERE id = '$id'";
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