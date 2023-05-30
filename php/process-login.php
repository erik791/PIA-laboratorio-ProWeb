<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM usuarios
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["Password_hash"])) {
            
            session_start();
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id_Usuario"];
            echo $user["Rol_id"]; // Obtiene el valor de la columna "Rol_id" 
            exit;
        } else {
            $return = "Datos incorrectos";
        }

    }else{
        $return = "vacio";
    }
}

echo $return;
?>
