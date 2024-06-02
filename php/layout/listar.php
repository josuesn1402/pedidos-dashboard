<?php
include ('../config/connection.php');

$query = "CALL SeleccionarPedidos()";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
  ?>
  <h2>LISTA DE PEDIDOS</h2>
  <button class="register-btn">+ Registrar</button>
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
          <td><?= $row['IdPedido'] ?></td>
          <td><?= $row['Documento'] ?></td>
          <td><?= $row['Empleado'] ?></td>
          <td><?= $row['NumDocumento'] ?></td>
          <td><?= $row['Fecha'] ?></td>
          <td><?= $row['Cliente'] ?></td>
          <td><?= $row['Importe'] ?></td>
          <td><?= $row['Descuento'] ?></td>
          <td><?= $row['Subtotal'] ?></td>
          <td><?= $row['IGV'] ?></td>
          <td><?= $row['Total'] ?></td>
          <td><?= $row['Delivery'] ?></td>
          <td class="col-acciones">
            <button class="edit-btn">
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