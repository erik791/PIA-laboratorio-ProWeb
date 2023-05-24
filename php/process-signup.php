<?php

// Verifica entrada "Nombre completo"
if(empty($_POST["name"])){
    die("Nombre requerido.");
} 

// Verifica entrada "Correo Electronico"
if(empty($_POST["email"])){
    die("Correo electronico requerido.");
} 

// Validacion de contraseña
if(strlen($_POST["pass"]) < 8){
    die("La contraseña debe de tener mas de 8 caracteres.");
}

// Verificar si la contraseña contiene letras
if(!preg_match("/[a-z]/i",$_POST["pass"])){
    die("La contraseña debe de tener almenos una letra.");
}

// Verificar si la contraseña contiene numeros
if(!preg_match("/[0-9]/i",$_POST["pass"])){
    die("La contraseña debe de tener almenos un numero.");
}

// Confirmar contraseña repetida
if($_POST["pass"] !== $_POST["pass_confirmation"]){
    die("Las contraseñas no coinciden.");
}

// Metodo hashing para mantener seguridad de contraseña
$password_hash = password_hash($_POST["pass"], PASSWORD_DEFAULT);

$rol = 1;

$mysqli = require __DIR__ . "/database.php";

// Realizar una consulta para verificar si el correo electrónico ya existe
$checkEmailQuery = "SELECT COUNT(*) FROM usuarios WHERE email = ?";
$stmt = $mysqli->prepare($checkEmailQuery);
$stmt->bind_param("s", $_POST["email"]);
$stmt->execute();
$stmt->bind_result($emailCount);
$stmt->fetch();
$stmt->close();

if ($emailCount > 0) {
    // El correo electrónico ya existe en la base de datos
    die("El correo electrónico ya está registrado.");
} else {

    $sql = "INSERT INTO usuarios (nombre, Email, Password_hash, Rol_id)
            VALUES (?,?,?,?)";

    $stmt = $mysqli->stmt_init(); // Inicializar la variable $stmt correctamente

    if (!$stmt->prepare($sql)) {
        die("ERROR SQL: " . $mysqli->error);
    }

    $stmt->bind_param("ssss", 
                        $_POST["name"],
                        $_POST["email"],
                        $password_hash,
                        $rol);

    if ($stmt->execute()) {
        #echo "Cuenta creada correctamente.";
        header("Location: /login.html");
        exit;
    } else {
        die("Error al crear la cuenta: " . $stmt->error);
    }
    $stmt->close();
}

                    

?>