CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Datos iniciales opcionales
INSERT INTO tasks (title, description) VALUES 
('Aprender Docker', 'Configurar el entorno con docker-compose.'),
('Crear CRUD', 'Desarrollar la lógica en PHP para insertar y eliminar.');