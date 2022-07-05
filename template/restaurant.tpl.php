<?php function drawRestInfo(Restaurant $restaurant, User $owner) { ?>
    <section id="restaurant">
        <h1><?=$restaurant->name?></h1>
            <div class="restaurant-info">
                <ul>
                    <li id="restaurant-location">
                        <h3>Location: <?=$restaurant->address?></h3>
                    </li>
                    <li id="restaurant-owner">
                        <h3>Owner: <?=$owner->name?></h3>
                    </li>
                    <li id="restaurant-rating">
                        <h3>Rating: </h3>
                    </li>
                </ul>
            </div>
    </section>
<?php } ?>

<?php function drawRestMenus(array $menus) { ?>
    <section id="restaurant">
        <h2>Menus:</h2>
            <div class="restaurant-menu">
                <?php foreach ($menus as $menu) { ?>
                        <div class="menu-item">
                            <img id="product-img" src=<?= $menu['photoPath']?> alt="Category Image" width="100%" height="200px">
                            <h2 id="product-name"><?= $menu['name'] ?></h2>
                            <button><a href="../actions/action_add_to_cart.php?menu=<?= $menu['id'] ?>"> Add to Cart </a></button>
                        </div>
                <?php } ?>
            <!--<p><button>View All</button></p>-->
           </div>
    </section>
<?php } ?>

<?php function drawRestDishes(array $dishes) { ?>
    <section id="restaurant"> 
    <h2>Products:</h2>
        <div class="restaurant-menu">
            <?php foreach ($dishes as $dish) { ?>
                        <div class="menu-item">
                            <img id="product-img" src=<?= $dish['photoPath']?> alt="Category Image" width="100%" height="200px">
                            <h2 id="product-name"><?= $dish['name'] ?></h2>
                            <button><a href="../actions/action_add_to_cart.php?dish=<?= $dish['id']?>"> Add to Cart </a></button>
                        </div>
            <?php } ?>
        
        </div>
    </section>
<?php } ?>

<?php function drawEditDishes(array $dishes) { ?>
    <section id="restaurant"> 
    <h2>Select Dish to edit:</h2>
        <div class="restaurant-menu">
            <?php foreach ($dishes as $dish) { ?>
                <div class="menu-item">
                    <img id="product-img" src=<?=$dish['photoPath']?> alt="Category Image" width="300vh">
                    <h2 id="product-name"><?=$dish['name']?></h2>
                    <p id="product-price"><?=$dish['price']?></p>
                    <a href=editDish.php?id=<?=$dish['id']?>>  <button>Select</button>  </a>
                </div>
            <?php } ?>
        
        </div>
    </section>
<?php } ?>

<?php function drawDeleteDishes(array $dishes) { ?>
    <section id="restaurant"> 
    <h2>Select Dish to delete:</h2>
        <div class="restaurant-menu">
            <?php foreach ($dishes as $dish) { ?>
                <div class="menu-item">
                    <img id="product-img" src=<?=$dish['photoPath']?> alt="Category Image" width="300vh">
                    <h2 id="product-name"><?=$dish['name']?></h2>
                    <p id="product-price"><?=$dish['price']?></p>
                    <a href=../actions/action_delete_dish.php?id=<?=$dish['id']?>>  <button>Select</button> </a>
                </div>
            <?php } ?>
        
        </div>
    </section>
<?php } ?>