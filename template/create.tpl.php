<?php function drawCreateRest(array $categories)
{ ?>
    <div class="profile">
        <form method="post" action="../actions/action_create_restaurant.php">
            <div class="rowp">
                <div>
                    <h1>New Restaurant</h1>
                </div>
                <div class="colp">
                    <div>
                        <ul>
                            <h2><label for="fname">Name:</label><br></h2>
                        </ul>
                        <ul><input type="text" id="fname" name="name" value=""></ul>
                    </div>
                    <div>
                        <ul>
                            <h2><label for="fname">Address:</label><br></h2>
                        </ul>
                        <ul><input type="text" id="fname" name="address" value=""></ul>
                    </div>
                    <div>
                        <ul>
                            <h2><label for="fname">Phone:</label><br></h2>
                        </ul>
                        <ul><input type="text" id="fname" name="phone" value=""></ul>
                    </div>
                    <div>
                        <ul>
                            <h2><label for="fname">Category:</label><br></h2>
                        </ul>
                        <ul>
                            <select name="categories" id="categories">
                                <?php foreach ($categories as $category) { ?>
                                    <option id="fname" name="category" value=<?= $category['id'] ?>><?= $category['name'] ?></option>
                                <?php } ?>
                            </select>
                        </ul>
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Create Restaurant" />
            </div>
        </form>
    </div>
<?php } ?>

<?php function drawCreateMenu(int $id)
{ ?>
    <div class="profile">
        <form method="post" action="../actions/action_create_menu.php?id=<?= $id ?>">
            <div class="rowp">
                <div>
                    <h1>New Menu</h1>
                </div>
                <div class="colp">
                    <div>
                        <ul>
                            <h2><label for="fname">Name:</label><br></h2>
                        </ul>
                        <ul><input type="text" id="fname" name="name" value=""></ul>
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Create Menu" />
            </div>
        </form>
    </div>
<?php } ?>

<?php function drawCreateDish(int $id)
{ ?>
    <div class="profile">
        <form method="post" action="../actions/action_create_dish.php?id=<?= $id ?>">
            <div class="rowp">
                <div>
                    <h1>New Dish</h1>
                </div>
                <div class="colp">
                    <div>
                        <ul>
                            <h2><label for="fname">Name:</label><br></h2>
                        </ul>
                        <ul><input type="text" id="fname" name="name" value=""></ul>
                    </div>
                    <div>
                        <ul>
                            <h2><label for="fname">Price:</label><br></h2>
                        </ul>
                        <ul><input type="text" id="fname" name="price" value=""></ul>
                    </div>
                </div>
            </div>
            <div>
                <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Create Dish" />
            </div>
        </form>
    </div>
<?php } ?>