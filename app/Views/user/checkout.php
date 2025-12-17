
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
                <th><?= hs(trans('checkOut.name')); ?></th>
                <th><?= hs(trans('checkOut.category')); ?></th>
                <th><?= hs(trans('checkOut.description')); ?></th>
                <th><?= hs(trans('checkOut.price')); ?></th>
                <th><?= hs(trans('checkOut.quantity')); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($cart as $name => $item) {
                ?>
                <tr>
                    <td> <?= htmlspecialchars($name) ?> </td>
                    <td> <?= htmlspecialchars($item["category_name"]) ?> </td>
                    <td> <?= htmlspecialchars($item["description"]) ?> </td>
                    <td> <?= htmlspecialchars($item["price"]) ?> </td>
                    <td> <?= htmlspecialchars($item['amount']) ?> </td>

                </tr>
            <?php }
            ?>
        </tbody>
    </table>
<a class="btn btn-primary" style="float: right;" href="confirmOrder"><?= hs(trans('checkOut.confirmOrderBtn')); ?></a>
<?php
ViewHelper::loadJsScripts();
ViewHelper::loadFooter();
?>

