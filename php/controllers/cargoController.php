<?php
include ('../config/connection.php');

$query = "SELECT * FROM cargos";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['cargo']}</td>
            <td>
                <button class='edit-btn'>✏️</button>
                <button class='delete-btn'>🗑️</button>
            </td>
          </tr>";
}
?>