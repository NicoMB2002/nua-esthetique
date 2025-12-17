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
                <th style="background-color:var(--color-dark-beige);">Id</th>
                <th style="background-color:var(--color-dark-beige);">Customer Id</th>
                <th style="background-color:var(--color-dark-beige);">Customer Name</th>
                <th style="background-color:var(--color-dark-beige);">Tracking Number</th>
                <th style="background-color:var(--color-dark-beige);">Order Date</th>
                <th style="background-color:var(--color-dark-beige);">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data['orders'] as $key => $order) { ?>
                <tr>
                    <td style="background-color:var(--color-dark-beige);"> <?= $order['order_id'] ?></td>
                    <td style="background-color:var(--color-dark-beige);"> <?= $order['customer_id'] ?></td>
                    <td style="background-color:var(--color-dark-beige);"> <?= $order['first_name'] ?></td>
                    <td style="background-color:var(--color-dark-beige);"> <?= $order['tracking_number'] ?></td>
                    <td style="background-color:var(--color-dark-beige);"> <?= $order['order_date'] ?></td>
                    <td style="background-color:var(--color-dark-beige);">
                        <a href="orders/delete/<?= $order['order_id']?>" class="btn btn-danger"> Delete</a>
                    </td>
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
