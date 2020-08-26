<?php

class DAO{
    public $conn = null;
    
    public function __construct(){
        $servername = "localhost";
        $database = "book_management";
        $username = "root";
        $password = "@linh2898C";
        $this->conn = mysqli_connect($servername, $username, $password, $database);
    }
}