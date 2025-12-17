<?php

use App\Helpers\FlashMessage;
use App\Helpers\ViewHelper;
use App\Helpers\SessionManager;;
ViewHelper::loadHeader($data['title']);

//dd($data);
?>
<h2>Your Orders</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Tracking Number</th>
            <th>Order Date</th>
            <th>Actions</th>
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
                <td> <a href="<?= APP_BASE_URL ?>/user/orders/<?= htmlspecialchars($order["order_id"]) ?>" class="btn btn-primary">Details</a> </td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>
<?php
ViewHelper::loadJsScripts();
ViewHelper::loadFooter();
?>
