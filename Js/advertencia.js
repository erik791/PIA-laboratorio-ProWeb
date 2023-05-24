
 $(document).ready(function() {
    $('#myForm').submit(function(event) {
        event.preventDefault(); // Evitar el envío normal del formulario
        var formData = $(this).serialize(); // Obtener los datos del formulario

        $.ajax({
            type: 'POST',
            url: 'php/process-login.php', // Archivo PHP que procesará los datos
            data: formData,
            success: function(response) {
                // Manejar la respuesta del servidor
                if (response != true) {
                    // Manejar la respuesta del servidor
                    var parrafo = document.getElementById("ms-advertecia");
                    parrafo.textContent = response;

                    $('.alert').addClass("show");
                    $('.alert').removeClass("hide");
                    $('.alert').addClass("showAlert");
                    setTimeout(function(){
                        $('.alert').removeClass("show");
                        $('.alert').addClass("hide");
                    },5000);
                } else {
                    window.location.href = "index.html";
                }
            }
        });
    });

    $('#myFormSign').submit(function(event) {
        event.preventDefault(); // Evitar el envío normal del formulario
        var formData = $(this).serialize(); // Obtener los datos del formulario

        $.ajax({
            type: 'POST',
            url: 'php/process-signup.php', // Archivo PHP que procesará los datos
            data: formData,
            success: function(response) {
                // Manejar la respuesta del servidor
                if(response == true){
                    window.location.href = "login.html";
                    response = "Cuenta creada exitosamente.";
                }
                // Manejar la respuesta del servidor
                var parrafo = document.getElementById("ms-advertecia");
                parrafo.textContent = response;
                $('.alert').addClass("show");
                $('.alert').removeClass("hide");
                $('.alert').addClass("showAlert");
                setTimeout(function(){
                    $('.alert').removeClass("show");
                    $('.alert').addClass("hide");
                },5000); 
            }
        });
    });
});

 $('.close-btn').click(function(){
   $('.alert').removeClass("show");
   $('.alert').addClass("hide");
 });