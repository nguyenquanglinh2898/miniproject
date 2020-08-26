<form class="login-section" action="/miniproject/?controller=user&action=postRegister" method="POST">
    <div class="login-form">
        <p>ACCOUNT - SIGN UP</p>
        <?php #if(true) { echo "<div class='requireText'>Name is require</div>"; }
            if(isset($_GET["error"])) {
                if($_GET["error"] == "empty-fields") {
                    if(empty($_GET["username"]) && empty($_GET["email"])) {
                        echo "<div class='requireText'>Please fill in all fields</div>";
                    } else if(empty($_GET["username"])) {
                        echo "<div class='requireText'>Username is require</div>";
                    } else if(empty($_GET["email"])) {
                        echo "<div class='requireText'>Email is require</div>";
                    }
                } else if($_GET["error"] == "invalid-email") {
                    echo "<div class='requireText'>Invalid email</div>";
                } else if($_GET["error"] == "email-taken") {
                    echo "<div class='requireText'>Your email has been taken</div>";
                } else if($_GET["error"] == "password-check") {
                    echo "<div class='requireText'>Passwords do not match</div>";
                }
            }
        ?>
        <!-- <div class="text">User Name</div>
        <input type="text" class="email" name="username"> -->
        <div class="text first">User Name</div>
        <input type="text" name="username" class="<?php
            echo "email ";
            if(isset($_GET["error"])) {
                if( empty($_GET["username"])) {
                    echo "require";
                }
            }
            
        ?>" value="<?php 
            if(!empty($_GET["username"])){
                echo $_GET["username"];
            }
        ?>">
        <div class="text">Email Address</div>
        <input type="email" name="email" class="<?php
            echo "email ";
            if(isset($_GET["error"])) {
                if( empty($_GET["email"])) {
                    echo "require";
                }
            }
        ?>" value="<?php 
            if(!empty($_GET["email"])){
                echo $_GET["email"];
            }
        ?>">
        <div class="text">Password</div>
        <input type="password" name="password" class="<?php
            echo "email ";
            if(isset($_GET["error"])) {
                if($_GET["error"] == "password-check") {
                    echo "require";
                }
            }
        ?>">
        <div class="text">Repeat Password</div>
        <input type="password" name="re-password" class="<?php
            echo "email ";
            if(isset($_GET["error"])) {
                if($_GET["error"] == "password-check") {
                    echo "require";
                }
            }
        ?>">
        <button class="btn-submit" type="submit" name="signup-submit">SIGN UP</button>
        <div class="account-alr">
            <div>Already have an account?</div>
            <a href="/miniproject/?controller=user&action=viewLogin">Sign in</a>
        </div>
    </div>
</form>