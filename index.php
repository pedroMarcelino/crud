<?php
    session_start();
    if(isset($_SESSION['codigo'])){
        header("location:cad_usuario.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud</title>
    <?php include "links.php"?>
</head>

<body>
    <div class="container">
        <div class="row">
            <div id="form-login" class="col-md-12">
                <form>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control input-bottom" id="email" placeholder="Digite seu email">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" class="form-control input-bottom" id="senha" placeholder="Digite sua senha">
                    </div>
                </form>
                <button id="btn_login" class="btn btn-outline-success btn-block">ENVIAR</button>
                <button id="btn_loading" class="btn btn-outline-success btn-block" disabled> <span class="spinner-border spinner-border-sm"></span> Loading ...</button>
            </div>
        </div>
    </div>
</body>

</html>