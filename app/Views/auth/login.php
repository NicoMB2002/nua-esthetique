<?php

use App\Helpers\FlashMessage;
use App\Helpers\ViewHelper;
$page_title = 'Home';
ViewHelper::loadHeader($page_title);
?>

 <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <!-- TODO:put image from db -->
                <img src="" alt="lash-booking" id="login-image">
            </div>

            <div class="col-md-7">
                <form action="login" method="POST">
                    <div id="input-row-identifier">
                            <label id="identifier-label">✉️</label>
                            <input
                                type="text"
                                id="identifier"
                                name="identifier"
                                placeholder="email@example.com"
                                required>
                    </div>
                     <div id="input-row-password">
                            <label id="password-label">🔒</label>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="email@example.com"
                                required>
                    </div>
                    <button type="submit" id="login-btn">
                        Login
                    </button>
                </form>
                <div>
                    <p class="fs-6 text-decoration-underline text-center">Don't have an account? <a href="register" class="fs-5 fw-bold">Register here</a></p>
                </div>
            </div>
            <!-- closes form(left side) -->
        </div>

    </div>


<?= FlashMessage::render()?>
<?php
ViewHelper::loadJsScripts();
ViewHelper::loadFooter();
?>

