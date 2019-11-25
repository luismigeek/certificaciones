$(function () {

    $("#submit_reg_user").click(function () {
        $.ajax({
            type: "POST",
            url: 'app/registrousuario.php',
            data: $("#form_reg_user").serialize(),
            success: function (data) {
                $("#msg_usuario").html(data);
            }
        });

        return false;
    });

    $("#submit_reg_ben").click(function () {
        $.ajax({
            type: "POST",
            url: 'app/registrobeneficiario.php',
            data: $("#form_reg_ben").serialize(),
            success: function (data) {
                $("#msg_ben").html(data);
            }
        });

        return false;
    });

    $("#submit_login").click(function () {
        $.ajax({
            type: "POST",
            url: 'app/iniciarsesion.php',
            data: $("#form_login").serialize(),
            success: function (data) {
                $("#msg_login").html(data);
            }
        });

        return false;
    });

    $("#submit_gen_cer").click(function () {

        $.ajax({
            type: "POST",
            url: 'app/datoscertificado.php',
            data: $("#form_gen_cer").serialize(),
            success: function (data) {
                $("#vistaPrevia").html(data);
            }
        });

        return false;
    });

    $("#btn_salir").click(function () {

        if (confirm('Confirma que desea cerrar sesion?')) {

            $.ajax({
                type: "POST",
                url: 'app/cerrarsesion.php',
                success: function (data) {
                    window.location = 'index.php';
                }
            });
        }

        return false;
    });

});