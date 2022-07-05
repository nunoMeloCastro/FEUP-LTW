<?php
    //declare(strict_types = 1)
?>
<?php
    require_once(__DIR__.'/../database/connection.db.php');
    require_once(__DIR__.'/../database/restaurant.class.php');
    require_once(__DIR__.'/../template/common.tpl.php');
    require_once(__DIR__.'/../template/user.tpl.php');
    require_once(__DIR__.'/../database/user.class.php');
    require_once(__DIR__.'/../template/management.tpl.php');
    require_once(__DIR__.'/../pages/login.php');
    
    
    //$restaurant = $_GET['restaurantId'];
    //$db = getDatabaseConnection();
    global $db;
    global $session;
    if (User::isOwner($db, $session->getId())){
        $hasProds = 0;
        $hasMenus = 0;
        $ownedRests = Restaurant::getAllOwnedRestaurant($db, $session->getId());
        $numRest = sizeof($ownedRests);
        foreach ($ownedRests as $rest){
            if(sizeof(Restaurant::getRestaurantDishes($db, (int) $rest['id']))){
                $hasProds = 1;
            }
            if(sizeof(Restaurant::getRestaurantMenus($db, (int) $rest['id']))){
                $hasMenus = 1;
            }
        }
        drawHeader(5);
        drawOptions($numRest, $hasMenus, $hasProds);
        drawFooter();
    }
    else{
        echo "<div class='alert alert-danger'>Access Denied</div>";
    }
?>