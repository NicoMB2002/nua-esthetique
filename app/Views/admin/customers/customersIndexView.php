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
            <tr style="background-color:var(--color-dark-beige);">
                <th style="background-color:var(--color-dark-beige);">Id</th>
                <th style="background-color:var(--color-dark-beige);">First Name</th>
                <th style="background-color:var(--color-dark-beige);">Last Name</th>
                <th style="background-color:var(--color-dark-beige);">Email</th>
                <th style="background-color:var(--color-dark-beige);">Phone Number</th>
                <th style="background-color:var(--color-dark-beige);">Address</th>
                <th style="background-color:var(--color-dark-beige);">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data['customers'] as $key => $customer) { ?>
                <tr>
                    <td style="background-color:var(--color-dark-beige);"> <?= $customer['id'] ?></td>
                    <td style="background-color:var(--color-dark-beige);"> <?= $customer['first_name'] ?></td>
                    <td style="background-color:var(--color-dark-beige);"> <?= $customer['last_name'] ?></td>
                    <td style="background-color:var(--color-dark-beige);"> <?= $customer['email'] ?></td>
                    <td style="background-color:var(--color-dark-beige);"> <?= $customer['phone_number'] ?></td></td>
                    <td style="background-color:var(--color-dark-beige);"> <?= $customer['address'] ?></td></td>
                    <td style="background-color:var(--color-dark-beige);"> <a href="customer/edit/<?= $customer['id'] ?>" class="btn btn-success"> Edit</a>
                        <a href="customer/delete/<?= $customer['id'] ?>" class="btn btn-danger"> Delete</a>
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
