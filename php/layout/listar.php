<?php
include('../config/connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $query = "CALL SeleccionarPedidos()";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
?>
    <h2>LISTA DE PEDIDOS</h2>
    <button class="register-btn">+ Registrar</button>
    <table id="data-table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Documento</th>
          <th>Empleado Id</th>
          <th>Num. Documento</th>
          <th>Fecha</th>
          <th>Importe</th>
          <th>Estado</th>
          <th class="col-acciones">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) :
        ?>
          <tr>
            <td><?= $row['IdPedido'] ?></td>
            <td><?= $row['IdDocumento'] ?></td>
            <td><?= $row['IdEmpleado'] ?></td>
            <td><?= $row['NumDocumento'] ?></td>
            <td><?= $row['Fecha'] ?></td>
            <td><?= $row['Importe'] ?></td>
            <td><?= $row['Estado'] ?></td>
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
} else {
  ?>
  <p>Error al procesar la solicitud.</p>
<?php
}
?>