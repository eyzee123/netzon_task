<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once '../config/database.php';
    include_once '../Models/Task.php';
    $database = new App\config\Database();
    $db = $database->dbConnection();
    $item = new App\Models\Task($db);

    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
  
    $item->getSingleTask();
    if($item->title != null){
        // create array
        $taskArr = array(
            "id" =>  $item->id,
            "title" => $item->title,
            "completed" => $item->completed,
            "created" => $item->created,
         
        );
      
        http_response_code(200);
        echo json_encode($taskArr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Task not found.");
    }
?>