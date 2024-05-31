-- Eliminar la base de datos si existe
DROP DATABASE IF EXISTS dashboardDB;

-- Crear base de datos
CREATE DATABASE dashboardDB;
USE dashboardDB;

-- Crear tabla de cargos
CREATE TABLE IF NOT EXISTS cargos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  cargo VARCHAR(100) NOT NULL
);

-- Crear tabla de empleados
CREATE TABLE IF NOT EXISTS empleados (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  apellido VARCHAR(100) NOT NULL,
  cargo_id INT,
  email VARCHAR(100) NOT NULL,
  telefono VARCHAR(9),
  fecha_contratacion DATE,
  FOREIGN KEY (cargo_id) REFERENCES cargos(id)
);

-- Crear tabla de usuarios
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  empleado_id INT,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  rol VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  FOREIGN KEY (empleado_id) REFERENCES empleados(id)
);

-- Crear tabla de asistencia
CREATE TABLE IF NOT EXISTS asistencia (
  id INT AUTO_INCREMENT PRIMARY KEY,
  empleado_id INT,
  fecha DATE NOT NULL,
  hora_entrada TIME NOT NULL,
  hora_salida TIME,
  FOREIGN KEY (empleado_id) REFERENCES empleados(id)
);

-- Insertar datos de ejemplo en la tabla de cargos
INSERT INTO cargos (cargo) VALUES
('cirujano'),
('odontologo'),
('farmacia'),
('limpieza'),
('enfermera');

-- Insertar datos de ejemplo en la tabla de empleados
INSERT INTO empleados (nombre, apellido, cargo_id, email, telefono, fecha_contratacion) VALUES
('Juan', 'Perez', 1, 'juan.perez@example.com', '123456789', '2022-01-15'),
('Maria', 'Gomez', 2, 'maria.gomez@example.com', '987654321', '2022-02-20'),
('Carlos', 'Lopez', 3, 'carlos.lopez@example.com', '567890123', '2022-03-30'),
('Ana', 'Martinez', 4, 'ana.martinez@example.com', '345678901', '2022-04-10'),
('Luisa', 'Fernandez', 5, 'luisa.fernandez@example.com', '456789012', '2022-05-05');

-- Insertar datos de ejemplo en la tabla de usuarios
INSERT INTO users (empleado_id, username, password, rol, email) VALUES
(1, 'jperez', '12345', 'admin', 'juan.perez@example.com'),
(2, 'mgomez', '12345', 'user', 'maria.gomez@example.com'),
(3, 'clopez', '12345', 'user', 'carlos.lopez@example.com'),
(4, 'amartinez', '12345', 'user', 'ana.martinez@example.com'),
(5, 'lfernandez', '12345', 'user', 'luisa.fernandez@example.com');

-- Insertar datos de ejemplo en la tabla de asistencia
INSERT INTO asistencia (empleado_id, fecha, hora_entrada, hora_salida) VALUES
(1, '2023-05-01', '08:00:00', '17:00:00'),
(2, '2023-05-01', '09:00:00', '18:00:00'),
(3, '2023-05-01', '07:00:00', '16:00:00'),
(4, '2023-05-01', '08:30:00', '17:30:00'),
(5, '2023-05-01', '09:00:00', '18:00:00');

SELECT * FROM cargos;
SELECT * FROM empleados;
SELECT * FROM users;
SELECT * FROM asistencia;
