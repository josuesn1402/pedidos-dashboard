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
  <h2 class="nunito">Solicitud de Pedido</h2>
  <form id="pedidoForm" method="POST" class="form-grid">
    <div class="form-group">
      <label for="tipoDocumento">Tipo de Documento:</label>
      <select id="tipoDocumento" name="tipoDocumento" required>
        <option value="">Seleccionar</option>
        <?php while ($row = mysqli_fetch_assoc($resultTiposDocumento)): ?>
          <option value="<?php echo $row['IdDocumento']; ?>"><?php echo $row['Tipo']; ?></option>
        <?php endwhile; ?>
      </select>
    </div>

    <div class="form-group">
      <label for="codigoEmpleado">Código Empleado:</label>
      <select id="codigoEmpleado" name="codigoEmpleado" required>
        <option value="">Seleccionar</option>
        <?php while ($row = mysqli_fetch_assoc($resultEmpleados)): ?>
          <option value="<?php echo $row['IdEmpleado']; ?>"><?php echo $row['NombreEmpleado']; ?></option>
        <?php endwhile; ?>
      </select>
    </div>

    <div class="form-group">
      <label for="cliente">Cliente:</label>
      <select id="cliente" name="cliente" required>
        <option value="">Seleccionar</option>
        <?php while ($row = mysqli_fetch_assoc($resultClientes)): ?>
          <option value="<?php echo $row['IdCliente']; ?>"><?php echo $row['NomCliente']; ?></option>
        <?php endwhile; ?>
      </select>
    </div>

    <div class="form-group">
      <label for="numeroDocumento">Número de Documento:</label>
      <input type="text" id="numeroDocumento" name="numeroDocumento" required>
    </div>

    <div class="form-group">
      <label for="fecha">Fecha:</label>
      <input type="date" id="fecha" name="fecha" required>
    </div>

    <div class="form-group">
      <label for="importe">Importe:</label>
      <input type="text" id="importe" name="importe" required>
    </div>

    <!-- Campos para mostrar los cálculos -->
    <div class="form-group">
      <label for="subtotal">Subtotal:</label>
      <input type="text" id="subtotal" name="subtotal" readonly required>
    </div>

    <div class="form-group">
      <label for="descuento">Descuento:</label>
      <input type="text" id="descuento" name="descuento" readonly required>
    </div>

    <div class="form-group">
      <label for="igv">IGV:</label>
      <input type="text" id="igv" name="igv" readonly required>
    </div>

    <div class="form-group">
      <label for="total">Total:</label>
      <input type="text" id="total" name="total" readonly required>
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
      <button type="button" onclick="registrarPedido()">Registrar Pedido</button>
    </div>
  </form>
</div>

<script>
  function calcular() {
    const importe = document.getElementById('importe').value;
    if (importe) {
      const subtotal = importe * 0.9; // Suponiendo un descuento del 10%
      const descuento = importe - subtotal;
      const igv = subtotal * 0.18; // Suponiendo un IGV del 18%
      const total = subtotal + igv;

      document.getElementById('subtotal').value = subtotal.toFixed(2);
      document.getElementById('descuento').value = descuento.toFixed(2);
      document.getElementById('igv').value = igv.toFixed(2);
      document.getElementById('total').value = total.toFixed(2);
    } else {
      alert('Por favor ingrese un importe.');
    }
  }

  function registrarPedido() {
    const form = document.getElementById('pedidoForm');
    const formData = new FormData(form);

    // Validación de los campos
    const tipoDocumento = document.getElementById('tipoDocumento').value;
    const codigoEmpleado = document.getElementById('codigoEmpleado').value;
    const cliente = document.getElementById('cliente').value;
    const numeroDocumento = document.getElementById('numeroDocumento').value;
    const fecha = document.getElementById('fecha').value;
    const importe = document.getElementById('importe').value;
    const subtotal = document.getElementById('subtotal').value;
    const descuento = document.getElementById('descuento').value;
    const igv = document.getElementById('igv').value;
    const total = document.getElementById('total').value;

    if (!tipoDocumento || !codigoEmpleado || !cliente || !numeroDocumento || !fecha || !importe || !subtotal || !descuento || !igv || !total) {
      alert('Por favor complete todos los campos.');
      return;
    }

    fetch('../controllers/registroCtrl.php', {
      method: 'POST',
      body: formData
    })
      .then(response => response.text())
      .then(data => {
        if (data.includes("Pedido registrado con éxito")) {
          window.location.href = '../layout/dashboard.php';
        } else {
          alert(data);
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Error al registrar el pedido');
      });
  }
</script>