<?php

use App\Helpers\FlashMessage;
use App\Helpers\ViewHelper;


ViewHelper::loadAdminHeader($data['title']);
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <br>
    <h2>List of Customers</h2>
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
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data['customers'] as $key => $customer) { ?>
                <tr>
                    <td> <?= $customer['id'] ?></td>
                    <td> <?= $customer['first_name'] ?></td>
                    <td> <?= $customer['last_name'] ?></td>
                    <td> <?= $customer['email'] ?></td>
                    <td> <?= $customer['phone_number'] ?></td></td>
                    <td> <?= $customer['address'] ?></td></td>
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
