<?php

use App\Helpers\FlashMessage;
use App\Helpers\ViewHelper;

ViewHelper::loadHeader($data['title']);
$products  = $data['products'];
// dd($products);
?>
<br>
<br>


<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="4000">
            <img src="<?= APP_BASE_URL ?>/public/uploads/images/upload_6939f7d22df31.jpg" class="d-block w-100" alt="" style="height: 50vh; width: 100vw;">
        </div>
        <div class="carousel-item" data-bs-interval="4000">
            <img src="<?= APP_BASE_URL ?>/public/uploads/images/upload_692b130b7f73d.png" class="d-block w-100" alt="" style="height: 50vh;">
        </div>
        <div class="carousel-item" data-bs-interval="4000">
            <img src="<?= APP_BASE_URL ?>/public/uploads/images/upload_692b132202618.png" class="d-block w-100" alt="" style="height: 50vh;">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<table class="table table-striped">
    <thead>
        <tr>
            <th>Product</th>
            <th>Name</th>
            <th>Description</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <!-- //TODO: Build the table body dynamically! -->
        <?php
        foreach ($products as $key => $product) {
        ?>


            <tr>
                <!-- <td>< //$product["image"] ?></td> -->

                <td><?= $product["quantity"] ?></td>
                <td><?= $product["name"] ?></td>
                <td><?= $product["description"] ?></td>
                <td><?= $product["price"] ?>$</td>
                <td><a class="btn btn-primary " href="details.php?id=<?= $product["id"] ?>">View</a>
                    <button class="btn btn-success " onclick="confirmDeleteShop(<?= $product['id'] ?>)">Add to Cart</button>
                </td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>






<?= FlashMessage::render() ?>

<?php
ViewHelper::loadJsScripts();
ViewHelper::loadFooter();
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var myCarousel = document.querySelector('#carouselExampleIndicators');
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 4000, // 4 seconds per slide
            ride: 'carousel'
        });
    });
</script>
