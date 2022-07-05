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
    $category= $_POST['categories'];
    //$id = Restaurant::getRestID($db, $name);
    $owner = $session->getId();
    
    if (User::isOwner($db, $session->getId())){
        if($name !== null && $address !== null && $phone !== null && $owner !== null && $category !== null){
            $query="INSERT INTO Restaurant(name,address,categoryID,ownerID,phone) VALUES('$name', '$address', '$category', '$owner', '$phone')";
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