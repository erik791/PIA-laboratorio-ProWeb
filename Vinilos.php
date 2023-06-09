<?php $mysqli = require "php/database.php"; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="css/vinilos.css" rel="stylesheet">    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PIA LAB PROWEB</title>
        <link rel="preload" href="css/normalize.css" as="style">
        <link rel="stylesheet" href="css/normalize.css">
        <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <h1 class="titulo">NEA<span>MX</span></h1>
        <div class="nav-bg">
            <nav class="navegacion-principal contenedor">
                <a href="./index.html">Inicio</a>
                <a href="./Productos.html">Productos</a>
                <a href="./AboutUS.html">Acerca de Nosotros</a>
                <a href="contac.html">Contactanos</a>
                <a href="carrito.html">Carrito</a>
            </nav>
        </div>
        <br>

        <main class="contenedor sombra">
            <header>
                <h2>Vinilos</h2>
                <div class="container-icon">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="icon-cart"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"
                        />
                    </svg>
                    <div class="count-products">
                        <span id="contador-productos">0</span>
                    </div>

                    <div class="container-cart-products hidden-cart">
                        <div class="cart-product">
                            <div class="info-cart-product">
                                <span class="cantidad-producto-carrito">1</span>
                                <p class="titulo-producto-carrito">Zapatos Nike</p>
                                <span class="precio-producto-carrito">$80</span>
                            </div>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="icon-close"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </div>
                        <div class="cart-total">
                            <h3>Total:</h3>
                            <span class="total-pagar">$200</span>
                        </div>
                    </div>
                </div>
            </header>

            <div class="container-items">
                <?php
                $query = "SELECT * FROM productos WHERE Categoria_id = 2 AND Activo = 1";
                $result = mysqli_query($mysqli,$query);

                // Iterar sobre los resultados y crear un producto/item por cada registro
                while ($row = mysqli_fetch_array($result)) {
                    $nombre = $row['Nombre_producto'];
                    $precio = $row['Precio'];
                    $imagen = $row['Imagen'];
                
                    // Imprimir la estructura HTML para cada producto/item
                    echo '
                    <div class="item">
                        <figure>
                            <img src="php/img/productos/' . $imagen . '" alt="producto" />
                        </figure>
                        <div class="info-product">
                            <h2>' . $nombre . '</h2>
                            <p class="price">$' . $precio . '</p>
                            <button>Añadir al carrito</button>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </main>
        <br>
        <footer class="footer">
            <p class="titulo2" align="center">Lo mejor de la musica en un solo lugar NEA<span>MX</span></p>
        </footer>
        <script src="vinilos.js"></script>
    </body>
</html>