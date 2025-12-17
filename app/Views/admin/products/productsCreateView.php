<?php

use App\Helpers\ViewHelper;
//TODO: set the page title dynamically based on the view being rendered in the controller.
$page_title = 'Edit Product Details';

//TODO: We need to load an admin-specific header.
ViewHelper::loadAdminHeader($page_title);
$categories = $data["categories"];
// dd($product);
// dd($categories);
$options = ViewHelper::renderSelectOptions($categories,0, 'id', 'name');
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>Create Product:</h2>
<form class="row g-3" method="POST"action="<?= APP_ADMIN_URL ?>/products/store" enctype="multipart/form-data">
  <div class="col-md-6">
    <label for="inputName" class="form-label">Name</label>
    <input required type="text"  name="name" class="form-control" id="inputName">
  </div>
  <div class="col-md-6">
    <label for="inputDescription" class="form-label">Description</label>
    <input required type="text"  name="description" class="form-control" id="inputDescription">
  </div>
  <div class="col-12">
    <label for="inputPrice" class="form-label">Price</label>
    <input required type="text" class="form-control" name="price" id="inputPrice" placeholder="0.00">
  </div>
  <div class="col-md-4">
    <label for="inputCategory" class="form-label">Category:</label>
    <select required id="inputCategory" name="category" class="form-select">
        <?= ViewHelper::renderSelectOptions($data['categories'],0,'id','name')?>

    </select>
  </div>
  <div class="col-md-2">
    <label for="inputQuantity" class="form-label">Quantity:</label>
    <input required type="text"  name="quantity" class="form-control" id="inputQuantity">
    </div>
      <div class="col-md-4" style="margin-top:47px;">
        <input
                            type="file"
                            class="form-control"
                            id="myfile"
                            name="myfile"
                            accept="image/*"
                            required>
     </div>
    <div class="col-12">
    <button type="submit" class="btn btn-success">Save</button>
    <a class="btn btn-danger" href="<?= APP_ADMIN_URL ?>/products"> Cancel</a>
  </div>
</form>

<?php
ViewHelper::loadJsScripts();
//TODO: We need to load an admin-specific footer.
ViewHelper::loadAdminFooter();
?>
