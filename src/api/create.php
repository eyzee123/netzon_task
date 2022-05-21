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
// $item->getConnection($db);
$data = json_decode(file_get_contents("php://input"));

date_default_timezone_set('Asia/Manila');
$d = new DateTime();
$epoch =  $d->format("Y-m-d H:i:s.v");
$task = "Title2";



// $item->id = $data->id;
// $item->title = $data->title;
// $item->completed = $data->completed;
// $item->created = $data->created;

$item->id = GUID();
$item->title = $task;
$item->completed = 0;
$item->created = $epoch;


if ($item->createTask()) {
    echo 'success';
} else {
    echo 'error';
}


function GUID()
{
    if (function_exists('com_create_guid') === true) {
        return trim(com_create_guid(), '{}');
    }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}