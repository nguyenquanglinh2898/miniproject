<?php
class UserController {

    function __construct() {
        // Check cookie only
    }

    function viewLogin() {
        // Check cookie only
        $data = array( "Login" => "Login");
        require_once "./views/Layout.view.php";
    }

    function postLogin() {
        echo $$_POST["email"];
        // Login successful
        // 1. Set sessions
        $_SESSION["LoginValidate"] = true;
        $_SESSION["Hello"] = "Hello";
        $_SESSION["Hi"] = "Hi";
        print_r($_SESSION);
        // 2. If remember me is true
        // -> set cookies
        // Login fail -> error message
    }

    function postLogOut() {
        // Xoa sessions
        // Xoa cookies
    }
}
?>