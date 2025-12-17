<?php

use App\Helpers\FlashMessage;
use App\Helpers\ViewHelper;

$page_title = $data['title'];
ViewHelper::loadHeader($page_title);
?>

<?= FlashMessage::render() ?>
<div class="container mt-5">
    <div class="row-custom">

        <!-- Left Side: Form -->
        <div class="left-column">
            <form method="POST" action="register">

                <fieldset>
                    <legend>
                        User
                    </legend>
                    <!-- firstName -->
                    <div class="input-row">
                        <div class="icon-label"><i class="bi bi-person-circle icon-color"></i></div>
                        <input type="text" id="first_name" name="first_name" placeholder=" <?= hs(trans('register.fName')); ?>" required>
                    </div>

                    <!-- lastName -->
                    <div class="input-row">
                        <div class="icon-label"><i class="bi bi-person-circle icon-color"></i></div>
                        <input type="text" id="last_name" name="last_name" placeholder="<?= hs(trans('register.lName')); ?>" required>
                    </div>

                    <!-- dob -->
                    <div class="input-row">
                        <div class="icon-label"><i class="bi bi-calendar-day icon-color"></i></div>
                        <input type="date" id="birth-date" name="birth-date" required>
                    </div>
                </fieldset>
                <fieldset>
                    <legend><?= hs(trans('register.address')); ?></legend>

                    <!-- phone -->
                    <div class="input-row">
                        <div class="icon-label"><i class="bi bi-telephone icon-color"></i></div>
                        <input type="text" id="phone" name="phone" placeholder="<?= hs(trans('register.phone')); ?>">
                    </div>

                    <!-- streetAddress -->
                    <div class="input-row">
                        <div class="icon-label"><i class="bi bi-house-door icon-color"></i></div>
                        <input type="text" id="street-address" name="street-address" placeholder="<?= hs(trans('register.address')); ?>">
                    </div>


                    <div class="input-row">
                        <div class="icon-label"><i class="bi bi-house-door icon-color"></i></div>
                        <input type="text" id="postal_code" name="postal_code" placeholder="Postal Code">
                    </div>

                    <!-- icty -->
                    <div class="input-row">
                        <div class="icon-label"><i class="bi bi-buildings icon-color"></i></div>
                        <input type="text" id="city" name="city" placeholder="<?= hs(trans('register.city')); ?>">
                    </div>

                    <!-- province -->
                    <div class="input-row">
                        <div class="icon-label"><i class="bi bi-pin-map-fill icon-color"></i></div>
                        <select name="province" id="province">
                            <option value="">-<?= hs(trans('register.provinceSelect')); ?>--</option>
                            <option value="AB">Alberta</option>
                            <option value="BC">British Columbia</option>
                            <option value="MB">Manitoba</option>
                            <option value="NB">New Brunswick</option>
                            <option value="NL">Newfoundland and Labrador</option>
                            <option value="NS">Nova Scotia</option>
                            <option value="NT">Northwest Territories</option>
                            <option value="NU">Nunavut</option>
                            <option value="ON">Ontario</option>
                            <option value="PE">Prince Edward Island</option>
                            <option value="QC">Québec</option>
                            <option value="SK">Saskatchewan</option>
                            <option value="YT">Yukon</option>
                        </select>
                    </div>
                </fieldset>

                <input type="hidden" name="role" value="customer">



        </div>

        <!-- Right Column: Text + Login -->
        <div class="right-column">
            <fieldset>
                <legend>
                    User Info
                </legend>
                <div class="input-row">
                    <label for="username" class="form-label" id="register-email-label"><i class="bi bi-envelope-at icon-color"></i></label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="<?= hs(trans('register.userName')); ?>" required>
                </div>
                <div class="input-row">
                    <label for="email" class="form-label" id="register-email-label"><i class="bi bi-envelope-at icon-color"></i></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" required>
                </div>

                <div class="input-row">
                    <label for="password" class="form-label" id="register-password-label"><i class="bi bi-lock-fill icon-color"></i></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="<?= hs(trans('register.password')); ?>" required>
                </div>

                <div class="input-row">
                    <label for="confirm_password" class="form-label" id="confirm-password-label"><i class="bi bi-lock-fill icon-color"></i></label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="<?= hs(trans('register.confirmPassword')); ?>" required>
                </div>
                <input type="hidden" name="role" value="customer">
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary" id="register-btn"><?= hs(trans('register.startShoppingBtn')); ?></button>
            </fieldset>

            <br>
            <hr>
            <button id="register-login-btn">
                <p><?= hs(trans('register.alreadyRegistered')); ?><a id="register-login-text" href="login"><?= hs(trans('register.loginLink')); ?></a></p>
            </button>

            </form>

        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>
