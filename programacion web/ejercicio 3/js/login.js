$(document).ready(function () {

    $("#loginForm").submit(function (e) {
        e.preventDefault(); // evita recargar la página

        var usuario = $("#usuario").val();
        var password = $("#password").val();

        $.ajax({
            url: "validar.php",
            method: "POST",
            data: { usuario: usuario, password: password },
            success: function (respuesta) {
                $("#mensaje").html(respuesta);
            }
        });

    });

});