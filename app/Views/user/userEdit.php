<?php

use App\Helpers\ViewHelper;

$page_title = 'Edit User Details';
$user = $data['user'];
// dd($user); //Good

ViewHelper::loadAdminHeader($page_title);
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>Edit User Details:</h2>
    <form class="row g-3" method="POST" action="<?= APP_BASE_URL ?>/user/update/<?= $user['id'] ?>">
        <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
        <div class="col-md-6">
            <label for="inputUser_name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="inputUser_fName" name="user_fname" value="<?= $user['first_name'] ?>">
        </div>
        <div class="col-md-6">
            <label for="inputUser_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="inputUser_lName" name="user_lname" value="<?= $user['last_name'] ?>">
        </div>
        <div class="col-md-6">
            <label for="inputUser_email" class="form-label">Email</label>
            <input type="text" class="form-control" id="inputUser_email" name="user_email" value="<?= $user['email'] ?>">
        </div>
        <div class="col-md-6">
            <label for="inputUser_address" class="form-label">Address</label>
            <input type="text" class="form-control" id="inputUser_address" name="user_address" value="<?= $user['address'] ?>">
        </div>
        <div class="col-md-6">
            <label for="inputUser_postal_code" class="form-label">Postal Code</label>
            <input type="text" class="form-control" id="inputUser_postal_code" name="user_postal_code" value="<?= $user['postal_code'] ?>">
        </div>
        <div class="col-md-6">
            <label for="inputUser_phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="inputUser_phone" name="user_phone" value="<?= $user['phone_number'] ?>">
        </div>
        <br>
        <div class="col-md-12">
            <button type="submit" class="btn btn-success">Update changes</button>
            <a href="<?= APP_BASE_URL ?>/dashboard" class="btn btn-danger"> Cancel</a>
        </div>

    </form>

</main>
<!-- <h1>USER_EDIT HERE!!!!</h1> -->
<?php

ViewHelper::loadJsScripts();
ViewHelper::loadAdminFooter();
?>
