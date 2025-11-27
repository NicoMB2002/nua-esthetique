<?php

use App\Helpers\ViewHelper;

$page_title = $data['title'];
ViewHelper::loadHeader($page_title);
?>

<div class="mb-3">
    <label for="email" class="form-label">Email Address</label>
    <input type="email" class="form-control" id="email" name="email" required>
</div>

<div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
    <div class="form-text">
        Password must be at least 8 characters long and contain at least one number.
    </div>
</div>

<div class="mb-3">
    <label for="confirm_password" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
</div>


<input type="hidden" name="role" value="customer">
<div class="d-grid gap-2">
    <button type="submit" class="btn btn-primary" id="register-btn">Register</button>
</div>
</form>
</div>
</div>

<div class="col-5">

    <div class="mt-3 text-center">
        <button id="login-btn">
            <p>Already Registered? <a href="login">Login here</a></p>
        </button>

    </div>
    <div>
        <!-- //TODO:add image placeholder -->
        <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor vero iure illo culpa debitis eaque placeat, vel voluptatibus animi odit voluptatum temporibus molestiae deserunt inventore velit veritatis consectetur esse provident! Facere odio voluptatem maiores, mollitia officiis nihil suscipit eius deserunt obcaecati sapiente temporibus expedita velit vel cupiditate sint? Eum, dolorem.
        </p>
    </div>

</div>
<!-- </div> -->
</div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
