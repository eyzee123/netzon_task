<?php

namespace App\Models;

class Task
{
    private $db_table = "task";
    private $conn;
    public $id;
    public $title;
    public $completed;
    public $created;




    public function __construct($db)
    {

        $this->conn = $db;
    }



    public function getTasks()
    {

        $sqlQuery = "Select * from " . $this->db_table;
        $result = $this->conn->query($sqlQuery);
        return $result;
    }

    public function getSingleTask()
    {
        $sqlQuery = "SELECT
                   *
                  FROM
                    " . $this->db_table . "
                WHERE 
                   id = '$this->id'
                 LIMIT 0,1";



        $result = $this->conn->query($sqlQuery);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $this->id = $row['id'];
                $this->title = $row['title'];
                $this->completed = $row['completed'];
                $this->created = $row['created'];
            }
        } else {
            echo "0 results";
        }
        $this->conn->close();
    }


    public function createTask()
    {
        $sqlQuery = "INSERT INTO
        " . $this->db_table . "
   (id, title, completed,created) values ('$this->id', '$this->title','$this->completed','$this->created')";

        $query = $this->conn->query($sqlQuery);

        return $query;

        $this->conn->close();
    }





    function deleteSingleTask()
    {
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = '$this->id'";

        if ($this->conn->query($sqlQuery) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    function GUID()
    {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }
}