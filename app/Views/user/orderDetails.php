<?php

use App\Helpers\FlashMessage;
use App\Helpers\ViewHelper;
use App\Helpers\SessionManager;;
ViewHelper::loadHeader($data['title']);

// dd($data);//good now
?>
<h2> <?= hs(trans('orderDetails.order')); ?> <?= $data['order_id'] ?> <?= hs(trans('orderDetails.details')); ?> </h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th><?= hs(trans('orderDetails.name')); ?> </th>
            <th><?= hs(trans('orderDetails.category')); ?> </th>
            <th><?= hs(trans('orderDetails.description')); ?> </th>
            <th><?= hs(trans('orderDetails.price')); ?> </th>
            <th><?= hs(trans('orderDetails.quantity')); ?> </th>
        </tr>
    </thead>
    <tbody>
        <?php
             $total = 0.0;
            foreach ($data['products'] as $product) {
                 $total += ($product['price']-($product['price']*$product['promotion']/100)  * (int) $product['quantity']?? 1)
                ?>
                <tr>
                    <td> <?= htmlspecialchars($product["product_name"]) ?> </td>
                    <td> <?= htmlspecialchars($product["category_name"]) ?> </td>
                    <td> <?= htmlspecialchars($product["description"]) ?> </td>
                    <td> <?= htmlspecialchars($product['price']-($product['price']*$product['promotion']/100)) ?> </td>
                    <td> <?= htmlspecialchars($product['quantity']) ?> </td>

                </tr>
            <?php }
            ?>
        </tbody>
</table>
    <h3 > Total: <?=  $total?>$</h3>
    <a href="<?= APP_BASE_URL?>/user/orders" class="btn btn-primary"><?= hs(trans('orderDetails.backBtn')); ?></a>
    <a style="float: right;" href="<?= APP_BASE_URL?>/user/orders/delete/<?=$data['order_id']?>" class="btn btn-danger">Cancel Order<
<?php
ViewHelper::loadJsScripts();
ViewHelper::loadFooter();
?>
