<form class="login-section" method="POST" action="/miniproject/?controller=user&action=postLogin">
    <div class="login-form">
        <p>ACCOUNT - SIGN IN</p>
        <?php
        if(isset($_GET["error"])) {
            echo "<div class='error'>".$_GET['error']."</div>";
        }
            
        ?>
        <div class="text">Email Address</div>
        <input required type="email" class="email" name="email">
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