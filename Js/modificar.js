
$(document).ready(function() {
    $('#registroProducto').submit(function(event) {
        event.preventDefault(); // Evitar el envío normal del formulario
        var formData = $(this).serialize(); // Obtener los datos del formulario

        $.ajax({
            type: 'POST',
            url: 'php/modificar.php', // Archivo PHP que procesará los datos
            data: formData,
            success: function(response) {
                if(response == 2){
                    window.alert("Eliminado.");
                }
            }
        });
    });
});

