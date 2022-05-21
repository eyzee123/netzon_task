<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../Models/Task.php';
$database = new App\config\Database();
$db = $database->dbConnection();
$items = new App\Models\Task($db);
// $items->getConnection($db);
$stmt = $items->getTasks();
$itemCount = $stmt->num_rows;

if ($itemCount > 0) {

    $taskArr = array();
    $taskArr["body"] = array();
    $taskArr["itemCount"] = $itemCount;
    while ($row = mysqli_fetch_array($stmt)) {
        extract($row);
        $task = array(
            "id" => $id,
            "title" => $title,
            "completed" => $completed,
            "created" => $created
        );
        array_push($taskArr["body"], $task);
    }
    echo json_encode($taskArr);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}