
   <?php
use App\Helpers\FlashMessage;
use App\Helpers\ViewHelper;
use App\Helpers\SessionManager;
;
ViewHelper::loadHeader($data['title']);

// dd($data);//good now
?>
    <h2> Order <?= $data['order_id']?> Details </h2>
   <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
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
    <a href="<?= APP_BASE_URL?>/user/orders" class="btn btn-primary">Back</a>
    <a style="float: right;" href="<?= APP_BASE_URL?>/user/orders/delete/<?=$data['order_id']?>" class="btn btn-danger">Cancel Order</a>
<?php
ViewHelper::loadJsScripts();
ViewHelper::loadFooter();
?>

