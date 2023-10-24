<?php
namespace CRUD;

class Read {
    function getTasks() {
        global $conn;
        $sql = "SELECT * FROM tasks";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "ID: " . $row["id"]. " Заголовок: " . $row["title"]. " Описание: " . $row["description"]. " Статус: " . $row["status"]. "<br>";
            }
        } else {
            echo "Список задач пуст";
        }
    }
}