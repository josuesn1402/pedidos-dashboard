<h2>LISTA DE ASISTENCIA</h2>
<button class="register-btn">+ Registrar</button>
<table id="data-table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Empleado Id</th>
      <th>Fecha</th>
      <th>Hora de Entrada</th>
      <th>Hora de Salida</th>
      <th class="col-acciones">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include ('../config/connection.php');
    $query = "SELECT * FROM asistencia";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)):
        ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['empleado_id'] ?></td>
          <td><?= $row['fecha'] ?></td>
          <td><?= $row['hora_entrada'] ?></td>
          <td><?= $row['hora_salida'] ?></td>
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
    } else {
      ?>
      <tr>
        <td colspan="6">No se encontraron registros.</td>
      </tr>
      <?php
    }
    mysqli_free_result($result);
    mysqli_close($conn);
    ?>
  </tbody>
</table>