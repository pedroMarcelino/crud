<?php
    session_start();

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    include "conexao.php";

    $sql = $con->query("SELECT * FROM adm WHERE nm_email = '$email'");
    
    $users = $sql->fetch(PDO::FETCH_OBJ);

    $count = $sql->rowCount();

    if($count > 0){
    
        if(($email == $users->nm_email) && ($senha == $users->nm_senha)){

            $_SESSION['codigo'] = $users->cd_adm;

            $array = array(
                "msg" => TRUE,
            );

            echo json_encode($array);
        
    	}
    	else{
    	    $array = array(
                "msg" => FALSE,
                "email" => $email,
            );

            echo json_encode($array);
        }
    }else{
        $array = array(
            "msg" => "user_not_found",
            "email" => $email,
        );

        echo json_encode($array);
    }
?>