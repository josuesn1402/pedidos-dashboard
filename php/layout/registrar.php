<?php
include ('../config/connection.php');

$sqlTiposDocumento = "SELECT IdDocumento, NomDocumento AS Tipo FROM Documento";
$resultTiposDocumento = mysqli_query($conn, $sqlTiposDocumento);

$sqlEmpleados = "SELECT IdEmpleado, CONCAT(NomEmpleado, ' ', ApeEmpleado) AS NombreEmpleado FROM Empleado";
$resultEmpleados = mysqli_query($conn, $sqlEmpleados);

$sqlClientes = "SELECT IdCliente, NomCliente FROM Cliente";
$resultClientes = mysqli_query($conn, $sqlClientes);

mysqli_close($conn);

include ('../controllers/registroCtrl.php');
?>

<div class="form">
  <h2 class="nunito">Solicitud de Pedido</h2>
  <form action="" method="POST" class="form-grid">
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

    <!-- Campos para mostrar los cálculos -->
    <div class="form-group">
      <label for="subtotal">Subtotal:</label>
      <input type="text" id="subtotal" name="subtotal" readonly>
    </div>

    <div class="form-group">
      <label for="descuento">Descuento:</label>
      <input type="text" id="descuento" name="descuento" readonly>
    </div>

    <div class="form-group">
      <label for="igv">IGV:</label>
      <input type="text" id="igv" name="igv" readonly>
    </div>

    <div class="form-group">
      <label for="total">Total:</label>
      <input type="text" id="total" name="total" readonly>
    </div>

    <div class="form-group checkbox">
      <label>&nbsp;</label>
      <div>
        <input type="checkbox" id="si" name="delivery" value="1">
        <label for="delivery">Delivery</label>
      </div>
    </div>

    <!-- Agregamos un botón de "Calcular" -->
    <div class="form-group">
      <button type="button" onclick="calcular()">Calcular</button>
    </div>

    <div class="form-group">
      <button type="submit">Registrar Pedido</button>
    </div>
  </form>
</div>

<script>
  function calcular() {
    const importe = document.getElementById('importe').value;
    const subtotal = importe * 0.9; // Suponiendo un descuento del 10%
    const descuento = importe - subtotal;
    const igv = subtotal * 0.18; // Suponiendo un IGV del 18%
    const total = subtotal + igv;

    document.getElementById('subtotal').value = subtotal.toFixed(2);
    document.getElementById('descuento').value = descuento.toFixed(2);
    document.getElementById('igv').value = igv.toFixed(2);
    document.getElementById('total').value = total.toFixed(2);
  }
</script>