<div class="form">
  <h2>Solicitud de Pedido</h2>
  <form action="../controllers/registroCtrl.php" method="POST">
    <label for="documento">Documento:</label>
    <select id="documento" name="documento">
      <option value="Factura">Factura</option>
      <option value="Boleta">Boleta</option>
    </select><br>

    <label for="idEmpleado">Código:</label>
    <input type="text" id="idEmpleado" name="idEmpleado"><br>

    <label for="numDocumento">Número de Documento:</label>
    <input type="text" id="numDocumento" name="numDocumento"><br>

    <label for="fecha">Fecha:</label>
    <input type="date" id="fecha" name="fecha"><br>

    <label for="importe">Importe:</label>
    <input type="text" id="importe" name="importe"><br>

    <label for="subtotal">Subtotal:</label>
    <input type="text" id="subtotal" name="subtotal"><br>

    <label for="descuento">Descuento:</label>
    <input type="text" id="descuento" name="descuento"><br>

    <label for="igv">IGV:</label>
    <input type="text" id="igv" name="igv"><br>

    <label for="total">Total:</label>
    <input type="text" id="total" name="total"><br>

    <label for="delivery">Delivery:</label>
    <select id="delivery" name="delivery">
      <option value="1">Sí</option>
      <option value="0">No</option>
    </select><br>

    <label for="estado">Estado:</label>
    <select id="estado" name="estado">
      <option value="Pendiente">Pendiente</option>
      <option value="En proceso">En proceso</option>
      <option value="Entregado">Entregado</option>
    </select><br>

    <button type="submit">Registrar Pedido</button>
  </form>
</div>
