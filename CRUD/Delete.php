<?php
namespace CRUD;

class Delete
{
    function deleteTask($id) {
        global $conn;
    
        $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ?");
        $stmt->bind_param("i", $id);
    
        if ($stmt->execute() === TRUE) {
            echo "Задача успешно удалена";
        } else {
            echo "Ошибка удаления задачи: " . $conn->error;
        }
    }
}