<?php
include ('../config/connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $idPedido = mysqli_real_escape_string($conn, $_POST['eIdPedido']);
  $idDocumento = mysqli_real_escape_string($conn, $_POST['eTipoDocumento']);
  $idEmpleado = mysqli_real_escape_string($conn, $_POST['eCodigoEmpleado']);
  $numDocumento = mysqli_real_escape_string($conn, $_POST['eNumeroDocumento']);
  $fecha = mysqli_real_escape_string($conn, $_POST['eFecha']);
  $importe = mysqli_real_escape_string($conn, $_POST['eImporte']);
  $subtotal = mysqli_real_escape_string($conn, $_POST['eSubtotal']);
  $descuento = mysqli_real_escape_string($conn, $_POST['eDescuento']);
  $igv = mysqli_real_escape_string($conn, $_POST['eIgv']);
  $total = mysqli_real_escape_string($conn, $_POST['eTotal']);
  $idCliente = mysqli_real_escape_string($conn, $_POST['eCliente']);
  $delivery = isset($_POST['eDelivery']) ? 1 : 0; // 1 si está marcado, 0 si no está

  // Consulta SQL para actualizar el pedido
  $query = "UPDATE Pedido 
            SET IdDocumento = '$idDocumento', IdEmpleado = '$idEmpleado', NumDocumento = '$numDocumento', Fecha = '$fecha', IdCliente = '$idCliente', 
                Importe = '$importe', Subtotal = '$subtotal', Descuento = '$descuento', IGV = '$igv', Total = '$total', Delivery = '$delivery' 
            WHERE IdPedido = '$idPedido'";

  if (mysqli_query($conn, $query)) {
    echo "Pedido modificado con éxito";
  } else {
    echo "Error al modificar el pedido: " . mysqli_error($conn);
  }

  mysqli_close($conn);
} else {
  echo "Acceso no autorizado.";
}
?>