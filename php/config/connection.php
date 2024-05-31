<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$database = "db_pedidos";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}
?>