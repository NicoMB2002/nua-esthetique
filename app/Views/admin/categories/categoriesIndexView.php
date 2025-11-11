<?php

use App\Helpers\FlashMessage;
use App\Helpers\ViewHelper;
//TODO: set the page title dynamically based on the view being rendered in the controller.
$page_title = 'Categories list';

//TODO: We need to load an admin-specific header.
ViewHelper::loadAdminHeader($page_title);
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <br>
    <h2>Categories Listing</h2>
    <div>
        <?= FlashMessage::render() ?>
    </div>
    <hr>
    <div class="table-responsive small">
        <h4>The list of Categories will be rendered here.</h4>
    </div>
    <?php $categories = $data['categories'] ?>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($categories as $key => $category) { ?>
                <tr>
                    <td> <?= $category['id'] ?></td>
                    <td> <?= $category['name'] ?></td>
                    <td> <?= $category['description'] ?></td>
                    <td> <?= $category['created_at'] ?></td>
                    <td> <a href="categories/edit/<?= $category['id'] ?>" class="btn btn-success"> Edit</a></td>
                    <td> <a href="categories/delete/<?= $category['id'] ?>" class="btn btn-danger"> Delete</a></td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>

    <div>
        <a href="categories/create<?= $category['id'] ?>" class="btn btn-primary"> Add a new Category</a>
    </div>
</main>

<?php

ViewHelper::loadJsScripts();
//TODO: We need to load an admin-specific footer.
ViewHelper::loadAdminFooter();
?>
