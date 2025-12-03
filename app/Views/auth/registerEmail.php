<?php

use App\Helpers\ViewHelper;

$page_title = $userInfo['title'] ?? "register Email";
$userInfo = $data;
ViewHelper::loadHeader($page_title);
?>

   <div class="row justify-content-center">
    <div class="col-5">
        <!-- //TODO:add image placeholder -->
        <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor vero iure illo culpa debitis eaque placeat, vel voluptatibus animi odit voluptatum temporibus molestiae deserunt inventore velit veritatis consectetur esse provident! Facere odio voluptatem maiores, mollitia officiis nihil suscipit eius deserunt obcaecati sapiente temporibus expedita velit vel cupiditate sint? Eum, dolorem.
        </p>
    </div>

    <div class="col-7">
        <form action="login" method="post">
            <div class="input-row">
                <label for="email" class="form-label" id="register-email-label"><i class="bi bi-envelope-at icon-color"></i></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" required>
            </div>

            <div class="input-row">
                <label for="password" class="form-label" id="register-password-label"><i class="bi bi-lock-fill icon-color"></i></label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>

            <div class="input-row">
                <label for="confirm_password" class="form-label" id="confirm-password-label"><i class="bi bi-lock-fill icon-color"></i></label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password" required>
            </div>
            <input type="hidden" name="role" value="customer">
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" id="register-btn">Start Shopping Now!</button>
        </form>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
