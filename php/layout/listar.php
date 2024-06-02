<?php
include ('../config/connection.php');

$query = "CALL SeleccionarPedidos()";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
  ?>
  <h2 class="nunito">LISTA DE PEDIDOS</h2>
  <button id="registrar-btn" class="register-btn">+ Registrar</button>
  <table id="data-table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Documento</th>
        <th>Empleado</th>
        <th>N° Documento</th>
        <th>Fecha</th>
        <th>Cliente</th>
        <th>Importe</th>
        <th>Descuento</th>
        <th>Subtotal</th>
        <th>IGV</th>
        <th>Total</th>
        <th>Delivery</th>
        <th class="col-acciones">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php
      while ($row = mysqli_fetch_assoc($result)):
        ?>
        <tr>
          <td><?= htmlspecialchars($row['IdPedido']) ?></td>
          <td><?= htmlspecialchars($row['Documento']) ?></td>
          <td><?= htmlspecialchars($row['Empleado']) ?></td>
          <td><?= htmlspecialchars($row['NumDocumento']) ?></td>
          <td><?= htmlspecialchars($row['Fecha']) ?></td>
          <td><?= htmlspecialchars($row['Cliente']) ?></td>
          <td><?= htmlspecialchars($row['Importe']) ?></td>
          <td><?= htmlspecialchars($row['Descuento']) ?></td>
          <td><?= htmlspecialchars($row['Subtotal']) ?></td>
          <td><?= htmlspecialchars($row['IGV']) ?></td>
          <td><?= htmlspecialchars($row['Total']) ?></td>
          <td><?= htmlspecialchars($row['Delivery']) ?></td>
          <td class="col-acciones">
            <button class="edit-btn" data-pedido='<?= htmlspecialchars(json_encode($row)) ?>'>
              <img src="../../assets/svg/edit.svg" alt="Editar">
            </button>
            <button class="delete-btn">
              <img src="../../assets/svg/delete.svg" alt="Eliminar">
            </button>
          </td>
        </tr>
        <?php
      endwhile;
      ?>
    </tbody>
  </table>
  <?php
} else {
  ?>
  <p>No se encontraron registros.</p>
  <?php
}
mysqli_free_result($result);
mysqli_close($conn);
?>