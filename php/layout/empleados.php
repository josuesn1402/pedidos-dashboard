<h2>LISTA DE EMPLEADOS</h2>
<button class="register-btn">+ Registrar</button>
<table id="data-table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Teléfono</th>
      <th>Cargo</th>
      <th class="col-acciones">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include ('../config/connection.php');
    $query = "SELECT empleados.id, empleados.nombre, empleados.telefono, cargos.cargo 
              FROM empleados 
              JOIN cargos ON empleados.cargo_id = cargos.id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)):
        ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['nombre'] ?></td>
          <td><?= $row['telefono'] ?></td>
          <td><?= $row['cargo'] ?></td>
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
        <td colspan="5">No se encontraron registros.</td>
      </tr>
      <?php
    }
    mysqli_free_result($result);
    mysqli_close($conn);
    ?>
  </tbody>
</table>