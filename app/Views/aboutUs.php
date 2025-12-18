<?php

use App\Helpers\FlashMessage;
use App\Helpers\ViewHelper;


ViewHelper::loadHeader($data['title']);

?>

<div class="container py-5">
    <div class="row justify-content-center text-center">
        <div class="col-md-8">
            <img
                src="<?= APP_BASE_URL?>/public/assets/resources/images/AboutUs.png"
                alt="About Us"
                class="img-fluid rounded mb-4"
                style="height: 500px;"
            >
            <h1><?= trans('about_us.about_us'); ?></h1>
            <p class="text-secondary fs-2">
                <?= trans('about_us.about_us_desc1'); ?>

                <?= trans('about_us.about_us_desc2'); ?>

                <?= trans('about_us.about_us_desc3'); ?>
            </p>
        </div>
    </div>
</div>


<?= FlashMessage::render() ?>

<?php
ViewHelper::loadJsScripts();
ViewHelper::loadFooter();
?>
