<?php
use App\Helpers\FlashMessage;
use App\Helpers\ViewHelper;


ViewHelper::loadHeader($data['title']);
?>
<br>
<br>

<form method="get" action="" style="float: right;" class="form-inline my-2 my-lg-0">
      <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <input class="btn btn-primary my-2 my-sm-0" type="submit" value="Search">
    </form>

<div style="margin-top: 60px;">

  <?php for ($i = 0; $i < round(count($data['products'])/5); $i++): ?>
            <div class=" mb-4">
    <?php for ($j = $i*5; $j < $i*5+5; $j++):
    if (!isset($data['products'][$j])) {
    break 2;
    }
        $product = $data['products'][$j] ?>
            <div class="col-md-2 mb-4">
                <div class="card h-100" style="width: 250px;">
                    <a href="<?= APP_BASE_URL?>/product/<?=$product['product_id']?>">
                        <img
                            src="<?= hs(APP_BASE_URL.'/'.$product['path'] ?? '/images/placeholder.jpg') ?>"
                            class="card-img-top"
                            alt="<?= hs($product['name']."") ?>"
                            style="height: 200px; object-fit: cover;"
                        >
                    </a>
                    <div class="card-body" style="height: 225px;">
                        <h5 class="card-title"><?= hs($product['name']."") ?></h5>
                        <p class="card-text"><?= hs(substr($product['description'], 0, 100)) ?>...</p>
                        <?php if ($product['promotion']?? 0>0): ?>
                            <p class="fw-bold text-decoration-line-through text-danger">$<?= hs(number_format($product['price'], 2)) ?></p>
                            <p class="fw-bold text-success">$<?= hs(number_format(($product['price'] -($product['price'] * $product['promotion'] )/100), 2)) ?></p>
                            <?php else: ?>
                             <p class="fw-bold text">$<?= hs(number_format($product['price'], 2)) ?></p>
                       <?php endif; ?>
                        <span class="badge bg-secondary"><?= hs($product['category_name'] ?? 'Uncategorized') ?></span>
                    </div>
                   <div class="card-footer bg-white text-center">
                        <form method="post" action="add_item" class="w-100">
                            <input type="hidden" name="id" value='<?=$product['product_id']?>'>
                            <input type="submit" class="btn btn-light w-100 rounded-pill fw-bold border border-dark" value="Add to Cart">
                        </form>
                    </div>


                </div>
            </div>


    <?php endfor; ?>
 </div>
  <?php endfor; ?>



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

<br><br><br><br><br><br>
<br><br><br><br><br><br>
<br><br><br><br><br><br>
<br><br><br><br><br><br>
<br><br><br><br><br><br>
<br><br><br><br><br><br>
<br><br><br><br><br><br>
<br><br><br><br><br><br>
<br><br><br><br><br><br>
<br><br><br><br><br><br>



<?= FlashMessage::render()?>

<?php

ViewHelper::loadJsScripts();
ViewHelper::loadFooter();
?>
