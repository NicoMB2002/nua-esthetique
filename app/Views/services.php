<?php

use App\Helpers\FlashMessage;
use App\Helpers\ViewHelper;


ViewHelper::loadHeader($data['title']);

//dd($data);
?>

<div>
    <div class="container" id="services-catalog-lashes">

    </div>
    <br>
    <br>
    <a href="https://nuaesthetique.square.site/?utm_source=ig&utm_medium=social&utm_content=link_in_bio&fbclid=PAZXh0bgNhZW0CMTEAc3J0YwZhcHBfaWQMMjU2MjgxMDQwNTU4AAGn348Ty4JkBR5PPvFxs78NAsFWxGPn1mMvRCBUvpv7Q5PY0acA52cwugE9Vog_aem_wmZhhMc6Jk_jmGoA_ZLO6Q"><button class="btn" id="book-btn">Book Now</button></a>
</div>


<style>
    #book-btn {
        width: 100%;
        padding: 14px 0;
        border: none;
        border-radius: 8px;
        background-color: #d8b89c;
        color: white;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s ease-in-out;
    }
</style>

<script src="<?= APP_BASE_URL ?>/public/assets/js/services.js"></script>
<!-- <script src="/assets/js/services.js"></script> -->
<?= FlashMessage::render() ?>

<?php

ViewHelper::loadJsScripts();
ViewHelper::loadFooter();
?>
