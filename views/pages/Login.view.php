<form class="login-section" method="POST" action="/miniproject/?controller=user&action=postLogin">
    <div class="login-form">
        <p>ACCOUNT - SIGN IN</p>
        <?php
        if(isset($_GET["error"])) {
            if($_GET["error"] == "empty-fields") {
                echo "<div class='requireText'>Please enter all fields</div>";
            } else {
                echo "<div class='requireText'>Please enter a correct username and password. Note that both fields may be case-sensitive.</div>";
            }
        }
            
        ?>
        <div class="text first">Email Address</div>
        <input required type="email" class="email" name="email" value="<?php
            if(!empty($_GET["email"])) {
                echo $_GET["email"];
            }
        ?>">
        <div class="text">Password</div>
        <input type="password" class="_password" name="password">
        <div class="remember-me">
            <input type="checkbox" name="remember" id="remember">
            <label for="remember" >Remember me</label>
        </div>
        <button class="btn-submit" type="submit" name="submit-login">SIGN IN</button>
        <div class="account-alr">
            <span>Don't have an account?</span>
            <a href="/miniproject/?controller=user&action=viewRegister">Sign up</a>
        </div>
    </div>
</form>