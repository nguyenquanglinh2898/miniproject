<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./resources/font-awsome/all.min.css">
    <link rel="stylesheet" href="./CSS/style.css">

    <title>Mini-project</title>
</head>
<body>
    <div class="header-menu" id="nav-menu">
        <div class="main-menu">
            <div class="left-menu">
                <div class="menu-layer1">
                    <button id="tle" class="dropbtn">Shop</button>
                    <div class="menu-layer2" id="drop-down">
                        <ul>
                            <li>
                                <a href="#">
                                    <p>ALL BOOK</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <p>DENIM</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <p>CARGOS</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <p>SHORTS</p>
                                </a>

                            </li>
                            <li>
                                <a href="#">
                                    <p>OUTERWEAR</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <p>TOP</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- <a href="#">About</a> -->
            </div>
            <div class="logo-middle">
                <a href="#" class="logo">k n o w l e d g e</a>
            </div>
            <div class="right-menu">
                <div><a href="Login">My Account</a></div>
            </div>
        </div>
    </div>

    <?php
        include_once "./views/pages/".$data["main"].".view.php";
    ?>
<!-- 
<form class="login-section">
    <div class="login-form">
        <p>ACCOUNT - SIGN IN</p>
        <div class="text">Email Address</div>
        <input required type="email" class="email">
        <div class="text">Password</div>
        <input type="password" class="_password">
        <a href="#">I forgot my password</a>
        <button class="btn-submit" type="submit" name="submit">SIGN IN</button>
        <div class="account-alr">
            <span>Don't have an account?</span>
            <a href="/register.html">Sign up</a>
        </div>
    </div>
</form> -->
    

    <script src="./components/all.js"></script>
</body>
</html>