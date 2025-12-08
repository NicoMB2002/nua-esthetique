<?php

use App\Helpers\ViewHelper;

$page_title = $data['title'] ?? "register Email";

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
        <form action="register" method="post">
                <div class="input-row">
                <label for="username" class="form-label" id="register-email-label"><i class="bi bi-envelope-at icon-color"></i></label>
                <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
            </div>
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

<style>
    body {
    background: #f0dfcf;
    font-family: Arial, sans-serif;
    padding: 20px;
}

/* Two-column layout wrapper */
.row-custom {
    display: flex;
    justify-content: center;
    gap: 40px;
    flex-wrap: wrap;
}

/* Left column (form) */
.left-column {
    flex: 1;
    min-width: 320px;
}

/* Right column (text + login) */
.right-column {
    flex: 1;
    min-width: 280px;
}

/* Input rows with icons */
.input-row {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
}

/* Black icon boxes */
.input-row .icon-label {
    background: #000;
    color: #fff;
    width: 45px;
    height: 45px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 8px 0 0 8px;
    font-size: 20px;
    user-select: none;
}


#register-email-label,
#register-password-label, #confirm-password-label {
    background: #000;
    color: #fff;
    padding: 12px 16px;
    border-radius: 8px 0 0 8px;
    font-size: 16px;
    font-weight: 600;
    width: 70px;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Inputs */
.input-row input,
.input-row select {
    flex: 1;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 0 8px 8px 0;
    font-size: 15px;
    outline: none;
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

.input-row input:focus,
.input-row select:focus {
    border-color: #c7a98e;
    box-shadow: 0 0 4px rgba(199, 169, 142, 0.4);
}

/* Button styling */
#register-btn,
#register-login-btn {
    width: 100%;
    padding: 14px 0;
    background-color: #d8b89c;
    border: none;
    border-radius: 8px;
    color: white;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.2s ease;
}
#register-login-text{
    color: white;
}

#register-btn:hover,
#login-btn:hover {
    background-color: #c7a98e;
}

#register-btn:active,
#login-btn:active {
    background-color: #b7967f;
}

/* Login button inside text column */
.right-column #login-btn {
    margin-bottom: 20px;
}

fieldset {
    border: 1px solid #ddd;
    padding: 15px 20px;
    border-radius: 8px;
    margin-bottom: 20px;
}
legend {
    font-weight: 600;
    padding: 0 5px;
}

</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
