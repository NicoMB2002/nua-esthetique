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

<!--Bootstrap carousel -->
<div id="productCarousel" class="carousel slide" style="margin-top: 50px;">
  <div class="carousel-inner" role="listbox">



    <?php for ($i = 0; $i < round(count($data['products'])/6); $i++): ?>
            <?php if ($i == 0 ){?>
                <div class="item active " data-bs-interval="4000">
            <?php }else {?>
                <div class="item " data-bs-interval="4000">
            <?php } ?>
    <?php for ($j = $i*6; $j < $i*6+6; $j++):
    if (!isset($data['products'][$j])) {
    break 2;
    }
        $product = $data['products'][$j] ?>
            <div class="col-md-2 mb-4">
                <div class="card h-100" style="width: 250px;">
                    <img
                        src="<?= hs(APP_BASE_URL.'/'.$product['path'] ?? '/images/placeholder.jpg') ?>"
                        class="card-img-top"
                        alt="<?= hs($product['name']."") ?>"
                        style="height: 200px; object-fit: cover;"
                    >
                    <div class="card-body" style="height: 225px;">
                        <h5 class="card-title"><?= hs($product['name']."") ?></h5>
                        <p class="card-text"><?= hs(substr($product['description'], 0, 100)) ?>...</p>
                        <?php if ($product['promotion']?? 0>0): ?>
                            <p class="fw-bold text-decoration-line-through text-danger">$<?= hs(number_format($product['price'], 2)) ?></p>
                            <p class="fw-bold text-success">$<?= hs(number_format(($product['price'] * $product['promotion'] )/100, 2)) ?></p>
                            <?php else: ?>
                             <p class="fw-bold text">$<?= hs(number_format($product['price'], 2)) ?></p>
                       <?php endif; ?>
                        <span class="badge bg-secondary"><?= hs($product['category_name'] ?? 'Uncategorized') ?></span>
                    </div>
                    <div class="card-footer text-bg-dark">
                        <form method="post" action="add_item " style="float:right;">
                            <input type="hidden" name="id" value='<?=$product['product_id']?>' >

                         <input type="submit" class="btn btn-light " value="Add To Cart">
                        </form>
                    </div>
                </div>
            </div>


    <?php endfor; ?>
 </div>
  <?php endfor; ?>
</div>


 <!-- <div class="carousel-indicators" >
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>-->
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

<br><br><br><br>

<?php
$categories = $categories ?? [];
?>
<section class="container my-5">
    <h2 class="mb-4"><?= trans('nav.collection'); ?></h2>

    <div class="row g-4 justify-content-center">
        <?php if (!empty($categories)): ?>
            <?php foreach ($categories as $category): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 d-flex justify-content-center">
                    <div class="card h-100 shadow-sm border-0 bg-dark text-white" style="width: 18rem;">
                        <a href="categories/<?= $category['id'] ?>">
                            <img
                                src="<?= APP_BASE_URL ?>/<?= htmlspecialchars($category['file_path'] ?? 'default.jpg') ?>"
                                class="card-img-top"
                                alt="<?= htmlspecialchars($category['name']) ?>"
                                style="height:220px; object-fit:cover;"
                            >
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= htmlspecialchars($category['name']) ?></h5>
                            <p class="card-text small">
                                <?= htmlspecialchars($category['description']) ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center"><?= trans('home.collection_not_found'); ?></p>
        <?php endif; ?>
    </div>
</section>

<br><br><br><br>

<div class="d-flex justify-content-center my-5">
  <div class="card mb-3 shadow-lg" style="width: 60%;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="<?= APP_BASE_URL?>/public/assets/resources/images/LipBlush.png" class="img-fluid rounded-start" alt="Beauty Studio" style="height:400px; width: 600px; object-fit:cover;">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h2 class="card-title fw-bold" style="font-size: 40px;"><?= trans('home.card_title'); ?></h2>
          <br><br>
          <p class="card-text" style="font-size: 25px;">
            <?= trans('home.card_description'); ?>
          </p>
          <br>
          <p style="font-size: 15px;"><?= trans('home.appointment_msg'); ?> <a href=""><?= trans('home.appointment_link'); ?></a></p>
        </div>
      </div>
    </div>
  </div>
</div>


<?= FlashMessage::render()?>

<?php

ViewHelper::loadJsScripts();
ViewHelper::loadFooter();
?>
