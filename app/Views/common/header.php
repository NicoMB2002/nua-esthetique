<?php

use App\Helpers\SessionManager;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title><?= $page_title ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= APP_ASSETS_DIR_URL ?>/css/style.css">
    <link rel="stylesheet" href="<?= APP_ASSETS_DIR_URL ?>/css/contact-css/style.css">

</head>



<body>



<header class="navBar">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="<?= APP_BASE_URL?>/home" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <img src="<?= APP_BASE_URL?>/public/assets/resources/images/NuaLogo.png" width="200" height="200" class="me-2" />
        </a>
        <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="<?= APP_BASE_URL?>/products"><?= trans('nav.products'); ?></a>
        </li>
        <li class="nav-item"><a class="nav-link" href="<?= APP_BASE_URL?>/contact"><?= trans('nav.contact'); ?></a></li>
        <li class="nav-item"><a class="nav-link" href="<?= APP_BASE_URL?>/faq"><?= trans('nav.faq'); ?></a></li>
        <li class="nav-item"><a class="nav-link" href="<?= APP_BASE_URL?>/promotions"><?= trans('nav.promotions'); ?></a></li>
        <li class="nav-item"><a class="nav-link" href="#"><?= trans('nav.about'); ?></a></li>
        <li class="nav-item"><a class="nav-link" href="services"><?= trans('nav.services'); ?></a></li>
      </ul>

                <div class="nav-icons">
                    <a <?php

                        if (SessionManager::has('user_id')): ?>
                        href="<?= APP_BASE_URL ?>/dashboard"
                        <?php else: ?>
                        href="<?= APP_BASE_URL ?>/login"
                        <?php endif; ?>><button type="button" id="accountBtn" class="btn btn-outline-dark me-2"><i class="bi bi-person-fill"></i> <?= trans('nav.account'); ?></button></a>
                    <a href="#"><button type="button" id="cartBtn" class="btn btn-outline-dark me-2"><i class="bi bi-cart" style="color: black;"></i> <?= trans('nav.cart') ?></button></a>


                    <div class="language-switcher">
                        <?php
                        // Get current locale from global translator
                        global $translator;
                        $currentLocale = $translator->getLocale();
                        $availableLocales = $translator->getAvailableLocales();
                        ?>

                        <?php foreach ($availableLocales as $locale): ?>
                            <?php if ($locale !== $currentLocale): ?>
                                <a href="?lang=<?= hs($locale) ?>" class="lang-link">
                                    <?= $locale === 'en' ? 'English' : 'Français' ?>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <span class="current-lang">
                            <?= $currentLocale === 'en' ? '🇬🇧 English' : '🇫🇷 Français' ?>
                        </span>
                    </div>
                </div>

            </div>
        </div>

        <div id="cart" class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">

                </h5>
                <button id="cartClose" type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">

                <ul class="list-group">

    <?php
 $total = 0.0;
$cart = SessionManager::get('cart');
 foreach ($cart ?? [] as $name => $item):
    $total += ($item['price'] ?? 1 * (int) $item['amount'])
 ?>
 <li class="list-group-item text-bg-dark">
 <?= $name?>
 <div class="ml-1">
<input  class="text-bg-dark" type="number" name="<?= $item['product_id']?>" value="<?= $item['amount']?>" >
</div>
<a href="remove_item/<?= $name?>" class="btn btn-danger"> Delete</a>

 </li>
 <br>
    <?php endforeach; ?>
 </ul>
     <input type="submit" class="btn btn-success btn-sm" value="Confirm Changes">
</form>
  </div>
  <footer style="margin-left:20px;">
    <h3 > Total: <?= $total?> $</h3>
    <a class="btn btn-primary btn-sm" href="checkout">Checkout</a>
  </footer>
</div>

        <script>
            $('#cartBtn').click(function() {


                if ($('#cart').hasClass('show')) {
                    $('#cart').removeClass('show');
                } else {
                    $('#cart').addClass('show');
                }
            })
            $('#cartClose').click(function() {

                $('#cart').removeClass('show');
            })
        </script>
    </header>
