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
  $imagen = $_FILES['imagen']['name'];

  if(isset($imagen) && $imagen != ""){
    $tipo = $_FILES['imagen']['type'];
    $temp  = $_FILES['imagen']['tmp_name'];

    if( !((strpos($tipo,'png') || strpos($tipo,'jpeg')))){
      echo 'Solo imagenes jpeg, png, webp';
      exit;
    }else{
      if (file_exists($temp)){

        if(!(move_uploaded_file($temp,'img/productos/'.$imagen))){
          echo "No se puede mover";
          exit;
        }  
        // Preparar la consulta SQL
        $stmt = $mysqli->prepare("INSERT INTO productos (Nombre_producto, Precio, Descripcion, Categoria_id, Imagen, Activo) VALUES (?, ?, ?, ?, ?, 1)");
        $stmt->bind_param("sdsis", $nombre, $precio, $descripcion, $categoria, $imagen);
        
        // Ejecutar la consulta
        if ($stmt->execute()) { 
          echo "Registro Exitoso.";

        } else {
          echo "Registro Fallido.";

        }
      }
    }
  }
  

  //Terminar Proceso
  $stmt->close();
  $mysqli->close();
}
?>