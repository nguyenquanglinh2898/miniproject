<form class="login-section" action="/miniproject/?controller=user&action=postRegister" method="POST">
    <div class="login-form">
        <p>ACCOUNT - SIGN UP</p>
        <div class="text">User Name</div>
        <input type="text" class="email" name="username">
        <div class="text">Email Address</div>
        <input type="email" class="email" name="email">
        <div class="text">Password</div>
        <input type="password" class="email" name="password">
        <div class="text">Repeat Password</div>
        <input type="password" class="email" name="re-password">
        <button class="btn-submit" type="submit" name="signup-submit">SIGN UP</button>
        <div class="account-alr">
            <span>Already have an account?</span>
            <a href="/miniproject/?controller=user&action=viewLogin">Sign in</a>
        </div>
    </div>
</form>