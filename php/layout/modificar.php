<h2>MODIFICAR PEDIDO</h2>
<form action="../controllers/registroCtrl.php" method="POST">
  <label for="documento">Documento:</label>
  <select id="documento" name="documento">
    <option value="Factura">Factura</option>
    <option value="Boleta">Boleta</option>
  </select><br>

  <label for="idEmpleado">Empleado Id:</label>
  <input type="text" id="idEmpleado" name="idEmpleado"><br>

  <label for="numDocumento">Número de Documento:</label>
  <input type="text" id="numDocumento" name="numDocumento"><br>

  <label for="fecha">Fecha:</label>
  <input type="date" id="fecha" name="fecha"><br>

  <label for="importe">Importe:</label>
  <input type="text" id="importe" name="importe"><br>

  <label for="estado">Estado:</label>
  <select id="estado" name="estado">
    <option value="Pendiente">Pendiente</option>
    <option value="En proceso">En proceso</option>
    <option value="Entregado">Entregado</option>
  </select><br>

  <button type="submit">Registrar Pedido</button>
</form>