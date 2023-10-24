<?php
namespace CRUD;

class Create 
{
    function createTask($title, $description) {
        global $conn;
        $created_at = date("Y-m-d H:i:s");
        $status = "В процессе";
    
        $stmt = $conn->prepare("INSERT INTO tasks (title, description, created_at, status) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title, $description, $created_at, $status);

        if ($stmt->execute() === TRUE) {
            echo "Задача успешно создана";
        } else {
            echo "Ошибка создания задачи: " . $conn->error;
        }
    }
}