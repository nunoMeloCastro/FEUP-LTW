<?php 
    //session_start();
    require_once(__DIR__.'/../database/connection.db.php');
    require_once(__DIR__.'/../database/user.class.php');
    require_once(__DIR__.'/../database/restaurant.class.php');
    require_once(__DIR__.'/../database/menu.class.php');
    require_once(__DIR__.'/../database/dish.class.php');
    require_once(__DIR__.'/../template/common.tpl.php');
    require_once(__DIR__.'/../pages/login.php');
    require_once(__DIR__.'/../utils/session.php');
    global $session;
    global $db;
    $dishes =$session->getCartDish();
    $menus = $session->getCartMenu();
    $dishitems = explode(",", $dishes);
    $menuitems = explode(",", $menus);
    $id = $session->getId();
    $query="INSERT INTO RestaurantOrder(customerID) VALUES('$id')";
    $conn->exec($query);

    $orderQuery = $db->prepare("SELECT MAX(id) as id From RestaurantOrder");
    $orderQuery->execute(array());
    $orderId = $orderQuery->fetch();
    $orderId = $orderId['id'];

    foreach ($dishitems as $key=>$dish) {
        $dishid = (int) $dish;
        $restaurantID = Dish::getDishRestaurant($db, $dishid);
        $query=$db->prepare("INSERT INTO DishOrder(dishID ,orderID, restaurantID) VALUES('$dishid', '$orderId','$restaurantID')");
        $query->execute(array());
    }
    foreach ($menuitems as $key=>$menu) { 
        $menuid = (int) $menu;
        $restaurantID = Menu::getRestaurantfromMenu($db, $menuid);
        $query=$db->prepare("INSERT INTO MenuOrder(menuID ,orderID, restaurantID) VALUES('$menuid', '$orderId','$restaurantID')");
        $query->execute(array());
    }
    
    $session->clearCartDish();
    $session->clearCartMenu();
    
    header('location: /../pages/homepage.php');

?>