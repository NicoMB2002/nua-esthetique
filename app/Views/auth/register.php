<?php

use App\Helpers\FlashMessage;
use App\Helpers\ViewHelper;

$page_title = $data['title'];
ViewHelper::loadHeader($page_title);
?>

<?= FlashMessage::render() ?>
<div class="container mt-5">
    <div class="row-custom">

        <!-- Left Column: Form -->
        <div class="left-column">
            <form method="POST" action="register">

                <fieldset>
                    <legend>
                        User
                    </legend>
                    <!-- First Name -->
                    <div class="input-row">
                        <div class="icon-label"><i class="bi bi-person-circle icon-color"></i></div>
                        <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
                    </div>

                    <!-- Last Name -->
                    <div class="input-row">
                        <div class="icon-label"><i class="bi bi-person-circle icon-color"></i></div>
                        <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
                    </div>

                    <!-- Date of Birth -->
                    <div class="input-row">
                        <div class="icon-label"><i class="bi bi-calendar-day icon-color"></i></div>
                        <input type="date" id="birth-date" name="birth-date" required>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Address</legend>

                    <!-- Phone -->
                    <div class="input-row">
                        <div class="icon-label"><i class="bi bi-telephone icon-color"></i></div>
                        <input type="text" id="phone" name="phone" placeholder="Phone N.">
                    </div>

                    <!-- Street Address -->
                    <div class="input-row">
                        <div class="icon-label"><i class="bi bi-house-door icon-color"></i></div>
                        <input type="text" id="street-address" name="street-address" placeholder="Street Address">
                    </div>


                    <div class="input-row">
                        <div class="icon-label"><i class="bi bi-house-door icon-color"></i></div>
                        <input type="text" id="postal_code" name="postal_code" placeholder="Postal Code">
                    </div>

                    <!-- City -->
                    <div class="input-row">
                        <div class="icon-label"><i class="bi bi-buildings icon-color"></i></div>
                        <input type="text" id="city" name="city" placeholder="City">
                    </div>

                    <!-- Province -->
                    <div class="input-row">
                        <div class="icon-label"><i class="bi bi-pin-map-fill icon-color"></i></div>
                        <select name="province" id="province">
                            <option value="">-- Select Province/Territory --</option>
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
            </fieldset>

            <br>
            <hr>
            <button id="register-login-btn">
                <p>Already Registered? <a id="register-login-text" href="login">Login here</a></p>
            </button>

            </form>

        </div>

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
    #register-password-label,
    #confirm-password-label {
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

    #register-login-text {
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
