<?php
use App\Helpers\FlashMessage;
use App\Helpers\ViewHelper;


ViewHelper::loadHeader($data['title']);

//dd($data);
?>



<br>
<br>

<!--Bootstrap carousel -->
<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">


        <?php foreach ($data['products'] as $product): ?>

            <?php if ($product['product_id'] == 1 ){?>
                <div class="carousel-item active " data-bs-interval="4000">
            <?php }else {?>
                <div class="carousel-item " data-bs-interval="4000">
            <?php } ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img
                        src="<?= hs("../".$product['path'] ?? '/images/placeholder.jpg') ?>"
                        class="card-img-top"
                        alt="<?= hs($product['name']."") ?>"
                        style="height: 200px; object-fit: cover;"
                    >
                    <div class="card-body">
                        <h5 class="card-title"><?= hs($product['name']."") ?></h5>
                        <p class="card-text"><?= hs(substr($product['description'], 0, 100)) ?>...</p>
                        <p class="fw-bold text-success">$<?= hs(number_format($product['price'], 2)) ?></p>
                        <span class="badge bg-secondary"><?= hs($product['category_name'] ?? 'Uncategorized') ?></span>
                    </div>
                    <div class="card-footer">
                        <a href="/products/<?= hs($product['product_id']."") ?>" class="btn btn-primary btn-sm">View Details</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
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



<?= FlashMessage::render()?>

<?php

ViewHelper::loadJsScripts();
ViewHelper::loadFooter();
?>
