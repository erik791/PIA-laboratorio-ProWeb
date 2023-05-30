

function eliminarProducto(idProducto) {
    
    // Enviar la solicitud Ajax para eliminar el registro
    $.ajax({
        url: "php/modificar.php",
        type: "POST",
        data: { eliminar: true, inputID: idProducto },
        success: function(response) {
            if (response == 2) {
                // Eliminación exitosa
                $("#registroProducto-" + idProducto).remove();
            } else {
                // Error al eliminar el registro
                alert("Error al eliminar el registro");
            }
        },
        error: function() {
            // Error al realizar la solicitud Ajax
            alert("Error en la solicitud Ajax");
        }
    });
    
}

function eliminarUsuario(idUsuario) {
    
    // Enviar la solicitud Ajax para eliminar el registro
    $.ajax({
        url: "php/modificarUser.php",
        type: "POST",
        data: { eliminar: true, inputID: idUsuario },
        success: function(response) {
            if (response == 2) {
                // Eliminación exitosa
                $("#registroUsuario-" + idUsuario).remove();
            } else {
                // Error al eliminar el registro
                alert("Error al eliminar el registro");
            }
        },
        error: function() {
            // Error al realizar la solicitud Ajax
            alert("Error en la solicitud Ajax");
        }
    });
    
}

function modificarProducto(idProducto) {
    
    // Enviar la solicitud Ajax para modificar el registro
    $.ajax({
        url: "php/modificar.php",
        type: "POST",
        data: { modificar: true, inputID: idProducto },
        success: function(response) {
            alert(response);
            
        },
        error: function() {
            // Error al realizar la solicitud Ajax
            alert("Error en la solicitud Ajax");
        }
    });
    
}

