<?php
include ('../config/connection.php');

$sqlTiposDocumento = "SELECT IdDocumento, NomDocumento AS Tipo FROM Documento";
$resultTiposDocumento = mysqli_query($conn, $sqlTiposDocumento);

$sqlEmpleados = "SELECT IdEmpleado, CONCAT(NomEmpleado, ' ', ApeEmpleado) AS NombreEmpleado FROM Empleado";
$resultEmpleados = mysqli_query($conn, $sqlEmpleados);

$sqlClientes = "SELECT IdCliente, NomCliente FROM Cliente";
$resultClientes = mysqli_query($conn, $sqlClientes);

mysqli_close($conn);
?>

<div class="form">
  <h2 class="nunito">MODIFICAR PEDIDO</h2>
  <form action="../controllers/registroCtrl.php" method="POST" id="formulario-modificar" class="form-grid">
    <input type="hidden" id="idPedido" name="idPedido">

    <div class="form-group">
      <label for="tipoDocumento">Tipo de Documento:</label>
      <select id="tipoDocumento" name="tipoDocumento">
        <option value="">Seleccionar</option>
        <?php while ($row = mysqli_fetch_assoc($resultTiposDocumento)): ?>
          <option value="<?php echo $row['IdDocumento']; ?>"><?php echo $row['Tipo']; ?></option>
        <?php endwhile; ?>
      </select>
    </div>

    <div class="form-group">
      <label for="codigoEmpleado">Código Empleado:</label>
      <select id="codigoEmpleado" name="codigoEmpleado">
        <option value="">Seleccionar</option>
        <?php while ($row = mysqli_fetch_assoc($resultEmpleados)): ?>
          <option value="<?php echo $row['IdEmpleado']; ?>"><?php echo $row['NombreEmpleado']; ?></option>
        <?php endwhile; ?>
      </select>
    </div>

    <div class="form-group">
      <label for="cliente">Cliente:</label>
      <select id="cliente" name="cliente">
        <option value="">Seleccionar</option>
        <?php while ($row = mysqli_fetch_assoc($resultClientes)): ?>
          <option value="<?php echo $row['IdCliente']; ?>"><?php echo $row['NomCliente']; ?></option>
        <?php endwhile; ?>
      </select>
    </div>

    <div class="form-group">
      <label for="numeroDocumento">Número de Documento:</label>
      <input type="text" id="numeroDocumento" name="numeroDocumento">
    </div>

    <div class="form-group">
      <label for="fecha">Fecha:</label>
      <input type="date" id="fecha" name="fecha">
    </div>

    <div class="form-group">
      <label for="importe">Importe:</label>
      <input type="text" id="importe" name="importe">
    </div>

    <div class="form-group">
      <label for="subtotal">Subtotal:</label>
      <input type="text" id="subtotal" name="subtotal">
    </div>

    <div class="form-group">
      <label for="descuento">Descuento:</label>
      <input type="text" id="descuento" name="descuento">
    </div>

    <div class="form-group">
      <label for="igv">IGV:</label>
      <input type="text" id="igv" name="igv">
    </div>

    <div class="form-group">
      <label for="total">Total:</label>
      <input type="text" id="total" name="total">
    </div>

    <div class="form-group checkbox">
      <label>Delivery:</label>
      <div>
        <input type="radio" id="si" name="delivery" value="1">
        <label for="si">Sí</label>
      </div>
      <div>
        <input type="radio" id="no" name="delivery" value="0">
        <label for="no">No</label>
      </div>
    </div>

    <div class="form-group">
      <button type="submit">Registrar Pedido</button>
    </div>
  </form>
</div>