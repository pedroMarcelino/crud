$(function () {

    tables();

    $(document).on("click", "#btn_login", function () {

        $("#btn_login").css("display", "none");
        $("#btn_loading").css("display", "block");

        var email = $("#email").val();
        var senha = $("#senha").val();

        var dados = {
            "email": email,
            "senha": senha,
        }

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'valida-login.php',
            async: true,
            data: dados,
            success: function (data) {
                if (data.msg == true) {
                    $("#email").val("");
                    $("#senha").val("");

                    $("#btn_login").css("display", "block");
                    $("#btn_loading").css("display", "none");

                    $(location).attr('href', 'cad_usuario.php');


                } else if (data.msg == false) {
                    $("#email").val(data.email);
                    $("#senha").val("");

                    $("#btn_login").css("display", "block");
                    $("#btn_loading").css("display", "none");

                    swal("Erro :(", "Não foi possivel fazer o login", "error");
                } else if (data.msg == "user_not_found") {
                    $("#email").val(data.email);
                    $("#senha").val("");

                    $("#btn_login").css("display", "block");
                    $("#btn_loading").css("display", "none");

                    swal("Ops...", "Usuario nao encontrado", "warning");
                }
            }
        });

    });

    $(document).on("click", "#btn_cadastrar", function () {
        $("#nome").val("");
        $("#email").val("");
        $("#senha1").val("");
        $("#senha2").val("");
    });

    $(document).on("click", "#btn_cad_usu", function () {
        $("#btn_cad_usu").css("display", "none");
        $("#btn_loading").css("display", "block");

        var nome = $("#nome").val();
        var email = $("#email").val();
        var senha1 = $("#senha1").val();
        var senha2 = $("#senha2").val();

        if (senha1 == senha2) {

            var dados = {
                "nome": nome,
                "email": email,
                "senha": senha1,
            }

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'cad_usu_banco.php',
                async: true,
                data: dados,
                success: function (data) {
                    if (data.msg == true) {
                        $('#myModal').hide();
                        swal("Ebaa!", "Cadastro feito com sucesso", "success");
                        $('.modal-backdrop').hide();
                        $("#btn_cad_usu").css("display", "block");
                        $("#btn_loading").css("display", "none");
                    }
                },
                complete: function () {
                    tables();
                }
            });

        } else {
            $("#senha2").val("");
            $("#senha1").css("border-bottom", "2px solid red");
            $("#senha2").css("border-bottom", "2px solid red");

            $("#btn_cad_usu").css("display", "block");
            $("#btn_loading").css("display", "none");
        }
    });

    $(document).on("click", ".btn2", function () {
        var id_element = $(this).attr('id');
        const element = document.querySelector('.' + id_element);
        element.classList.add('animated', 'zoomOut');
        var v = [];
        var id_descontruido = "";

        var cd_exe = $(this).val();


        for (var i = 0; i < id_element.length; i++) {
            v[i] = id_element.charAt(i)
        }

        for (var i = 4; i < id_element.length; i++) {
            id_descontruido += v[i];
        }
        $("." + id_element).css("display", "none");

        $("#btn_conf" + id_descontruido).val(cd_exe);

        const element2 = document.querySelector('#conf_btn' + id_descontruido);
        $("#conf_btn" + id_descontruido).css("display", "block");
        element2.classList.add('animated', 'zoomIn');


    });

    $(document).on("click", ".btn-cancel", function () {
        var id_element = $(this).attr('id');
        var v = [];
        var id_descontruido = "";

        for (var i = 0; i < id_element.length; i++) {
            v[i] = id_element.charAt(i)
        }

        for (var i = 9; i < id_element.length; i++) {
            id_descontruido += v[i];
        }

        $("#conf_btn" + id_descontruido).css("display", "none");
        $(".btns" + id_descontruido).attr("class", "btns" + id_descontruido + " animated zoomIn ");
        $(".btns" + id_descontruido).css("display", "block");

    })

    function tables() {
        $.ajax({
            type: 'POST',
            dataType: 'html',
            url: 'table.php',
            async: true,
            data: "",
            success: function (data) {
                $("#dados").html(data);
            }
        });
    }

    $(document).on("click", ".btn-conf", function () {
        var cd = $(this).val();

        var dados = {
            "cd": cd,
        }

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'excluir.php',
            async: true,
            data: dados,
            success: function (data) {
                if (data.msg == true) {
                    swal("Excluido!", "Usuario excluido com sucesso", "success");
                } else if (data.msg == false) {
                    swal("Erro!", "Não foi possivel excluir esse usuario", "error");
                }
            },
            complete: function () {
                tables();
            }
        });

    });

    $(document).on("click", "#btn_alterar", function () {
        var cd = $(this).val();

        var dados = {
            "cd": cd,
        }

        $("#btn_alt_usu").val(cd);

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'pegando_dados.php',
            async: true,
            data: dados,
            success: function (data) {
                if (data.msg == true) {
                    $("#nome_alter").val(data.nome);
                    $("#email_alter").val(data.email);

                } else if (data.msg == false) {
                    swal("Erro!", "Não foi possivel alterar esse usuario", "error");
                }
            },
            complete: function () {
                tables();
            }
        });
    });

    $(document).on("click", "#btn_alt_usu", function () {
        var nome_alt = $("#nome_alter").val();
        var email_alt = $("#email_alter").val();
        var cd = $(this).val();

        $("#btn_alt_usu").css("display", "none");
        $("#btn_loading_alt").css("display", "block");

        var dados = {
            "nome": nome_alt,
            "email": email_alt,
            "cd": cd,
        }

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'alter_usuario.php',
            data: dados,
            success: function (data) {
                if (data.msg) {
                    $('#alterar').hide();
                    swal("Ebaa!", "alterado com sucesso", "success");
                    $('.modal-backdrop').hide();
                    $("#btn_alt_usu").css("display", "block");
                    $("#btn_loading_alt").css("display", "none");
                } else {
                    swal("Erro :(", "Erro ao alterar", "error");
                }
            },
            complete: function () {
                tables();
            }

        });
    })



});