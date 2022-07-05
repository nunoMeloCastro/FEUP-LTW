<?php
//session_start();
require_once(__DIR__ . '/../database/connection.db.php');
require_once(__DIR__ . '/../database/user.class.php');
require_once(__DIR__ . '/../database/restaurant.class.php');
require_once(__DIR__ . '/../database/menu.class.php');
require_once(__DIR__ . '/../database/dish.class.php');
require_once(__DIR__ . '/../template/common.tpl.php');
require_once(__DIR__ . '/../pages/login.php');
require_once(__DIR__ . '/../utils/session.php');
global $session;
global $db;
$dishes = $session->getCartDish();
$menus = $session->getCartMenu();
$dishitems = explode(",", $dishes);
$menuitems = explode(",", $menus);
drawHeader(1);
?>
<section id="restaurant">
    <h2>Ordered Dishes:</h2>
    <div class="restaurant-menu">
        <?php if (sizeof($dishitems) > 1) { ?>
            <?php foreach ($dishitems as $key => $dish) { ?>
                <?php $dish = Dish::getDish($db, (int) $dish); ?>

                <div class="menu-item">
                    <img id="product-img" src=<?= $dish->photoPath ?> alt="Category Image" width="100%" height="200px">
                    <h2 id="product-name"><?= $dish->name ?></h2>
                </div>
            <?php } ?>
        <?php } ?>
        <!--<p><button>View All</button></p>-->
    </div>
    <h2>Ordered Menus:</h2>
    <div class="restaurant-menu">
        <?php if (sizeof($menuitems) > 1) { ?>
            <?php foreach ($menuitems as $key => $menu) { ?>
                <?php $menu = Menu::getMenu($db, (int) $menu); ?>

                <div class="menu-item">
                    <img id="product-img" src=<?= $menu->photoPath ?> alt="Category Image" width="100%" height="200px">
                    <h2 id="product-name"><?= $menu->name ?></h2>
                </div>
            <?php } ?>
        <?php } ?>
        <!--<p><button>View All</button></p>-->
    </div>
    <a href="../actions/action_checkout.php">
        <button style="margin-bottom: 30px;"id="checkout-button">Checkout</button>
    </a>

</section>
<?php drawFooter(); ?>