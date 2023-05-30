<?php $mysqli = require "php/database.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
    
    <link href="css/styleDeg.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="Js/eventosCRUD.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <header>
        <h1 class="titulo">NEA<span>MX</span></h1>
    </header>
    <main class="contenedor sombra">
        <h2>PANEL DE CONTROL USUARIOS</h2>
        <br>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password Hash</th>
                    <th scope="col">Rol</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                 <!--Imprimir productos-->
      <?php
      $query = "SELECT * FROM usuarios";
      $result = mysqli_query($mysqli, $query);

      // Iterar sobre los resultados y crear un producto/item por cada registro
      while ($row = mysqli_fetch_array($result)) {
        $idUsuario = $row['id_Usuario'];
        $nombre = $row['Nombre'];
        $email = $row['Email'];
        $pass = $row['Password_hash'];
        $rol = $row['Rol_id'];

        // Imprimir Registro de cada producto de la base de datos
        echo '
        </tr>
        <tr id="registroUsuario-' . $idUsuario . '">
          <td class="align-middle">' . $idUsuario . '</td>
          <input type="hidden" name="inputID" value="' . $idUsuario . '">
          <td class="align-middle" scope="row">
            ' . $nombre . '
          </td>
          <td class="align-middle">
            $' . $email . '
          </td>
          <td class="align-middle">
            ' . $pass . '
          </td>
          <td class="align-middle">
            ' . $rol . '
          </td>';
          if($rol == 2){
            echo '<td class="align-middle">
            <button type="button" name="eliminar" class="btn btn-outline-danger btn-lg" onclick="eliminarUsuario(' . $idUsuario . ')">Eliminar</button>
            </td>';
          }else{
            echo '<td class="align-middle">
            ADMINISTRADOR
            </td>';
          }
      }
      ?>
            </tbody>
        </table>
    </main>
    <br>
    <a href="Menuadmin.html">
    <input class="boton w-100" type="submit" value="Atras">
    </a>
    <br>
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>