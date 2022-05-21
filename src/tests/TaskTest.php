<?php





class TaskTest extends \PHPUnit\Framework\TestCase
{




    public function testCreate()
    {
        date_default_timezone_set('Asia/Manila');
        $d = new DateTime();
        $epoch =  $d->format("Y-m-d H:i:s.v");

        $database = new \App\config\Database();
        $db = $database->dbConnection();
        $task = new \App\Models\Task($db);

        $task->id = $task->GUID();
        $task->title = 'Title2';
        $task->completed = 0;
        $task->created = $epoch;
        $result = $task->createTask();

        $this->assertEquals(true, $result);
    }
}