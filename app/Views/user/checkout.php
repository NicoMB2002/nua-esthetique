
   <?php
use App\Helpers\FlashMessage;
use App\Helpers\ViewHelper;
use App\Helpers\SessionManager;

$cart = SessionManager::get('cart');
ViewHelper::loadHeader($data['title']);

//dd($data);
?>

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
            foreach ($cart as $item) {
                ?>
                <tr>
                    <td> <?= htmlspecialchars($item[0]["name"]) ?> </td>
                    <td> <?= htmlspecialchars($item[0]["category_name"]) ?> </td>
                    <td> <?= htmlspecialchars($item[0]["description"]) ?> </td>
                    <td> <?= htmlspecialchars($item[0]["price"]) ?> </td>
                    <td> <?= htmlspecialchars(count($item)) ?> </td>

                </tr>
            <?php }
            ?>
        </tbody>
    </table>
<a class="btn btn-primary" style="float: right;" href="confirmOrder">Confirm Order</a>
<?php
ViewHelper::loadJsScripts();
ViewHelper::loadFooter();
?>

