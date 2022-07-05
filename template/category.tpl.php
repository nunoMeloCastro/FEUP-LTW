<?php function drawCatDishes(Category $category, array $dishes) { ?>
    <section id="restaurant">
        <h1><?=$category->name?></h1>
        <div class="restaurant-menu">
            <?php foreach ($dishes as $dish) { ?>
                <div class="menu-item">
                    <img id="product-img" src=<?=$dish['photoPath']?> alt="Product Image" style="width: 100%;">
                    <h2 id="product-name"><?=$dish['name']?></h2>
                    <p id="product-price"><?=$dish['price']?></p>
                    <p><button>Add to Cart<img src="https://img.icons8.com/material-rounded/24/000000/shopping-basket-add.png" /></button></p>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>