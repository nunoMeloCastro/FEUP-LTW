<?php function drawMenus(array $menus)
{ ?>
    <section id="menu">
        <h1>Menus</h1>
            <div class="restaurant-menu">
             <?php foreach ($menus as $menu) { ?>
                <div class="menu-item">
                    <img id="product-img" src="/../<?= $menu['photoPath'] ?>" alt="Category Image" width="300vh">
                    <h2 id="product-name"><?= $menu['name'] ?></h2>
                    <a href=menu.php?id=<?=$menu['id']?>>  <button>View</button>  </a>
                </div>
            <?php } ?>
            </div>
    </section>
<?php } ?>

<?php function drawEditMenus(array $menus)
{ ?>
    <section id="menu">
        <h1>Select Menu to edit:</h1>
            <div class="restaurant-menu">
             <?php foreach ($menus as $menu) { ?>
                <div class="menu-item">
                    <img id="product-img" src="/../<?= $menu['photoPath'] ?>" alt="Category Image" width="300vh">
                    <h2 id="product-name"><?= $menu['name'] ?></h2>
                    <a href=editMenu.php?id=<?=$menu['id']?>>  <button>Select</button>  </a>
                </div>
            <?php } ?>
            </div>
    </section>
<?php } ?>

<?php function drawDeleteMenus(array $menus)
{ ?>
    <section id="menu">
        <h1>Select Menu to delete:</h1>
            <div class="restaurant-menu">
             <?php foreach ($menus as $menu) { ?>
                <div class="menu-item">
                    <img id="product-img" src="/../<?= $menu['photoPath'] ?>" alt="Category Image" width="300vh">
                    <h2 id="product-name"><?= $menu['name'] ?></h2>
                    <a href=../actions/action_delete_menu.php?id=<?=$menu['id']?>>  <button>Select</button>  </a>
                </div>
            <?php } ?>
            </div>
    </section>
<?php } ?>
