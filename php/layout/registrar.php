<div class="form">
  <h2 class="nunito">Solicitud de Pedido</h2>
  <form action="../controllers/registroCtrl.php" method="POST" class="form-grid">
    <div class="form-group">
      <label for="tipoDocumento">Tipo de Documento:</label>
      <select id="tipoDocumento" name="tipoDocumento">
        <option value="">Seleccionar</option>
        <option value="Factura">Factura</option>
        <option value="Boleta">Boleta</option>
      </select>
    </div>

    <div class="form-group">
      <label for="codigoEmpleado">Código Empleado:</label>
      <select id="codigoEmpleado" name="codigoEmpleado">
        <option value="">Seleccionar</option>
        <option value="E00001">E00001</option>
        <option value="E00002">E00002</option>
        <option value="E00003">E00003</option>
        <!-- Otros empleados -->
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

    <div class="form-group">
      <label for="cliente">Cliente:</label>
      <select id="cliente" name="cliente">
        <option value="">Seleccionar</option>
        <option value="C00001">C00001</option>
        <option value="C00002">C00002</option>
        <option value="C00003">C00003</option>
        <!-- Otros clientes -->
      </select>
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