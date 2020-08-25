<?php
include_once('DAO.php');

class User extends DAO {
    private $id_user;
    private $uidUser;
    private $emailUser;
    private $passwordUser;

    function userRegister($email) {
        $sql = "SELECT uidUser FROM users WHERE emailUser=?";
        $stmt = mysqli_stmt_init($this->conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            $error = "Cant connect to database";
            return $error;
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $check = mysqli_stmt_num_rows($stmt);
            if($check > 0) {
                $error = "Email has been taken";
                return $error;
            }
        }
        // $users = $this->conn->query($sql);
        // if(!empty($users)) {
        //     foreach( $users as $user ){
        //         $user = new User();
        //         $user->setUsername($user["uidUser"]);
        //         $user->setEmail($user["emailUser"]);
        //         $user->setPassword($user["passwordUser"]);
        //     }
        //     return $user;
        // }
        // return null;
    }

    function userLogin($email) {
        $sql = "SELECT * FROM users WHERE emailUser=? ";
        $stmt = mysqli_stmt_init($this->conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            return false;
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)) {
                return $row;
            } else {
                return false;
            }
        }
    }

    function addUser($user) {
        // $sql = "INSERT INTO users (uidUser, emailUser, passwordUser) 
        //         VALUES ('{$user->getUsername()}', '{$user->getEmail()}', '{$user->getPassword()}')";
        // $this->conn->query($sql);

    }

    function getId() {
        return $this->id_user;
    }

    function getUsername() {
        return $this->id_user;
    }

    function getEmail() {
        return $this->emailUser;
    }

    function getPassword() {
        return $this->passwordUser;
    }

    function setId($id) {
        $this->id_user = $id;
    }

    function setUsername($username) {
        $this->uidUser = $username;
    }

    function setEmail($email) {
        $this->emailUser = $email;
    }

    function setPassword($password) {
        $this->passwordUser = $password;
    }
}