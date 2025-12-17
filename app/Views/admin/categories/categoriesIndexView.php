<?php

use App\Helpers\FlashMessage;
use App\Helpers\ViewHelper;
$page_title = 'Categories list';


ViewHelper::loadAdminHeader($page_title);
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <br>
    <h2>Categories Listing</h2>
            <div>
                <?= FlashMessage::render() ?>
            </div>
    <div class="table-responsive small">

    <?php $categories = $data['categories'] ?>
    <table class="table table-stripped">
        <thead>
            <tr style="background-color:var(--color-dark-beige);">
                <th style="background-color:var(--color-dark-beige);">ID</th>
                <th style="background-color:var(--color-dark-beige);">Name</th>
                <th style="background-color:var(--color-dark-beige);">Description</th>
                <th style="background-color:var(--color-dark-beige);">Created At</th>
                <th style="background-color:var(--color-dark-beige);">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($categories as $key => $category) { ?>
                <tr>
                    <td style="background-color:var(--color-dark-beige);"> <?= $category['id'] ?></td>
                    <td style="background-color:var(--color-dark-beige);"> <?= $category['name'] ?></td>
                    <td style="background-color:var(--color-dark-beige);"> <?= $category['description'] ?></td>
                    <td style="background-color:var(--color-dark-beige);"> <?= $category['created_at'] ?></td>
                    <td style="background-color:var(--color-dark-beige);"> <a href="categories/edit/<?= $category['id'] ?>" class="btn btn-success"> Edit</a>
                        <a href="categories/delete/<?= $category['id'] ?>" class="btn btn-danger"> Delete</a>
                    </td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>
 </div>
    <div>
        <a href="categories/create/<?= $category['id'] ?>" class="btn btn-primary"> Add a new Category</a>
    </div>
</main>

<?php

ViewHelper::loadJsScripts();
ViewHelper::loadAdminFooter();
?>
