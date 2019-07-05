<?php
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cd = $_POST['cd'];

    include "conexao.php";

    $sql = $con->prepare("UPDATE usu SET nm_usu = '$nome', nm_email = '$email' WHERE cd_usu = '$cd'");
    $return = $sql->execute();

    if($return){
        $array = array(
            "msg"=>TRUE
        );

        echo json_encode($array);
    }else{
        $array = array(
            "msg" => FALSE
        );

        echo json_encode($array);
    }
?>