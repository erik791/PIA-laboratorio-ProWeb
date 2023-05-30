<?php $mysqli = require "php/database.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactanos</title>
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preload" href="css/styles.css" as="style">
    <link href="css/styles2.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="Js/eventosCRUD.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <header>
        <h1 class="titulo">NEA<span>MX</span></h1>
    </header>
    <main class="contenedor sombra">
        <h2>PANEL DE CONTROL PRODUCTOS</h2>
        <br>
        <br>
        <table class="table">
            <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col">
                    <a href="agregarProducto.html">
                        <button type="button" class="btn btn-outline-success btn-lg">Agregar Producto</button>
                    </a>
                  </th>
                </tr>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Activo</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                 <!--Imprimir productos-->
      <?php
      $query = "SELECT * FROM productos";
      $result = mysqli_query($mysqli, $query);

      // Iterar sobre los resultados y crear un producto/item por cada registro
      while ($row = mysqli_fetch_array($result)) {
        $idProducto = $row['id_Producto'];
        $nombre = $row['Nombre_producto'];
        $precio = $row['Precio'];
        $imagen = $row['Imagen'];
        $categoria = $row['Categoria_id'];

        // Procesamiento de datos
        if ($categoria == 1) {
          $txtCategoria = "CD";
        } else {
          $txtCategoria = "Vinilo";
        }

        // Imprimir Registro de cada producto de la base de datos
        echo '
        <tr id="registroProducto-' . $idProducto . '">
          <td class="align-middle">' . $idProducto . '</td>
          <input type="hidden" name="inputID" value="' . $idProducto . '">
          <td scope="row" class="align-middle">
            <img src="php/img/productos/' . $imagen . '" alt="producto" class="img-thumbnail img-fluid" style="width: auto; height: 100px;">
          </td>
          <td class="align-middle">
            ' . $nombre . '
          </td>
          <td class="align-middle">
            $' . $precio . '
          </td>
          <td class="align-middle">
            ' . $txtCategoria . '
          </td>
          <td class="align-middle">
            <div class="form-check form-switch d-flex justify-content-center">
              <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
            </div>
          </td>
          <td class="align-middle">
            <button type="submit" name="modificar" class="btn btn-outline-primary btn-lg" onclick="modificarProducto(' . $idProducto . ')">Modificar</button>
            <button type="button" name="eliminar" class="btn btn-outline-danger btn-lg" onclick="eliminarProducto(' . $idProducto . ')">Eliminar</button>
          </td>
        </tr>';
      }
      ?>
            </tbody>
        </table>
    </main>
        
       <br>
       <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


    <footer class="footer">
        <p class="titulo2" align="center">Lo mejor de la musica en un solo lugar NEA<span>MX</span></p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>