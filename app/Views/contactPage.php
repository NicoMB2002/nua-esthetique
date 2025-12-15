<?php

use App\Helpers\FlashMessage;
use App\Helpers\ViewHelper;


ViewHelper::loadHeader($data['title']);
?>
<div class="container">
    <div class="">
        <h1 class="text-center mb-4">Contact Us</h1>
    </div>
    <!-- <div class="group">
        <div class="rectangle-3"></div>
        <div class="text-wrapper-4">email@exxample.com</div>
    </div> -->
    <!-- <div class="mb-5">
        <div class="group-2">
            <div class="rectangle-4"></div>
            <div class="text-wrapper-4">Name</div>
        </div>
    </div> -->
    <div class="col-lg-5 col-md-3">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis facilis commodi, distinctio quod eveniet illum id vitae incidunt! Provident, quos id? Dolor consequatur odio dolores provident ipsam repellat ad a eos cum minus omnis, repellendus suscipit praesentium adipisci cupiditate, sapiente officia hic qui, ut vero fuga at rem! Non, nisi!</p>
        <!-- //!PUT Nua image here pls -->
        <img class="rectangle-5" src="img/rectangle-6.png" />
    </div>
    <div class="text-wrapper-5 col-lg-6">
        <h2>Message Us!</h2>
        <br>
        <p class="text-secondary">
            Send us an message for any doubt or problems you have with your orders. We will reach back to you as soon as
            possible.
        </p>
        <br>
        <form action="contact" method="post" style="max-width: 500px;" class="">
            <label class="form-label"> To: info@nuaesthetique.com</label>
            <br>
            <textarea name="message-box"
                class="form-control" id="contact-message" rows="10" placeholder="Write here..." required></textarea>
            <button type="submit" class="btn btn-info w-40">Send</button>
        </form>

    </div>

</div>

<style>
    .contact-page {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .contact-container {
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
    }

    .contact-form {
        width: 100%;
        max-width: 600px;
    }

    .form-input,
    .form-textarea {
        width: 100%;
        max-width: 100%;
        box-sizing: border-box;
    }

    /* For responsive sizing */
    @media (max-width: 768px) {
        .contact-page {
            padding: 10px;
        }
    }
</style>



<?= FlashMessage::render() ?>

<?php

ViewHelper::loadJsScripts();
ViewHelper::loadFooter();
?>
