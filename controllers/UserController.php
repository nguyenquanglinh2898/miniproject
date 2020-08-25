<?php

require_once('./models/User.php');

class UserController {
    private $model;

    function __construct() {
        // Check cookie only
        $this->model = new User();
    }

    function viewLogin() {
        // die("Cay vc");
        // Check cookie only
        // echo isset($_SESSION["emailUser"]);
        // echo $_SESSION["username"];
        if(isset($_COOKIE["emailUser"]) && isset($_COOKIE["passwordUser"])) {
            header("Location: /miniproject/?controller=user&action=postLogin");
            exit();
        }
        
        
        $data = array( "main" => "Login");
        require_once "./views/Layout.view.php";
    }

    function viewRegister() {
        // Check cookie only
        $data = array( "main" => "Register");
        require_once "./views/Layout.view.php";
    }

    function postLogin() {
        // Login successful
        // 1. Set sessions
        // $_SESSION["LoginValidate"] = true;
        // print_r($_SESSION);
        // 2. If remember me is true
        // -> set cookies
        // Login fail -> error message

        // Start code
        // Sua code
        $flag = false;
        if(isset($_COOKIE["emailUser"]) && isset($_COOKIE["passwordUser"])){
            $email = $_COOKIE["emailUser"];
            $password = $_COOKIE["passwordUser"];
            $flag = true;
            // die("Unknown1");
        } else {
            $email = $this->validateInput($_POST["email"]);
            $password = $this->validateInput($_POST["password"]);
        }
        if(empty($email) || empty($password)){
            header("Location: /miniproject/?controller=user&action=viewLogin&error=empty-fields");
            exit();
        } else {
            $user =  $this->model->userLogin($email);
            // echo password_hash($user["passwordUser"], PASSWORD_DEFAULT);
            // echo $user["passwordUser"];
            // echo "<pre>";
            // print_r($user);
            // echo"</pre>";
            if(!$flag) {
                $passwordCheck = password_verify($password, $user["passwordUser"]);
            } else {
                $passwordCheck = ($user["passwordUser"] == $password) ? true : false;
            }
            // $passwordCheck = password_verify($password, $user["passwordUser"]);
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
        $username = $this->validateInput($_POST["username"]);
        $email = $this->validateInput($_POST["email"]);
        $password = $this->validateInput($_POST["password"]);
        $rePassword = $this->validateInput($_POST["re-password"]);

        if(empty($username) || empty($email) || empty($password) || empty($rePassword)) {
            header("Location: /miniproject/?controller=user&action=viewRegister&error=empty-fields&username=".$username."&email=".$email);
            exit();
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: /miniproject/?controller=user&action=viewRegister&error=invalid");
            exit();
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: /miniproject/?controller=user&action=viewRegister&error=invalid-email&username=".$username);
            exit();
        }
        else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: /miniproject/?controller=user&action=viewRegister&error=invalid-username&email=".$email);
            exit();
        }
        else if($password !== $rePassword) {
            header("Location: /miniproject/?controller=user&action=viewRegister&error=password-check&username=".$username."&email=".$email);
            exit();
        }
        else {
            if(!empty($this->model->getUser($username))) {
                header("Location: /miniproject/?controller=user&action=viewRegister&error=user-taken&email=".$email);
                exit();
            }

        }
    }

    

}
?>