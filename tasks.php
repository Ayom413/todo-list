<?php
require_once('CRUD/Create.php');
require_once('CRUD/Delete.php');
require_once('CRUD/Update.php');
require_once('CRUD/Read.php');
require_once('config.php');

use CRUD\Create;
use CRUD\Delete;
use CRUD\Update;
use CRUD\Read;

$create = new Create();
$delete = new Delete();
$update = new Update();
$read = new Read();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $read->getTasks();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["title"]) && isset($_POST["description"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $create->createTask($title, $description);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["task_id"]) && isset($_POST["action"])) {
    $id = $_POST["task_id"];
    if($_POST["action"] === "edit" && isset($_POST["edit_status"])) {
        $title = isset($_POST["edit_title"]) ? $_POST["edit_title"] : '';
        $description = isset($_POST["edit_description"]) ? $_POST["edit_description"] : '';
        $status = $_POST["edit_status"];
        $update->updateTask($id, $title, $description, $status);
    }

    if($_POST["action"] === "delete") {
        $delete->deleteTask($id);
    }
}