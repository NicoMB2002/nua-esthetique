<?php

use App\Helpers\FlashMessage;
use App\Helpers\ViewHelper;


ViewHelper::loadHeader($data['title']);
?>
<div class="desktop">
    <div class="text-wrapper-3">Contact Us</div>
    <div class="rectangle"></div>
    <div class="rectangle-2"></div>
    <div class="group">
        <div class="rectangle-3"></div>
        <div class="text-wrapper-4">email@exxample.com</div>
    </div>
    <div class="group-wrapper">
        <div class="group-2">
            <div class="rectangle-4"></div>
            <div class="text-wrapper-4">Name</div>
        </div>
    </div>
    <div class="text-wrapper-5">Message Us!</div>
    <p class="p">
        Send us an message for any doubt or problems you have with your orders. We will reach back to you as soon as
        possible.
    </p>
    <img class="rectangle-5" src="img/rectangle-6.png" />
    <div class="rectangle-6"></div>
    <div class="text-wrapper-6">Send</div>
    <p class="based-in-rue">
        <span class="span">Based in<br /></span> <span class="text-wrapper-7">5263 Rue Jean talon</span>
    </p>

</div>
</body>

</html>

<?= FlashMessage::render() ?>

<?php

ViewHelper::loadJsScripts();
ViewHelper::loadFooter();
?>
