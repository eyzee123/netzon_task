<?php

namespace App\config;

use mysqli;


class Database
{
    private $host = "db";
    private $database_name = "exam_task";
    private $username = "root";
    private $password = "example";
    private $port = "8080";
    public $mysqli;


    // private $host = "127.0.0.1";
    // private $database_name = "exam_task";
    // private $username = "root";
    // private $password = "";
    // private $port = "3306";
    // public $mysqli;




    public function dbConnection()
    {


        $this->conn = null;
        // try {
        //     $this->conn = new PDO("mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->database_name, $this->username, $this->password);
        //     $this->conn->exec("set names utf8");
        // } catch (PDOException $exception) {
        //     echo "Connection error: " . $exception->getMessage();
        // }
        // return $this->conn;
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database_name);

        //Checking if any error occured while connecting

        if ($this->conn->connect_error) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            die();
        }

        return $this->conn;
    }
}