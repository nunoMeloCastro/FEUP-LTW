<<<<<<< HEAD
<?php function drawEditRest(Restaurant $restaurant, array $categories)
{ ?>
    <div class="profile">
        <form method="post" action="../actions/action_update_restaurant.php?id=<?= $restaurant->id ?>">
            <div class="rowp">
                <div>
                    <img src=<?= $restaurant->photoPath ?> alt="Italian Trulli" class="responsive">
                    <h1>Restaurant: <?= $restaurant->name ?></h1>
                </div>
                <div class="colp">
                    <div>
                        <ul>
                            <h2><label for="fname">Name:</label><br></h2>
                        </ul>
                        <ul><input type="text" id="fname" name="name" value="<?= $restaurant->name ?>" </ul>
                    </div>
                    <div>
                        <ul>
                            <h2><label for="fname">Address:</label><br></h2>
                        </ul>
                        <ul><input type="text" id="fname" name="address" value="<?= $restaurant->address ?>"></ul>
                    </div>
                    <div>
                        <ul>
                            <h2><label for="fname">Phone:</label><br></h2>
                        </ul>
                        <ul><input type="text" id="fname" name="phone" value=<?= $restaurant->phone ?>></ul>
                    </div>
                    <div>
                        <ul>
                            <h2><label for="fname">Category:</label><br></h2>
                        </ul>
                        <ul>
                            <select name="category" id="categories">
                                <?php foreach ($categories as $category) { ?>
                                    <option id="fname" value=<?= $category['id'] ?>><?= $category['name'] ?></option>
                                <?php } ?>
                            </select>
                        </ul>
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Submit Changes" />
            </div>
        </form>
    </div>
<?php } ?>

<?php function drawEditMenu(Menu $menu, array $dishes)
{ ?>
    <div class="profile">
        <form method="post" action="../actions/action_update_menu.php?id=<?= $menu->id ?>">
            <div class="rowp">
                <div>
                    <img src=<?= $menu->photoPath ?> class="responsive">
                    <h1>Menu: <?= $menu->name ?></h1>
                </div>
                <div class="colp">
                    <div>
                        <ul>
                            <h2><label for="name">Name:</label><br></h2>
                        </ul>
                        <ul><input type="text" id="fname" name="name" value="<?= $menu->name ?>"></ul>
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Submit Changes" />
            </div>
        </form>
        <section id="restaurant">
            <h2> Products Included: </h2>
            <div class="restaurant-menu">
                <?php foreach ($dishes as $dish) { ?>
                    <div class="menu-item">
                        <img id="product-img" src=<?= $dish['photoPath'] ?> alt="Product Image" style="width: 100%;">
                        <h2 id="product-name"><?= $dish['name'] ?></h2>
                    </div>
                <?php } ?>
            </div>
        </section>

        <div>
            <a href="addDishMenu.php?id=<?= $menu->id ?>"><input type="submit" class="profile-edit-btn" name="btnAddMore" value="Add product to Menu" /></a>
        </div>
        <br>
        <div>
            <a href="delDishMenu.php?id=<?= $menu->id ?>"><input type="submit" class="profile-edit-btn" name="btnAddMore" value="Delete product from Menu" /></a>
        </div>
    </div>
    <h2>Products included:</h2>
    
<?php } ?>

<?php function drawEditDish(Dish $dish)
{ ?>
    <div class="profile">
        <form method="post" action="../actions/action_update_dish.php?id=<?= $dish->id ?>">
            <div class="rowp">
                <div>
                    <img src=<?= $dish->photoPath ?> alt="Italian Trulli" class="responsive">
                    <h1>Dish: <?= $dish->name ?></h1>
                </div>
                <div class="colp">
                    <div>
                        <ul>
                            <h2><label for="name">Name:</label><br></h2>
                        </ul>
                        <ul><input type="text" id="fname" name="name" value="<?= $dish->name ?>"></ul>
                    </div>
                    <div>
                        <ul>
                            <h2><label for="price">Price:</label><br></h2>
                        </ul>
                        <ul><input type="text" id="fname" name="price" value=<?= $dish->price ?>></ul>
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Submit Changes" />
            </div>
        </form>
    </div>
<?php } ?>

<?php function drawAddProd(Menu $menu, array $dishes)
{ ?>
    <div class="profile">
        <form method="post" action="../actions/action_add_dish_menu.php?menu=<?= $menu->id ?>">
            <div class="rowp">
                <div>
                    <h1>Menu: <?= $menu->name ?></h1>
                </div>
                <div class="colp">
                    <div>
                        <ul>
                            <h2><label for="fname">Add Dish to Menu:</label><br></h2>
                        </ul>
                        <ul>
                            <select name="dish" id="fname">
                                <?php foreach ($dishes as $dish) { ?>
                                    <option id="fname" name="dish" value=<?= $dish['id'] ?>><?= $dish['name'] ?></option>
                                <?php } ?>
                            </select>
                        </ul>
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Add Dish" />
            </div>
        </form>
    </div>
<?php } ?>

<?php function drawDelProd(Menu $menu, array $dishes)
{ ?>
    <div class="profile">
        <form method="post" action="../actions/action_del_dish_menu.php?menu= <?= $menu->id ?>">
            <div class="rowp">
                <div>
                    <h1>Menu: <?= $menu->name ?></h1>
                </div>
                <div class="colp">
                    <div>
                        <ul>
                            <h2><label for="fname">Delete dish from Menu:</label><br></h2>
                        </ul>
                        <ul>
                            <select name="dish" id="fname">
                                <?php foreach ($dishes as $dish) { ?>
                                    <option id="fname" name="dish" value=<?= $dish['id'] ?>><?= $dish['name'] ?></option>
                                <?php } ?>
                            </select>
                        </ul>
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Delete Dish" />
            </div>
        </form>
    </div>
=======
<?php function drawEditRest(Restaurant $restaurant, array $categories)
{ ?>
    <div class="profile">
        <form method="post" action="../actions/action_update_restaurant.php?id=<?= $restaurant->id ?>">
            <div class="rowp">
                <div>
                    <img src=<?= $restaurant->photoPath ?> alt="Italian Trulli" class="responsive">
                    <h1>Restaurant: <?= $restaurant->name ?></h1>
                </div>
                <div class="colp">
                    <div>
                        <ul>
                            <h2><label for="fname">Name:</label><br></h2>
                        </ul>
                        <ul><input type="text" id="fname" name="name" value="<?= $restaurant->name ?>" </ul>
                    </div>
                    <div>
                        <ul>
                            <h2><label for="fname">Address:</label><br></h2>
                        </ul>
                        <ul><input type="text" id="fname" name="address" value="<?= $restaurant->address ?>"></ul>
                    </div>
                    <div>
                        <ul>
                            <h2><label for="fname">Phone:</label><br></h2>
                        </ul>
                        <ul><input type="text" id="fname" name="phone" value=<?= $restaurant->phone ?>></ul>
                    </div>
                    <div>
                        <ul>
                            <h2><label for="fname">Category:</label><br></h2>
                        </ul>
                        <ul>
                            <select name="category" id="categories">
                                <?php foreach ($categories as $category) { ?>
                                    <option id="fname" value=<?= $category['id'] ?>><?= $category['name'] ?></option>
                                <?php } ?>
                            </select>
                        </ul>
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Submit Changes" />
            </div>
        </form>
    </div>
<?php } ?>

<?php function drawEditMenu(Menu $menu, array $dishes)
{ ?>
    <div class="profile">
        <form method="post" action="../actions/action_update_menu.php?id=<?= $menu->id ?>">
            <div class="rowp">
                <div>
                    <img src=<?= $menu->photoPath ?> class="responsive">
                    <h1>Menu: <?= $menu->name ?></h1>
                </div>
                <div class="colp">
                    <div>
                        <ul>
                            <h2><label for="name">Name:</label><br></h2>
                        </ul>
                        <ul><input type="text" id="fname" name="name" value="<?= $menu->name ?>"></ul>
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Submit Changes" />
            </div>
        </form>
        <section id="restaurant">
            <h2> Products Included: </h2>
            <div class="restaurant-menu">
                <?php foreach ($dishes as $dish) { ?>
                    <div class="menu-item">
                        <img id="product-img" src=<?= $dish['photoPath'] ?> alt="Product Image" style="width: 100%;">
                        <h2 id="product-name"><?= $dish['name'] ?></h2>
                    </div>
                <?php } ?>
            </div>
        </section>

        <div>
            <a href="addDishMenu.php?id=<?= $menu->id ?>"><input type="submit" class="profile-edit-btn" name="btnAddMore" value="Add product to Menu" /></a>
        </div>
        <br>
        <div>
            <a href="delDishMenu.php?id=<?= $menu->id ?>"><input type="submit" class="profile-edit-btn" name="btnAddMore" value="Delete product from Menu" /></a>
        </div>
    </div>
    <h2>Products included:</h2>
    
<?php } ?>

<?php function drawEditDish(Dish $dish)
{ ?>
    <div class="profile">
        <form method="post" action="../actions/action_update_dish.php?id=<?= $dish->id ?>">
            <div class="rowp">
                <div>
                    <img src=<?= $dish->photoPath ?> alt="Italian Trulli" class="responsive">
                    <h1>Dish: <?= $dish->name ?></h1>
                </div>
                <div class="colp">
                    <div>
                        <ul>
                            <h2><label for="name">Name:</label><br></h2>
                        </ul>
                        <ul><input type="text" id="fname" name="name" value="<?= $dish->name ?>"></ul>
                    </div>
                    <div>
                        <ul>
                            <h2><label for="price">Price:</label><br></h2>
                        </ul>
                        <ul><input type="text" id="fname" name="price" value=<?= $dish->price ?>></ul>
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Submit Changes" />
            </div>
        </form>
    </div>
<?php } ?>

<?php function drawAddProd(Menu $menu, array $dishes)
{ ?>
    <div class="profile">
        <form method="post" action="../actions/action_add_dish_menu.php?menu=<?= $menu->id ?>">
            <div class="rowp">
                <div>
                    <h1>Menu: <?= $menu->name ?></h1>
                </div>
                <div class="colp">
                    <div>
                        <ul>
                            <h2><label for="fname">Add Dish to Menu:</label><br></h2>
                        </ul>
                        <ul>
                            <select name="dish" id="fname">
                                <?php foreach ($dishes as $dish) { ?>
                                    <option id="fname" name="dish" value=<?= $dish['id'] ?>><?= $dish['name'] ?></option>
                                <?php } ?>
                            </select>
                        </ul>
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Add Dish" />
            </div>
        </form>
    </div>
<?php } ?>

<?php function drawDelProd(Menu $menu, array $dishes)
{ ?>
    <div class="profile">
        <form method="post" action="../actions/action_del_dish_menu.php?menu= <?= $menu->id ?>">
            <div class="rowp">
                <div>
                    <h1>Menu: <?= $menu->name ?></h1>
                </div>
                <div class="colp">
                    <div>
                        <ul>
                            <h2><label for="fname">Delete dish from Menu:</label><br></h2>
                        </ul>
                        <ul>
                            <select name="dish" id="fname">
                                <?php foreach ($dishes as $dish) { ?>
                                    <option id="fname" name="dish" value=<?= $dish['id'] ?>><?= $dish['name'] ?></option>
                                <?php } ?>
                            </select>
                        </ul>
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Delete Dish" />
            </div>
        </form>
    </div>
<?php } ?>

<?php function drawAddFav(User $user, array $rests)
{ ?>
    <div class="profile">
        <form method="post" action="../actions/action_add_fav_rest.php?menu=<?= $user->id ?>">
            <div class="rowp">
                
                <div class="colp">
                    <div>
                        <ul>
                            <h2><label for="fname">Add Restaurant to Favorites:</label><br></h2>
                        </ul>
                        <ul>
                            <select name="rest" id="fname">
                                <?php foreach ($rests as $rest) { ?>
                                    <option id="fname" name="rest" value=<?= $rest['id'] ?>><?= $rest['name'] ?></option>
                                <?php } ?>
                            </select>
                        </ul>
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Submit" />
            </div>
        </form>
    </div>
<?php } ?>

<?php function drawAddFavD(User $user, array $rests)
{ ?>
    <div class="profile">
        <form method="post" action="../actions/action_add_fav_dish.php?menu=<?= $user->id ?>">
            <div class="rowp">
                
                <div class="colp">
                    <div>
                        <ul>
                            <h2><label for="fname">Add Dish to Favorites:</label><br></h2>
                        </ul>
                        <ul>
                            <select name="dish" id="fname">
                                <?php foreach ($rests as $rest) { ?>
                                    <option id="fname" name="dish" value=<?= $rest['id'] ?>><?= $rest['name'] ?></option>
                                <?php } ?>
                            </select>
                        </ul>
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Submit" />
            </div>
        </form>
    </div>
<?php } ?>

<?php function drawDelFav(User $user, array $rests)
{ ?>
    <div class="profile">
        <form method="post" action="../actions/action_del_fav_rest.php?menu=<?= $user->id ?>">
            <div class="rowp">
               
                <div class="colp">
                    <div>
                        <ul>
                            <h2><label for="fname">Delete Restaurant from Favorites:</label><br></h2>
                        </ul>
                        <ul>
                            <select name="rest" id="fname">
                                <?php foreach ($rests as $rest) { ?>
                                    <option id="fname" name="rest" value=<?= $rest['id'] ?>><?= $rest['name'] ?></option>
                                <?php } ?>
                            </select>
                        </ul>
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Submit" />
            </div>
        </form>
    </div>
<<<<<<< HEAD
<?php } ?>

<?php function drawDelFavD(User $user, array $rests)
{ ?>
    <div class="profile">
        <form method="post" action="../actions/action_del_fav_dish.php?menu=<?= $user->id ?>">
            <div class="rowp">
               
                <div class="colp">
                    <div>
                        <ul>
                            <h2><label for="fname">Delete Dish from Favorites:</label><br></h2>
                        </ul>
                        <ul>
                            <select name="dish" id="fname">
                                <?php foreach ($rests as $rest) { ?>
                                    <option id="fname" name="dish" value=<?= $rest['id'] ?>><?= $rest['name'] ?></option>
                                <?php } ?>
                            </select>
                        </ul>
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Submit" />
            </div>
        </form>
    </div>
=======
>>>>>>> a925312ee956b3ca61b5d51a2818856380683364
>>>>>>> 419544f82e698eeba67624d9af1aa65fd7380c51
<?php } ?>