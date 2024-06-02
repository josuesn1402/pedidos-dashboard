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
  <form action="../controllers/modificarPedido.php" method="POST" id="formulario-modificar" class="form-grid">
    <input type="hidden" id="eIdPedido" name="eIdPedido">

    <div class="form-group">
      <label for="eTipoDocumento">Tipo de Documento:</label>
      <select id="eTipoDocumento" name="eTipoDocumento" required>
        <option value="">Seleccionar</option>
        <?php while ($row = mysqli_fetch_assoc($resultTiposDocumento)): ?>
          <option value="<?php echo $row['IdDocumento']; ?>"><?php echo $row['Tipo']; ?></option>
        <?php endwhile; ?>
      </select>
    </div>

    <div class="form-group">
      <label for="eCodigoEmpleado">Código Empleado:</label>
      <select id="eCodigoEmpleado" name="eCodigoEmpleado" required>
        <option value="">Seleccionar</option>
        <?php while ($row = mysqli_fetch_assoc($resultEmpleados)): ?>
          <option value="<?php echo $row['IdEmpleado']; ?>"><?php echo $row['NombreEmpleado']; ?></option>
        <?php endwhile; ?>
      </select>
    </div>

    <div class="form-group">
      <label for="eCliente">Cliente:</label>
      <select id="eCliente" name="eCliente" required>
        <option value="">Seleccionar</option>
        <?php while ($row = mysqli_fetch_assoc($resultClientes)): ?>
          <option value="<?php echo $row['IdCliente']; ?>"><?php echo $row['NomCliente']; ?></option>
        <?php endwhile; ?>
      </select>
    </div>

    <div class="form-group">
      <label for="eNumeroDocumento">Número de Documento:</label>
      <input type="text" id="eNumeroDocumento" name="eNumeroDocumento" required>
    </div>

    <div class="form-group">
      <label for="eFecha">Fecha:</label>
      <input type="date" id="eFecha" name="eFecha" required>
    </div>

    <div class="form-group">
      <label for="eImporte">Importe:</label>
      <input type="text" id="eImporte" name="eImporte" required>
    </div>

    <!-- Campos para mostrar los cálculos -->
    <div class="form-group">
      <label for="eSubtotal">Subtotal:</label>
      <input type="text" id="eSubtotal" name="eSubtotal" readonly required>
    </div>

    <div class="form-group">
      <label for="eDescuento">Descuento:</label>
      <input type="text" id="eDescuento" name="eDescuento" readonly required>
    </div>

    <div class="form-group">
      <label for="eIgv">IGV:</label>
      <input type="text" id="eIgv" name="eIgv" readonly required>
    </div>

    <div class="form-group">
      <label for="eTotal">Total:</label>
      <input type="text" id="eTotal" name="eTotal" readonly required>
    </div>

    <div class="form-group checkbox">
      <label>&nbsp;</label>
      <div>
        <input type="checkbox" id="eSi" name="eDelivery" value="1">
        <label for="eDelivery">Delivery</label>
      </div>
    </div>

    <!-- Agregamos un botón de "Calcular" -->
    <div class="form-group">
      <button type="button" onclick="calcularMof()">Calcular</button>
    </div>

    <div class="form-group">
      <button type="button" onclick="registrarPedido()">Registrar Pedido</button>
    </div>
</div>

<script>
  function calcularMof() {
    const importe = document.getElementById('eImporte').value;
    if (importe) {
      const subtotal = importe * 0.9; // Suponiendo un descuento del 10%
      const descuento = importe - subtotal;
      const igv = subtotal * 0.18; // Suponiendo un IGV del 18%
      const total = subtotal + igv;

      document.getElementById('eSubtotal').value = subtotal.toFixed(2);
      document.getElementById('eDescuento').value = descuento.toFixed(2);
      document.getElementById('eIgv').value = igv.toFixed(2);
      document.getElementById('eTotal').value = total.toFixed(2);
    } else {
      alert('Por favor ingrese un importe.');
    }
  }

  function registrarPedido() {
    const form = document.getElementById('formulario-modificar');
    const formData = new FormData(form);

    // Validación de los campos
    const tipoDocumento = document.getElementById('eTipoDocumento').value;
    const codigoEmpleado = document.getElementById('eCodigoEmpleado').value;
    const cliente = document.getElementById('eCliente').value;
    const numeroDocumento = document.getElementById('eNumeroDocumento').value;
    const fecha = document.getElementById('eFecha').value;
    const importe = document.getElementById('eImporte').value;
    const subtotal = document.getElementById('eSubtotal').value;
    const descuento = document.getElementById('eDescuento').value;
    const igv = document.getElementById('eIgv').value;
    const total = document.getElementById('eTotal').value;

    if (!tipoDocumento || !codigoEmpleado || !cliente || !numeroDocumento || !fecha || !importe || !subtotal || !descuento || !igv || !total) {
      alert('Por favor complete todos los campos.');
      return;
    }

    fetch('../controllers/modificarPedido.php', {
      method: 'POST',
      body: formData
    })
      .then(response => response.text())
      .then(data => {
        if (data.includes("Pedido modificado con éxito")) {
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