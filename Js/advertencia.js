
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
                if(response == "1")
                    window.location.href = "Menuadmin.html";
                else if(response == "2")
                    window.location.href = "index.html";
                else{
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
                var parrafo = document.getElementById("ms-advertecia");
                var estilo = document.getElementsByClassName("alert hide");
                if(response == true){
                    parrafo.textContent = "Cuenta creada exitosamente";
                    // Manejar la respuesta del servidor
                    $('.alert').addClass("");
                    $('.alert').addClass("show");
                    $('.alert').removeClass("hide");
                    $('.alert').addClass("showAlert");
                    setTimeout(function(){
                        $('.alert').removeClass("show");
                        $('.alert').addClass("hide");
                    },5000);
                
                }else{
                    parrafo.textContent = txtResponse;
                    // Manejar la respuesta del servidor
                    $('.alert').addClass("show");
                    $('.alert').removeClass("hide");
                    $('.alert').addClass("showAlert");
                    setTimeout(function(){
                        $('.alert').removeClass("show");
                        $('.alert').addClass("hide");
                    },5000);
                }
                 
            }
        });
    });
});

 $('.close-btn').click(function(){
   $('.alert').removeClass("show");
   $('.alert').addClass("hide");
 });