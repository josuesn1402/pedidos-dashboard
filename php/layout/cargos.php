<h2>LISTA DE CARGOS</h2>
<button class="register-btn">+ Registrar</button>
<table>
  <thead>
    <tr>
      <th>Id</th>
      <th class="col-cargo">Cargo</th>
      <th class="col-acciones">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <!-- Este contenido se llenará dinámicamente con PHP -->
    <?php
    // Conexión a la base de datos
    include ('../config/connection.php');

    // Consulta SQL para obtener los datos de los cargos
    $query = "SELECT * FROM cargos";
    $result = mysqli_query($conn, $query);

    // Verificar si se obtuvieron resultados
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)):
        ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td class="col-cargo"><?= $row['cargo'] ?></td>
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
        <td colspan="3">No se encontraron registros.</td>
      </tr>
      <?php
    }

    // Liberar resultados y cerrar conexión
    mysqli_free_result($result);
    mysqli_close($conn);
    ?>

  </tbody>
</table>