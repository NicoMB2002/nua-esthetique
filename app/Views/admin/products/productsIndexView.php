<?php

use App\Helpers\FlashMessage;
use App\Helpers\ViewHelper;
//TODO: set the page title dynamically based on the view being rendered in the controller.
$page_title = 'Products list';

//TODO: We need to load an admin-specific header.
ViewHelper::loadAdminHeader($page_title);
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <?= FlashMessage::render()?>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    Share
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    Export
                </button>
            </div>
            <button
                type="button"
                class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
                <svg class="bi" aria-hidden="true">
                    <use xlink:href="#calendar3"></use>
                </svg>
                This week
            </button>
        </div>
    </div>
    <div class="table-responsive small rounded">
        <!--TODO: render the list of products/categories using an HTML table -->

        <h1>Products Management</h1>
        <br>
        <div><?= FlashMessage::render(); ?></div>
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th style="background-color:var(--color-dark-beige);">Id</th>
                    <th style="background-color:var(--color-dark-beige);">Name</th>
                    <th style="background-color:var(--color-dark-beige);">Category</th>
                    <th style="background-color:var(--color-dark-beige);">Description</th>
                    <th style="background-color:var(--color-dark-beige);">Price</th>
                    <th style="background-color:var(--color-dark-beige);">Stock Quantity</th>
                    <th style="background-color:var(--color-dark-beige);">Promotion</th>
                    <th style="background-color:var(--color-dark-beige);">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($products as $key => $product) {

                ?>
                    <tr>
                        <td class="" style="background-color:var(--color-dark-beige);"><?= $product["product_id"] ?></td>
                        <td style="background-color:var(--color-dark-beige);"> <?= htmlspecialchars($product["name"]) ?> </td>
                        <td style="background-color:var(--color-dark-beige);"> <?= htmlspecialchars($product["category_name"]) ?> </td>
                        <td style="background-color:var(--color-dark-beige);"> <?= htmlspecialchars($product["description"]) ?> </td>
                        <td style="background-color:var(--color-dark-beige);"> <?= htmlspecialchars($product["price"]) ?> </td>
                        <td style="background-color:var(--color-dark-beige);"> <?= htmlspecialchars($product["quantity"]) ?> </td>
                        <td style="background-color:var(--color-dark-beige);"> <?= htmlspecialchars($product["promotion"] ?? 0) ?>% </td>
                        <td style="background-color:var(--color-dark-beige);">
                            <a href="products/edit/<?= $product['product_id'] ?>" class="btn btn-success">Edit</a>
                            <a href="products/delete/<?= $product['product_id'] ?>" class="btn btn-danger"> Delete</a></td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>


    </div>

    <div>
        <a href="products/create" class="btn btn-primary"> Add a new Products</a>
    </div>
</main>

<?php

ViewHelper::loadJsScripts();
//TODO: We need to load an admin-specific footer.
ViewHelper::loadAdminFooter();
?>
