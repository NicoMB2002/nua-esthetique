<?php

use App\Helpers\ViewHelper;

$page_title = $data['title'];
ViewHelper::loadHeader($page_title);
?>
<div class="container mt-5">
    <div class="row-custom">

        <div class="left-column">
            <form method="POST" action="registerEmail">

                <div class="input-row">
                    <div class="icon-label">👤</div>
                    <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
                </div>

                <div class="input-row">
                    <div class="icon-label">👤</div>
                    <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
                </div>

                <div class="input-row">
                    <div class="icon-label">📅</div>
                    <input type="date" id="birth-date" name="birth-date" required>
                </div>

                <div class="input-row">
                    <div class="icon-label">⚧</div>
                    <select name="gender" id="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <fieldset>
                    <legend>Address</legend>

                    <div class="input-row">
                        <div class="icon-label">📞</div>
                        <input type="text" id="phone" name="phone" placeholder="Phone N.">
                    </div>

                    <div class="input-row">
                        <div class="icon-label">🏠</div>
                        <input type="text" id="street-number" name="street-number" placeholder="Street N.">
                    </div>

                    <div class="input-row">
                        <div class="icon-label">🏠</div>
                        <input type="text" id="street" name="street-name" placeholder="Street Name">
                    </div>

                    <div class="input-row">
                        <div class="icon-label">🏢</div>
                        <input type="text" id="city" name="city" placeholder="City">
                    </div>

                    <div class="input-row">
                        <div class="icon-label">🗺️</div>
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

                    <div class="input-row">
                        <div class="icon-label">📍</div>
                        <input type="text" id="postal-code" name="postal-code" placeholder="Postal Code">
                    </div>

                </fieldset>

                <input type="hidden" name="role" value="customer">

                <button type="submit" class="btn" id="register-btn">Register</button>
            </form>
        </div>

        <!-- Right Column: Text + Login -->
        <div class="right-column">
            <button id="register-login-btn">
                <p>Already Registered? <a href="login">Login here</a></p>
            </button>

            <!-- Placeholder text / image -->
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor vero iure illo culpa debitis eaque placeat, vel voluptatibus animi odit voluptatum temporibus molestiae deserunt inventore velit veritatis consectetur esse provident!
            </p>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
