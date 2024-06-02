<?php
include ('../config/connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $idDocumento = mysqli_real_escape_string($conn, $_POST['tipoDocumento']);
  $idEmpleado = mysqli_real_escape_string($conn, $_POST['codigoEmpleado']);
  $numDocumento = mysqli_real_escape_string($conn, $_POST['numeroDocumento']);
  $fecha = mysqli_real_escape_string($conn, $_POST['fecha']);
  $importe = mysqli_real_escape_string($conn, $_POST['importe']);
  $subtotal = mysqli_real_escape_string($conn, $_POST['subtotal']);
  $descuento = mysqli_real_escape_string($conn, $_POST['descuento']);
  $igv = mysqli_real_escape_string($conn, $_POST['igv']);
  $total = mysqli_real_escape_string($conn, $_POST['total']);
  $idCliente = mysqli_real_escape_string($conn, $_POST['cliente']);
  $delivery = isset($_POST['delivery']) ? 1 : 0; // 1 si está marcado, 0 si no está
  $estado = 1; // Por defecto, el estado es 1 (activo)

  // Consulta SQL para insertar el pedido
  $query = "INSERT INTO Pedido (IdDocumento, IdEmpleado, NumDocumento, Fecha, IdCliente, Importe, Subtotal, Descuento, IGV, Total, Delivery, Estado) 
            VALUES ('$idDocumento', '$idEmpleado', '$numDocumento', '$fecha', '$idCliente', '$importe', '$subtotal', '$descuento', '$igv', '$total', '$delivery', '$estado')";

  if (mysqli_query($conn, $query)) {
    header("Location:../layout/dashboard.php");
    exit();
  } else {
    echo "Error al registrar el pedido: " . mysqli_error($conn);
  }

  mysqli_close($conn);
} else {
  echo "Acceso no autorizado.";
}
?>