<?php
include ('../config/connection.php');

$idPedido = $_GET['idPedido'];
$query = "SELECT * FROM Pedido WHERE IdPedido = $idPedido";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  // Enviar los datos como JSON
  echo json_encode($row);
} else {
  echo json_encode(['error' => 'No se encontró el pedido']);
}

mysqli_close($conn);
?>