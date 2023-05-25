<?php
$mysqli = require __DIR__ . "/database.php";

// Verificar la conexión
if ($mysqli->connect_errno) {
  die("Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
  exit;
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Obtener los datos enviados por el formulario
  $nombre = $_POST['nombre'];
  $precio = $_POST['precio'];
  $descripcion = $_POST['descripcion'];
  $categoria = $_POST['categoria'];


  // Procesar la imagen
  $imagen = $_FILES['imagen'];
  $nombreArchivo = $imagen['name'];
  $rutaArchivoTemp = $imagen['tmp_name'];

  // Generar un nombre único para el archivo
  $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
  $nombreUnico = uniqid() . '.' . $extension;

  // Definir la ruta de destino para guardar la imagen
  $rutaDestino = "img/productos/" . $nombreUnico;

  // Mover la imagen al directorio de destino
  if (move_uploaded_file($rutaArchivoTemp, $rutaDestino)) {
    // Preparar la consulta SQL
    $stmt = $mysqli->prepare("INSERT INTO productos (Nombre_producto, Precio, Descripcion, Imagen, Categoria_id, Activo) VALUES (?, ?, ?, ?, ?, 1)");
    $stmt->bind_param("sdsii", $nombre, $precio, $descripcion, $nombreArchivo, $categoria);

    // Ejecutar la consulta
    if ($stmt->execute()) {
      echo "El producto se ha registrado correctamente.";
    } else {
      echo "Ha ocurrido un error al registrar el producto.";
    }

    $stmt->close();
  } else {
    echo "Ha ocurrido un error al subir la imagen.";
  }

  $mysqli->close();
}
?>
