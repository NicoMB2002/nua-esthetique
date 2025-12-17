<?php

use App\Helpers\FlashMessage;
use App\Helpers\ViewHelper;
use App\Helpers\SessionManager;;
ViewHelper::loadHeader($data['title']);

//dd($data);
?>
<h2><?= hs(trans('orders.yourOrders')); ?></h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th><?= hs(trans('orders.trackingNumber')); ?></th>
            <th><?= hs(trans('orders.orderDate')); ?></th>
            <th><?= hs(trans('orders.actions')); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data['orders'] as $order) {
        ?>
            <tr>
                <td> <?= htmlspecialchars($order["order_id"]) ?> </td>
                <td> <?= htmlspecialchars($order["tracking_number"]) ?> </td>
                <td> <?= htmlspecialchars($order["order_date"] ?? 'N/A') ?> </td>
                <td> <a href="<?= APP_BASE_URL ?>/user/orders/<?= htmlspecialchars($order["order_id"]) ?>" class="btn btn-primary"><?= hs(trans('orders.detailBtn')); ?></a> </td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>
<?php
ViewHelper::loadJsScripts();
ViewHelper::loadFooter();
?>
