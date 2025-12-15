<?php

use App\Helpers\FlashMessage;
use App\Helpers\ViewHelper;

$page_title = 'Home';
ViewHelper::loadHeader($page_title);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-5">
            <!-- TODO:put image from db -->
            <div id="login-image">
                <img src="<?= APP_BASE_URL?>/public/assets/resources/images/NuaLogin.png" alt="NuaClient" width="400" height="600">
            </div>

        </div>

        <div class="col-7">
            <form action="login" method="POST">
                <div id="input-row-identifier">
                    <label id="identifier-label"><i class="bi bi-envelope-at icon-color"></i></label>
                    <input
                        type="text"
                        id="identifier"
                        name="identifier"
                        placeholder="email@example.com"
                        required>
                </div>
                <div id="input-row-password">
                    <label id="password-label"><i class="bi bi-lock-fill icon-color"></i></label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Password"
                        required>
                </div>
                <button type="submit" id="login-btn">
                    Login
                </button>
            </form>
            <br>
            <div>
                <p class="fs-6 text-decoration-underline">Don't have an account? <a href="register" class="fw-bold" id="register-link">Register here</a></p>
            </div>
        </div>
        <!-- closes form(left side) -->
    </div>

</div>

<style>
    body {
        font-family: "Raleway", sans-serif;
        background-color: #F9F3EF;
        font-weight: 400;
    }

    #input-row-identifier,
    #input-row-password {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    #identifier-label,
    #password-label {
        background: #000;
        color: #fff;
        padding: 12px 16px;
        border-radius: 8px 0 0 8px;
        font-size: 16px;
        font-weight: 600;
        width: 60px;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #identifier,
    #password {
        flex: 1;
        padding: 12px 14px;
        border: 1px solid #ccc;
        border-radius: 0 8px 8px 0;
        outline: none;
        font-size: 15px;
        transition: all 0.2s ease;
    }

    #identifier:focus,
    #password:focus {
        border-color: #c7a98e;
        box-shadow: 0 0 4px rgba(199, 169, 142, 0.4);
    }

    #login-btn {
        width: 100%;
        padding: 14px 0;
        border: none;
        border-radius: 8px;
        background-color: #d8b89c;
        color: white;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s ease-in-out;
    }

    #login-btn:hover {
        background-color: #c7a98e;
    }

    #login-btn:active {
        background-color: #b7967f;
    }

    #login-image {
        margin-bottom: 20px;
    }

    #register-link {
        color: black;
    }

    .icon-color {
        color: white
    }
</style>
<?= FlashMessage::render() ?>
<?php
ViewHelper::loadJsScripts();
ViewHelper::loadFooter();
?>
