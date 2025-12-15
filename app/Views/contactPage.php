<?php

use App\Helpers\FlashMessage;
use App\Helpers\TranslationHelper;
use App\Helpers\ViewHelper;


ViewHelper::loadHeader($data['title']);
TranslationHelper::class;
?>
<div class="container">
    <div class="">
        <h1 class="text-center mb-4"><?= hs(trans('contact.contact-us')); ?></h1>
    </div>

    <div class="col-lg-6 col-md-3">
        <img class="rectangle-5" src="<?= APP_BASE_URL ?>/public/assets/resources/images/ContactUs.png" />
    </div>
    <div class="text-wrapper-5 col-lg-6">
        <h2><?= hs(trans('contact.message-us')); ?></h2>
        <br>
        <p class="text-secondary">
            <?= hs(trans('contact.send-message')); ?>
        </p>
        <br>
        <form action="contact" method="post" style="max-width: 500px;" class="">
            <label class="form-label"> To: info@nuaesthetique.com</label>
            <br>
            <textarea name="message-box"
                class="form-control" id="contact-message" rows="10" placeholder=<?= hs(trans('contact.text-box')); ?> required></textarea>
            <button type="submit" class="btn btn-info w-40"><?= hs(trans('contact.send')); ?></button>
        </form>

    </div>

</div>
<?= FlashMessage::render() ?>

<?php

ViewHelper::loadJsScripts();
ViewHelper::loadFooter();
?>
