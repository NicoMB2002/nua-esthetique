<?php

use App\Helpers\ViewHelper;

$page_title = $data['title'];
ViewHelper::loadHeader($page_title);
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Create Account</h3>
                </div>
                <!-- <div class="card-body"> -->
                <?= App\Helpers\FlashMessage::render() ?>

                <div class="row-justify-content-center">
                    <div class="col-7">
                        <form method="POST" action="register">
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" required>
                            </div>

                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" required>
                            </div>

                            <div class="mb-3">
                                <label for="birth-date" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="birth-date" name="birth-date" required>
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select name="gender" id="gender">
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <hr>
                            <fieldset>
                                <legend>Address</legend>
                                <label for="street">Street:</label>
                                <input type="text" id="street" name="street" /><br /><br />
                                <label for="city">City:</label>
                                <input type="text" id="city" name="city" />
                            </fieldset>

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>

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
