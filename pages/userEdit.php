<?php
    //declare(strict_types = 1)
?>
<?php
    session_start();
    if(!ISSET($_SESSION['id'])){
        echo "HERE";
        header('location: ../pages/register.login.php');
        echo "HERE";
    }
    require_once(__DIR__.'/../database/connection.db.php');
    require_once(__DIR__.'/../database/restaurant.class.php');
    require_once(__DIR__.'/../database/user.class.php');
    require_once(__DIR__.'/../template/common.tpl.php');
    require_once(__DIR__.'/../template/user.tpl.php');
    
    
    //$restaurant = $_GET['restaurantId'];
    global $db;
    global $session;

    $id = $_SESSION['id'];
    $isOwner = User::isOwner($db, $id);
    $ar = User::getUser($db, $id);

    if($session->getId() == $id){
        drawHeader(5);
        drawEditCard($ar, $isOwner);
        drawFooter();
    }
    else{
        echo "<div class='alert alert-danger'>Access Denied</div>";
    }
?>