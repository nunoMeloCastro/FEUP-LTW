<?php function drawSlideShow(array $restaurants)
{ ?>
    <!-- Features gallery container -->
    <div class="container">

        <!-- Full-width images with number text -->
        <?php for ($x = 0; $x <= 3 ; $x++) { ?>
            <div class="mySlides">
                <div class="numbertext"> <?= $x ?> / <?=4 ?></div>
                <a href=restaurant.php?id=<?=$restaurants[$x]['id']?>> <img src=<?= $restaurants[$x]["photoPath"] ?> height="500px"></a>
            </div>
        <?php } ?>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <!-- Image text -->
        <div class="caption-container">
            <p id="caption"></p>
        </div>

        <!-- Thumbnail images -->
        <div class="row">
            <?php for ($x = 0; $x <= 3; $x++) { ?>
                <div class="column">
                    <img class="demo cursor" src=<?= $restaurants[$x]["photoPath"] ?> width="100%" height="300px" onclick='currentSlide(<?= $x ?>)' alt=<?= $restaurants[$x]["name"] ?>>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>