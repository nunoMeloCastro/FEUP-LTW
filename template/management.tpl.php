<?php function drawOptions(int $numRest, int $hasMenus, int $hasProds)
{ ?>
    <section id="menu">
        <h1>Management</h1>
            <div class="restaurant-menu">
                <div class="menu-item">
                    <h2 id="product-name">Restaurants</h2>
                    <a href=createRestaurant.php>  <button>Create</button>  </a>
                    <br>
                    <?php if($numRest > 0) { ?>
                    <a href=selectRestaurants.php?en=0&op=1>  <button>Update</button>  </a>
                    <br>
                    <a href=selectRestaurants.php?en=0&op=2>  <button>Delete</button>  </a>
                    <?php } ?>
                </div>
                <?php if($numRest > 0) { ?>
                <div class="menu-item">
                    <h2 id="product-name">Menus</h2>
                    <a href=selectRestaurants.php?en=1&op=0>  <button>Create</button>  </a>
                    <br>
                    <?php if($hasMenus > 0) { ?>
                    <a href=selectRestaurants.php?en=1&op=1>  <button>Update</button>  </a>
                    <br>
                    <a href=selectRestaurants.php?en=1&op=2>  <button>Delete</button>  </a>
                    <?php } ?>
                </div>
                <div class="menu-item">
                    <h2 id="product-name">Dishes</h2>
                    <a href=selectRestaurants.php?en=2&op=0>  <button>Create</button>  </a>
                    <br>
                    <?php if($hasProds > 0) { ?>
                    <a href=selectRestaurants.php?en=2&op=1>  <button>Update</button>  </a>
                    <br>
                    <a href=selectRestaurants.php?en=2&op=2>  <button>Delete</button>  </a>
                    <?php } ?>
                </div>
                <?php }?>
            </div>
    </section>
<?php }?>