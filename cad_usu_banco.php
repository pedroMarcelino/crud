<?php
    session_start();

    include "conexao.php";

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = $con->prepare("INSERT INTO usu(cd_usu, nm_usu, nm_email, nm_senha) VALUES (null, '$nome', '$email', '$senha')");
    $passed = $sql->execute();

    if($passed){
        $array = array(
            "msg" => TRUE,
        );

        echo json_encode($array);
    }else{
        $array = array(
            "msg" => FALSE,
        );

        echo json_encode($array);
    }

?>