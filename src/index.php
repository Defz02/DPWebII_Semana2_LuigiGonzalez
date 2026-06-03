<?php
require 'conexion.php';

// Leer los registros
$stmt = $pdo->query('SELECT * FROM tasks ORDER BY created_at DESC');
$tasks = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mini CRUD - Tareas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f4f4f9; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #333; color: white; }
        .btn-delete { color: red; text-decoration: none; font-weight: bold; }
        .form-container { background: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

    <h1>Gestión de Tareas (Mini CRUD)</h1>

    <div class="form-container">
        <h3>Agregar Nueva Tarea</h3>
        <form action="crear.php" method="POST">
            <input type="text" name="title" placeholder="Título de la tarea" required style="width: 100%; padding: 8px; margin-bottom: 10px;">
            <textarea name="description" placeholder="Descripción" style="width: 100%; padding: 8px; margin-bottom: 10px;"></textarea>
            <button type="submit" style="padding: 10px 15px; background: #28a745; color: white; border: none; cursor: pointer;">Guardar</button>
        </form>
    </div>

    <h2>Lista de Tareas</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= htmlspecialchars($task['id']) ?></td>
                    <td><?= htmlspecialchars($task['title']) ?></td>
                    <td><?= htmlspecialchars($task['description']) ?></td>
                    <td><?= htmlspecialchars($task['created_at']) ?></td>
                    <td>
                        <a class="btn-delete" href="eliminar.php?id=<?= $task['id'] ?>" onclick="return confirm('¿Seguro que deseas eliminar esta tarea?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>