<?php
use App\Helpers\FlashMessage;
use App\Helpers\ViewHelper;


ViewHelper::loadHeader($data['title']);

?>


<div class="accordion-wrapper" style="max-width: 600px; margin: 0 auto;">
  <div class="text-center my-4">
    <h1>FAQ</h1>
    <h3>Frequently Asked Questions</h3>
  </div>

  <div class="accordion" id="accordionPanelsStayOpenExample">
    <div class="accordion-item">
      <h2 class="accordion-header" id="panelsStayOpen-headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                aria-controls="panelsStayOpen-collapseOne">
          How can I place an order ?
        </button>
      </h2>
      <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
           aria-labelledby="panelsStayOpen-headingOne">
        <div class="accordion-body">
          <strong>Creating an account is required to place an order.</strong> This allows you to track your purchases, receive promotions, and manage your information securely.
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                aria-controls="panelsStayOpen-collapseTwo">
          Where do your products come from?
        </button>
      </h2>
      <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
           aria-labelledby="panelsStayOpen-headingTwo">
        <div class="accordion-body">
          Our products are imported from overseas and carefully selected to meet professional beauty standards.
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="panelsStayOpen-headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                aria-controls="panelsStayOpen-collapseThree">
          Where do you ship?
        </button>
      </h2>
      <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
           aria-labelledby="panelsStayOpen-headingThree">
        <div class="accordion-body">
          We ship nationwide across Canada.
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="panelsStayOpen-headingFour">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                aria-controls="panelsStayOpen-collapseFour">
          How can I contact you if I have a question?
        </button>
      </h2>
      <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse"
           aria-labelledby="panelsStayOpen-headingFour">
        <div class="accordion-body">
          You can contact us through the Contact Us page or by email. A support representative will respond as soon as possible.
        </div>
      </div>
    </div>

    <div class="accordion-item">
      <h2 class="accordion-header" id="panelsStayOpen-headingFive">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false"
                aria-controls="panelsStayOpen-collapseFive">
          What payment methods do you accept?
        </button>
      </h2>
      <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse"
           aria-labelledby="panelsStayOpen-headingFive">
        <div class="accordion-body">
          We accept PayPal, a secure online payment method.
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
