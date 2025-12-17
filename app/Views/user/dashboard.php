<?php

use App\Helpers\ViewHelper;


ViewHelper::loadHeader($data['title']);
// dd($_SESSION);
$userInfo = $data['userInfo'];
// dd('hello?');
// dd($userInfo);//Changed after update
?>

<div class="container mt-5">

    <h1><?= hs(trans('account.welcome')); ?>, <?= htmlspecialchars($_SESSION['user_name'] ?? 'Guest') ?>!</h1>

    <div class="mb-4">
        <?= App\Helpers\FlashMessage::render() ?>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= hs(trans('account.myProfile')); ?></h5>
                    <p class="card-text">
                        <strong><?= hs(trans('account.name')); ?></strong> <?= htmlspecialchars($_SESSION['user_name'] ?? 'N/A') ?><br>
                        <strong><?= hs(trans('account.email')); ?></strong> <?= htmlspecialchars($_SESSION['user_email'] ?? 'N/A') ?><br>
                        <strong><?= hs(trans('account.role')); ?></strong> <?= htmlspecialchars($_SESSION['user_role'] ?? 'N/A') ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?= hs(trans('account.quickActions')); ?></h5>
                    <div class="d-grid gap-2">
                        <a href="<?= APP_BASE_URL ?>/user/products" class="btn btn-primary"><?= hs(trans('account.browse')); ?></a>
                        <a href="<?= APP_BASE_URL ?>/user/orders" class="btn btn-secondary"><?= hs(trans('account.myOrders')); ?></a>
                        <a href="user/userEdit/<?= $_SESSION['user_id'] ?>" class="btn btn-info"><?= hs(trans('account.updateProfile')); ?></a>
                        <a class="btn btn-danger btn-sm" href="<?= APP_BASE_URL ?>/user/logout"><?= hs(trans('account.logout')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>

<?php

ViewHelper::loadJsScripts();
ViewHelper::loadFooter();
?>
