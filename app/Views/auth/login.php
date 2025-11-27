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
                    <!-- //TODO:add image instead of paragraph place holder -->
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, cupiditate quod enim nisi ipsa praesentium labore nihil alias consectetur consequuntur molestiae dolor esse accusantium provident necessitatibus error facilis nam quisquam in velit asperiores beatae ullam? Officiis hic blanditiis assumenda doloribus, molestiae totam amet, molestias magnam vitae repudiandae eaque necessitatibus illo.</p>

                </div>

            </div>

            <div class="col-7">
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
                    <p class="fs-6 text-decoration-underline text-center">Don't have an account? <a href="register" class="fw-bold" id="register-link">Register here</a></p>
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

