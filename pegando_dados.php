<?php
    $cd = $_POST['cd'];

    include "conexao.php";

    $sql = $con->prepare("SELECT * FROM usu WHERE cd_usu = '$cd'");
    $passed = $sql->execute();

    $users = $sql->fetch(PDO::FETCH_OBJ);

    if($passed){
        $array = array(
            "msg" => TRUE,
            "nome" => $users->nm_usu,
            "email" => $users->nm_email,
        );

        echo json_encode($array);
    }else 
    {
        $array = array(
            "msg" => FALSE,
        );

        echo json_encode($array);
    }
?>