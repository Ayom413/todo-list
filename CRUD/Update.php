<?php
namespace CRUD;

class Update {
    function updateTask($id, $title, $description, $status) {
        global $conn;

        $sql = "UPDATE tasks SET ";
        $params = array();
        $types = "";

        if (!empty($title)) {
            $sql .= "title=?, ";
            $types .= "s";
            $params[] = $title;
        }

        if (!empty($description)) {
            $sql .= "description=?, ";
            $types .= "s";
            $params[] = $description;
        }

        $sql .= "status=? WHERE id=?";
        $types .= "si";
        $params[] = $status;
        $params[] = $id;

        $stmt = $conn->prepare($sql);
        $stmt->bind_param($types, ...$params);

        if ($stmt->execute()) {
            echo "Задача успешно обновлена";
        } else {
            echo "Ошибка обновления задачи: " . $conn->error;
        }
    }
}