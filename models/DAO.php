<?php

class DAO{
    public $conn = null;
    
    public function __construct(){
        $servername = "localhost";
        $database = "miniproject";
        $username = "quydang1";
        $password = "1234";
        $this->conn = mysqli_connect($servername, $username, $password, $database);
    }
}