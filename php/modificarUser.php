<?php
$mysqli = require __DIR__ . "/database.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST['modificar'])) {
    }

  } elseif (isset($_POST['eliminar'])) {
    $inputID = $_POST['inputID'];

    // Acción de eliminar el registro con el ID $inputID
    $query = "DELETE FROM usuarios WHERE id_Usuario = '$inputID'";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
      echo 2; // Envía 2 si se elimina correctamente
    } else {
      echo 0; // Envía 0 si hay un error al eliminar
    }
  } else {
    echo "Acción desconocida";
  }
?>

