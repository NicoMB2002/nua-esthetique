<?php

use App\Helpers\ViewHelper;

$page_title = 'Edit Categories Details';
$category = $data['category'];
ViewHelper::loadAdminHeader($page_title);
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>Edit Categories:</h2>
    <form class="row g-3" method="POST" action="<?= APP_ADMIN_URL ?>/categories/update">
        <input type="hidden" name="category_id" value="<?= $category['id'] ?>">
        <div class="col-md-6">
            <label for="inputCategory_name" class="form-label">Name</label>
            <input type="text" class="form-control" id="inputCategory_name" name="category_name" value="<?= $category['name'] ?>">
        </div>
        <div class="col-md-6">
            <label for="inputCategory_description" class="form-label">Description</label>
            <input type="text" class="form-control" id="inputCategory_description" name="category_description" value="<?= $category['description'] ?>">
        </div>
        <br>
        <div class="col-md-12">
            <button type="submit" class="btn btn-success">Update changes</button>
            <a href="<?= APP_ADMIN_URL ?>/categories" class="btn btn-danger"> Cancel</a>
        </div>

    </form>

</main>

<?php

ViewHelper::loadJsScripts();
ViewHelper::loadAdminFooter();
?>
