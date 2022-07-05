<?php function drawCategories(array $categories)
{ ?>
    <section id="restaurant">
        <h1>Categories</h1>
            <div class="restaurant-menu">
                <?php foreach ($categories as $category) { ?>
                    <div class="menu-item">
                        <img id="product-img" src=<?= $category['photoPath'] ?> alt="Category Image" style="width: 100%;">
                        <h2 id="product-name"><?= $category['name'] ?></h2>
                        <a href=category.php?id=<?=$category['id']?>>  <button>View</button>  </a>
                    </div>
                <?php } ?>
            </div>
    </section>
<?php } ?>