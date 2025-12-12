<?php

use App\Helpers\FlashMessage;
use App\Helpers\ViewHelper;


ViewHelper::loadAdminHeader($data['title']);
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <br>
    <h2>List of Orders</h2>
    <div>
        <?= FlashMessage::render() ?>
    </div>
    <hr>
    <div class="table-responsive small">

    </div>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Customer Id</th>
                <th>Customer Name</th>
                <th>Tracking Number</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data['orders'] as $key => $order) { ?>
                <tr>
                    <td> <?= $order['order_id'] ?></td>
                    <td> <?= $order['customer_id'] ?></td>
                    <td> <?= $order['first_name'] ?></td>
                    <td> <?= $order['tracking_number'] ?></td>
                    <td> <?= $order['order_date'] ?></td>

                </tr>
            <?php
            } ?>
        </tbody>
    </table>


</main>

<?php

ViewHelper::loadJsScripts();
ViewHelper::loadAdminFooter();
?>
