<?php function drawMenu(Restaurant $restaurant, Menu $menu, array $dishes)
{ ?>

    <section id="restaurant">
        <h1><?= $menu->name ?></h1>

        <div class="restaurant-info">
            <ul>
                <li id="restaurant-name">
                    <h3>Restaurant: <?= $restaurant->name ?></h3>
                </li>
                <li id="restaurant-location">
                    <h3>Location: <?= $restaurant->address ?></h3>
                </li>
            </ul>
        </div>

        <h2>Products included:</h2>

        <div class="restaurant-menu">
            <?php foreach ($dishes as $dish) { ?>
                <div class="menu-item">
                    <img id="product-img" src=<?= $dish['photoPath'] ?> alt="Product Image" style="width: 100%;">
                    <h2 id="product-name"><?= $dish['name'] ?></h2>
                    <p id="product-price"><?= $dish['price'] ?></p>
                    <p><button>Add to Cart<img src="https://img.icons8.com/material-rounded/24/000000/shopping-basket-add.png" /></button></p>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>