<?php
    require_once(__DIR__.'/../database/connection.db.php');
    require_once(__DIR__.'/../database/user.class.php');
    require_once(__DIR__.'/../database/restaurant.class.php');
    require_once(__DIR__.'/../database/menu.class.php');
    require_once(__DIR__.'/../database/dish.class.php');
    require_once(__DIR__.'/../pages/login.php');
    require_once(__DIR__.'/../utils/session.php');
    
    global $db;
    global $session;

    session_start();
 
	if($session->getMenu() !== null){
        echo "Menu".$session->getMenu();
		if($session->getCartMenu()!== null){
 
			$items = $session->getCartMenu();
			$cartitems = explode(",", $items);
			if(in_array($session->getMenu(), $cartitems)){
				//header('location: index.php?status=incart');
			}
            else{
				$items .= "," . $session->getMenu();
				$session->setCartMenu($items);
				//header('location: index.php?status=success');
				
			}
 
		}
        else{
			$items = $session->getMenu();
			$session->setCartMenu($items);
			//header('location: index.php?status=success');
		}
		
	}
    elseif($session->getDish() !== null){
        echo $session->getDish();
        if($session->getCartDish()!== null){
                         
                $items = $session->getCartDish();
                $cartitems = explode(",", $items);
                if(in_array($session->getDish(), $cartitems)){
                    //header('location: index.php?status=incart');
                }
                else{
                    $items .= "," . $session->getDish();
                    $session->setCartDish($items);
                    //header('location: index.php?status=success');
                    
                }
     
            }
            else{
                $items = $session->getDish();
                $session->setCartDish($items);
                //header('location: index.php?status=success');
            }       
    }
    header('location: /../pages/cart.php');
        
?>