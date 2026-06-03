<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';

    if (!empty($title)) {
        $stmt = $pdo->prepare('INSERT INTO tasks (title, description) VALUES (?, ?)');
        $stmt->execute([$title, $description]);
    }
}

header('Location: index.php');
exit;
?>