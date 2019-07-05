<?php
    session_start();
    $codigo = $_SESSION['codigo'];

    if($codigo == ""){
        header("location:index.php");
        exit();
    }

    $dois = "2";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud</title>
    <?php include "links.php";?>
</head>

<body>
    <header>
        <?php include "navbar.php"?>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h1 class="display-4 center mt-5 pd grad">Cadastro de Usuario</h1>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="float-right">
                    <button id="btn_cadastrar" class="btn btn-outline-success" data-toggle="modal" data-target="#myModal"><i class="fas fa-user-plus"></i> Cadastrar</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="dados"></div>
            </div>
        </div>
    </div>
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Cadastro de Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form>
                    <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control input-bottom2" id="nome" placeholder="Digite seu nome">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control input-bottom2" id="email" placeholder="Digite seu email">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="senha1">Senha</label>
                                    <input type="password" class="form-control input-bottom2" id="senha1" placeholder="Digite sua senha">
                                </div>
                                <div class="col-md-6">
                                    <label for="senha2">Conf. Senha</label>
                                    <input type="password" class="form-control input-bottom2" id="senha2" placeholder="Digite sua senha">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button id="btn_cad_usu" class="btn btn-outline-success btn-block">ENVIAR</button>
                    <button id="btn_loading" class="btn btn-outline-success btn-block" disabled> <span class="spinner-border spinner-border-sm"></span> Loading ...</button>
                </div>
              </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="alterar">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Alterar Usuário</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form>
                    <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control input-bottom2" id="nome_alter" placeholder="Digite seu nome">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control input-bottom2" id="email_alter" placeholder="Digite seu email">
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button id="btn_alt_usu" class="btn btn-outline-success btn-block">ENVIAR</button>
                    <button id="btn_loading_alt" class="btn btn-outline-success btn-block" disabled> <span class="spinner-border spinner-border-sm"></span> Loading ...</button>
                </div>
              </div>
            </div>
        </div>
    </div>
</body>


</html>