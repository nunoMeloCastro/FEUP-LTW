<?php function drawRestaurants(array $restaurants)
{ ?>
    <section id="restaurant">
        <h1>Restaurants</h1>
        <div class="restaurant-menu">
            <?php foreach ($restaurants as $restaurant) { ?>
                <div class="menu-item">
                    <img id="product-img" src=<?= $restaurant['photoPath'] ?> alt="Category Image">
                    <div class="restaurants-text-items" style="display: flex; flex-direction:column; padding-bottom: 1vw;">
                        <h2 id="product-name" style="margin-bottom: 0px;"><?= $restaurant['name'] ?></h2>
                        <p id="product-price"><?= $restaurant['address'] ?></p>
                        <a href=restaurant.php?id=<?= $restaurant['id'] ?>> <button>View</button> </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>

<?php function drawFavRestaurants(int $id, array $restaurants)
{ ?>
    <section id="restaurant">
        <h1>Favorite Restaurants</h1>
        <div class="restaurant-menu">
            <?php foreach ($restaurants as $restaurant) { ?>
                <div class="menu-item">
                    <img id="product-img" src=<?= $restaurant['photoPath'] ?> alt="Category Image">
                    <div class="restaurants-text-items" style="display: flex; flex-direction:column; padding-bottom: 1vw;">
                        <h2 id="product-name" style="margin-bottom: 0px;"><?= $restaurant['name'] ?></h2>
                        <p id="product-price"><?= $restaurant['address'] ?></p>
                        <a href=restaurant.php?id=<?= $restaurant['id'] ?>> <button>View</button> </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <div>
        <a href="addFavRest.php?id= <?= $id?>"><input type="submit" class="profile-edit-btn" name="btnAddMore" value="Add restaurant to Favorites" /></a>
    </div>
    <br>
    <div>
        <a href="delFavRest.php?id= <?= $id?>"><input type="submit" class="profile-edit-btn" name="btnAddMore" value="Delete restaurant from Favorites" /></a>
    </div>
<?php } ?>

<?php function drawFavDishes(int $id, array $dishes)
{ ?>
    <section id="restaurant">
        <h1>Favorite Dishes</h1>
        <div class="restaurant-menu">
            <?php foreach ($dishes as $dish) { ?>
                <div class="menu-item">
                    <img id="product-img" src=<?= $dish['photoPath'] ?> alt="Category Image">
                    <div class="restaurants-text-items" style="display: flex; flex-direction:column; padding-bottom: 1vw;">
                        <h2 id="product-name" style="margin-bottom: 0px;"><?= $dish['name'] ?></h2>
                        <p id="product-price"><?= $dish['price'] ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <div>
        <a href="addFavDish.php?id= <?= $id?>"><input type="submit" class="profile-edit-btn" name="btnAddMore" value="Add dish to Favorites" /></a>
    </div>
    <br>
    <div>
        <a href="delFavDish.php?id= <?= $id?>"><input type="submit" class="profile-edit-btn" name="btnAddMore" value="Delete dish from Favorites" /></a>
    </div>
<?php } ?>

<?php function drawSelectRestaurants(array $restaurants, int $en, int $op)
{ ?>
    <section id="restaurant">
        <h1>Select Restaurant:</h1>
        <div class="restaurant-menu">
            <?php foreach ($restaurants as $restaurant) { ?>
                <div class="menu-item">
                    <img id="product-img" src=<?= $restaurant['photoPath'] ?> alt="Category Image"">
                    <div class = " restaurants-text-items" style="display: flex; flex-direction:column;">
                    <h2 id="product-name"><?= $restaurant['name'] ?></h2>
                    <p id="product-price"><?= $restaurant['address'] ?></p>
                    <?php if ($en == 0) { ?>
                        <?php if ($op == 1) { ?>
                            <a href=editRestaurant.php?id=<?= $restaurant['id'] ?>> <button>Select</button> </a>
                        <?php } elseif ($op == 2) { ?>
                            <a href=../actions/action_delete_restaurant.php?id=<?= $restaurant['id'] ?>> <button>Select</button> </a>
                        <?php }
                    } elseif ($en == 1) { ?>
                        <?php if ($op == 0) { ?>
                            <a href=createMenu.php?id=<?= $restaurant['id'] ?>> <button>Select</button> </a>
                        <?php } elseif ($op == 1) { ?>
                            <a href=editMenus.php?id=<?= $restaurant['id'] ?>> <button>Select</button> </a>
                        <?php } elseif ($op == 2) { ?>
                            <a href=deleteMenus.php?id=<?= $restaurant['id'] ?>> <button>Select</button> </a>
                        <?php }
                    } elseif ($en == 2) { ?>
                        <?php if ($op == 0) { ?>
                            <a href=createDish.php?id=<?= $restaurant['id'] ?>> <button>Select</button> </a>
                        <?php } elseif ($op == 1) { ?>
                            <a href=editDishes.php?id=<?= $restaurant['id'] ?>> <button>Select</button> </a>
                        <?php } elseif ($op == 2) { ?>
                            <a href=deleteDishes.php?id=<?= $restaurant['id'] ?>> <button>Select</button> </a>
                    <?php }
                    } ?>
                </div>
        </div>
    <?php } ?>
    </div>
    </section>
<?php } ?>
