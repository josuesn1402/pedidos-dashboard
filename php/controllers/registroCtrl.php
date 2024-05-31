<?php
include ('../config/connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $documento = mysqli_real_escape_string($conn, $_POST['documento']);
  $idEmpleado = mysqli_real_escape_string($conn, $_POST['idEmpleado']);
  $numDocumento = mysqli_real_escape_string($conn, $_POST['numDocumento']);
  $fecha = mysqli_real_escape_string($conn, $_POST['fecha']);
  $importe = mysqli_real_escape_string($conn, $_POST['importe']);
  $estado = mysqli_real_escape_string($conn, $_POST['estado']);

  // Consulta SQL para insertar el pedido
  $query = "INSERT INTO Pedido (IdDocumento, IdEmpleado, NumDocumento, Fecha, Importe, Estado) VALUES ('$documento', '$idEmpleado', '$numDocumento', '$fecha', '$importe', '$estado')";
  
  if (mysqli_query($conn, $query)) {
    echo "Pedido registrado exitosamente.";
  } else {
    echo "Error al registrar el pedido: " . mysqli_error($conn);
  }

  mysqli_close($conn);
} else {
  echo "Acceso no autorizado.";
}
?>
