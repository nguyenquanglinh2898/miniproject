<?php

require_once('./models/User.php');

class UserController {
    private $model;

    function __construct() {
        $this->model = new User();
    }

    function viewLogin() {
        if(isset($_COOKIE["emailUser"]) && isset($_COOKIE["passwordUser"])) {
            header("Location: /miniproject/?controller=user&action=postLogin");
            exit();
        }
        
        $data = array( "main" => "Login");
        require_once "./views/Layout.view.php";
    }

    function viewRegister() {
        $data = array( "main" => "Register");
        require_once "./views/Layout.view.php";
    }

    function postLogin() {
        if(isset($_POST["submit-login"]) || isset($_COOKIE["emailUser"]) && isset($_COOKIE["passwordUser"])) {
            $flagCookies = false;
            if(isset($_COOKIE["emailUser"]) && isset($_COOKIE["passwordUser"])){
                $email = $_COOKIE["emailUser"];
                $password = $_COOKIE["passwordUser"];
                $flagCookies = true;
            } else {
                $email = $this->validateInput($_POST["email"]);
                $password = $this->validateInput($_POST["password"]);
            }
            if(empty($email) || empty($password)){
                header("Location: /miniproject/?controller=user&action=viewLogin&error=empty-fields&email=".$email);
                exit();
            } else {
                $user =  $this->model->userLogin($email);
                if(empty($user)) {
                    if($flagCookies) {
                        setcookie("emailUser", "", time() - 86400);
                        setcookie("passwordUser", "", time() - 86400);
                        setcookie("emailUser", "", time() - 86400, "/");
                        setcookie("passwordUser", "", time() - 86400, "/");
                        header("Location: /miniproject/?controller=user&action=viewLogin");
                        exit();
                    }

                    header("Location: /miniproject/?controller=user&action=viewLogin&error=not-found");
                    exit();
                }
                if(!$flagCookies) {
                    $passwordCheck = password_verify($password, $user["passwordUser"]);
                } else {
                    $passwordCheck = ($user["passwordUser"] == $password) ? true : false;
                }
                if($passwordCheck == false) {
                    header("Location: /miniproject/?controller=user&action=viewLogin&error=wrongPassword");
                    exit();
                } else if ($passwordCheck == true) {

                    $_SESSION["emailUser"] = $user["emailUser"];
                    $_SESSION["username"] = $user["uidUser"];

                    if(isset($_POST["remember"])) {
                        setcookie("emailUser", $user["emailUser"], time() + 86400, "/");
                        setcookie("passwordUser", $user["passwordUser"], time() + 86400, "/");
                    }
                    

                    header("Location: /miniproject/?controller=book&action=getAll");
                    exit();
                }
            }
        } else {
            header("Location: /miniproject/?controller=user&action=viewLogin");
            exit();
        }
        
    }

    function postLogOut() {

        session_destroy();

        if(isset($_COOKIE["emailUser"]) && isset($_COOKIE["passwordUser"])){
            setcookie("emailUser", "", time() - 86400, "/");
            setcookie("passwordUser", "", time() - 86400, "/");
        }

        header("Location: /miniproject/?controller=user&action=viewLogin");
        exit();
    }


    function validateInput($data) {
        $data = trim($data);
        $data = stripslashes($data);    
        $data = htmlspecialchars($data);
        return $data;
      }

    function postRegister() {
        if(isset($_POST["signup-submit"])){
            $username = $_POST["username"];
            $email = $this->validateInput($_POST["email"]);
            $password = $this->validateInput($_POST["password"]);
            $rePassword = $this->validateInput($_POST["re-password"]);

            if(empty($username) || empty($email) || empty($password) || empty($rePassword)) {
                header("Location: /miniproject/?controller=user&action=viewRegister&error=empty-fields&username=".$username."&email=".$email);
                exit();
            }
            else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: /miniproject/?controller=user&action=viewRegister&error=invalid-email&username=".$username);
                exit();
            }
            else if($password !== $rePassword) {
                header("Location: /miniproject/?controller=user&action=viewRegister&error=password-check&username=".$username."&email=".$email);
                exit();
            }
            else {
                $state = $this->model->userRegister($username, $email, $password);
                if(is_string($state)) {
                    header("Location: /miniproject/?controller=user&action=viewRegister&error=email-taken&username=".$username."&email=".$email);
                    exit();
                } else if($state) {
                    header("Location: /miniproject/?controller=user&action=postLogin");
                    exit();
                }

            }
        } else {
            header("Location: /miniproject/?controller=user&action=viewRegister");
            exit();
        }
        
    }

    

}
?>