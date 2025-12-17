<?php
use App\Helpers\FlashMessage;
use App\Helpers\ViewHelper;


ViewHelper::loadHeader($data['title']);

?>


<div class="accordion-wrapper" style="max-width: 600px; margin: 0 auto;">
  <div class="text-center my-4">
    <h1>FAQ</h1>
    <h3><?= trans('faq.faq'); ?></h3>
  </div>

  <div class="accordion" id="accordionPanelsStayOpenExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="panelsStayOpen-headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                aria-controls="panelsStayOpen-collapseOne">
          <?= trans('faq.place_order_q'); ?>
        </button>
      </h2>
      <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
           aria-labelledby="panelsStayOpen-headingOne">
        <div class="accordion-body">
          <?= trans('faq.place_order_a'); ?>
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                aria-controls="panelsStayOpen-collapseTwo">
          <?= trans('faq.where_products_q'); ?>
        </button>
      </h2>
      <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
           aria-labelledby="panelsStayOpen-headingTwo">
        <div class="accordion-body">
          <?= trans('faq.where_products_a'); ?>
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="panelsStayOpen-headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                aria-controls="panelsStayOpen-collapseThree">
          <?= trans('faq.where_ship_q'); ?>
        </button>
      </h2>
      <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
           aria-labelledby="panelsStayOpen-headingThree">
        <div class="accordion-body">
          <?= trans('faq.where_products_a'); ?>
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="panelsStayOpen-headingFour">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                aria-controls="panelsStayOpen-collapseFour">
          <?= trans('faq.contact_q'); ?>
        </button>
      </h2>
      <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse"
           aria-labelledby="panelsStayOpen-headingFour">
        <div class="accordion-body">
          <?= trans('faq.contact_a'); ?>
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="panelsStayOpen-headingFive">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false"
                aria-controls="panelsStayOpen-collapseFive">
          <?= trans('faq.payments_q'); ?>
        </button>
      </h2>
      <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse"
           aria-labelledby="panelsStayOpen-headingFive">
        <div class="accordion-body">
          <?= trans('faq.payments_a'); ?>
        </div>
      </div>
    </div>
  </div>
</div>


<br>
<br>
<br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<?= FlashMessage::render()?>

<?php

ViewHelper::loadJsScripts();
ViewHelper::loadFooter();
?>
