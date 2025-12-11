<?php
use App\Helpers\FlashMessage;
use App\Helpers\ViewHelper;


ViewHelper::loadHeader($data['title']);

//dd($data);
?>

    <form method="get" action="" class="form-inline my-2 my-lg-0">
      <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <input class="btn btn-primary my-2 my-sm-0" type="submit" value="Search">
    </form>

<!--Bootstrap carousel -->
<div id="productCarousel" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner" role="listbox">



    <?php for ($i = 0; $i < round(count($data['products'])/3); $i++): ?>
            <?php if ($i == 0 ){?>
                <div class="item active " data-bs-interval="4000">
            <?php }else {?>
                <div class="item " data-bs-interval="4000">
            <?php } ?>
    <?php for ($j = $i*3; $j < $i*3+3; $j++):
    if (!isset($data['products'][$j])) {
    break 2;
    }
        $product = $data['products'][$j] ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img
                        src="<?= hs(APP_BASE_URL.'/'.$product['path'] ?? '/images/placeholder.jpg') ?>"
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
                        <form method="post" action="add_item" style="float:right;">
                            <input type="hidden" name="id" value='<?=$product['product_id']?>' >
                        <input type="submit" class="btn btn-success btn-sm" value="Add">
                        </form>
                    </div>
                </div>
            </div>


    <?php endfor; ?>
 </div>
  <?php endfor; ?>
</div>

      <button id="prevBtn" class="left carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button id="nextBtn" class="right carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

<script>

    $('#productCarousel').carousel();

    $('.left').click(function(){
        $('#productCarousel').carousel("prev");
    })

    $('.right').click(function(){
        $('#productCarousel').carousel("next");

    })


</script>

<?= FlashMessage::render()?>

<?php

ViewHelper::loadJsScripts();
ViewHelper::loadFooter();
?>
