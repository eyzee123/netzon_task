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

$data = json_decode(file_get_contents("php://input"));



// $item->id = $data->id;

$item->id = isset($_GET['id']) ? $_GET['id'] : die();

if ($item->deleteSingleTask()) {
    echo json_encode("Task deleted.");
} else {
    echo json_encode("Data could not be deleted");
}