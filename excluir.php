<?php
    $cd = $_POST['cd'];

    include "conexao.php";

    $sql = $con->prepare("DELETE FROM usu WHERE cd_usu = '$cd'");
    $passed = $sql->execute();

    if($passed){
        $array = array(
            "msg" => TRUE,
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