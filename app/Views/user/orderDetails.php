
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
            foreach ($data['products'] as $product) {
                ?>
                <tr>
                    <td> <?= htmlspecialchars($product["product_name"]) ?> </td>
                    <td> <?= htmlspecialchars($product["category_name"]) ?> </td>
                    <td> <?= htmlspecialchars($product["description"]) ?> </td>
                    <td> <?= htmlspecialchars($product["price"]) ?> </td>
                    <td> <?= htmlspecialchars($product['quantity']) ?> </td>

                </tr>
            <?php }
            ?>
        </tbody>
    </table>
    <a href="<?= APP_BASE_URL?>/user/orders" class="btn btn-danger">Back</a>
<?php
ViewHelper::loadJsScripts();
ViewHelper::loadFooter();
?>

