
<?php 

require_once(__DIR__.'/../pages/login.php');

global $session;

function drawHeader(int $op) { ?>

    <?php require_once(__DIR__.'/../pages/login.php');

    global $session;
    ?>

    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <title>Home Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/layout.css" rel="stylesheet">
        <link href="../css/responsive.css" rel="stylesheet">
        <script src="../javascript/script.js" defer></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <div class="header">
            <a href="homepage.php" class="logo">FEUPeats</a>
            <div class="search-container">
                <form action="/action_page.php">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit" data-inline="true"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="header-right">
                <a class="active" href="homepage.php">Home</a>
                <?php if ($session->isLoggedIn()) { ?>
                    <a href="user.php">My Page</a>
                    <a href="logout.php">Log Out</a>
                <?php } else { ?> 
                    <a href="register.login.php">Log In \ Register</a>
                <?php } ?>
                <?php if ($session->isLoggedIn()) { ?>
                    <a href="cart.php"><img src="https://img.icons8.com/material-rounded/24/000000/shopping-basket-add.png" /></a>
                <?php } ?>
            </div>
        </div>

        <?php drawNavMenu($op) ?>
<?php } ?>

<?php function drawFooter() { ?>
        <footer>
                <div class="contain">
                    <div class="col">
                        <a id=checkout-button href="user.php"><h3>Profile Page</h3></a>
                    </div>
                    <div class="col">
                        <a id=checkout-button href="restaurants.php"><h3>Restaurants</h3></a>
                    </div>
                    <div class="col">
                        <a id=checkout-button><h3>Shopping Cart</h3></a>
                    </div>
                </div>
        </footer>
        </body>
    </html>
<?php } ?>

<?php function drawLoginForm() { ?>
  <form action="../actions/action_login.php" method="post" class="login">
    <input type="email" name="email" placeholder="email">
    <input type="password" name="password" placeholder="password">
    <a href="../pages/register.php">Register</a>
    <button type="submit">Login</button>
  </form>
<?php } ?>

<?php function drawLogoutForm(Session $session) { ?>
  <form action="../actions/action_logout.php" method="post" class="logout">
    <a href="../pages/profile.php"><?=$session->getName()?></a>
    <button type="submit">Logout</button>
  </form>
<?php } ?>

<?php function drawNavMenu(int $op) { ?>
    <div class="topnav">
    <?php if ($op == 0) {?>
            <a class="active" href="homepage.php">Featured</a>
            <a href="restaurants.php">Restaurants</a>
            <a href="categories.php">Categories</a>
            <a href="menus.php">Menus</a>
    <?php } elseif ($op == 1) {?>
            <a href="homepage.php">Featured</a>
            <a class="active" href="restaurants.php">Restaurants</a>
            <a href="categories.php">Categories</a>
            <a href="menus.php">Menus</a>
    <?php } elseif ($op == 2) {?>
            <a href="homepage.php">Featured</a>
            <a href="restaurants.php">Restaurants</a>
            <a class="active" href="categories.php">Categories</a>
            <a href="menus.php">Menus</a>
    <?php } elseif ($op == 3) {?>
            <a href="homepage.php">Featured</a>
            <a href="restaurants.php">Restaurants</a>
            <a href="categories.php">Categories</a>
            <a class="active" href="menus.php">Menus</a>
    <?php } else {?>
            <a href="homepage.php">Featured</a>
            <a href="restaurants.php">Restaurants</a>
            <a href="categories.php">Categories</a>
            <a href="menus.php">Menus</a>
    <?php } ?>
    </div> 
<?php } ?>