<?php $mysqli = require "php/database.php"; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Registrar Producto con Imagen</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <link rel="preload" href="css/normalize.css" as="style">
  <link rel="stylesheet" href="css/normalize.css">
  <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
  <link href="css/productosstyles.css" rel="stylesheet">
</head>
<body>
  <h1>Modificar Producto</h1>

  <form class="formulario sombra" action="php/process-products.php" method="POST" enctype="multipart/form-data">
    <fieldset>
  
    <div class="contenedor-campos">

    <div class="campo">
    <label for="nombre">Nombre del producto:</label>
    <input class="input-text" type="text" id="nombre" name="nombre" value="<?php echo $nombreProducto ?>" required><br>
    </div>
    
    <div class="campo">
    <label for="descripcion">Descripción:</label><br>
    <textarea class="input-text" id="descripcion" name="descripcion" required></textarea><br>
    </div>

    <div class="campo">
    <label for="precio">Precio:</label>
    <input class="input-text" type="number" id="precio" name="precio" required><br>
    </div>

    <div class="campo">
    <label for="imagen">Imagen:</label>
    <input class="input-text" type="file" id="imagen" name="imagen" accept="image/jpeg, image/png" required><br>
    </div>

    <div class="campo">
      <label for="text">Categoria:</label>
      <select name="categoria">
        <option value="1">CD</option>
        <option value="2">Vinilo</option>
      </select>
    </div>
  
    </div>

    <input class="boton w-100" type="submit" value="Registrar Producto">

  </fieldset>
  </form>
<br>

</body>
</html>

