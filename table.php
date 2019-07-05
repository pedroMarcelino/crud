
<?php 
    include "conexao.php";

    $sql = $con->query("SELECT * FROM usu");
?>

<table class="table table-dark table-hover">
    <thead>
        <tr class="center">
            <th scope="col">Codigo</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
    <?php
        while($users = $sql->fetch(PDO::FETCH_OBJ)){
    ?>
        <tr class="center">
            <th scope="row"><?php echo $users->cd_usu?></th>
            <td><?php echo $users->nm_usu?></td>
            <td><?php echo $users->nm_email?></td>
            <td class="btns<?php echo $users->cd_usu?>"> 
                <div class="row">
                    <div class="col-md-5">
                        <button id="btn_alterar" data-toggle="modal" data-target="#alterar" class="btn btn-outline-warning btn-block btn-cont" value="<?php echo $users->cd_usu?>"><i class="fas fa-user-edit"></i> Alterar</button>
                    </div>
                    <div class="col-md-5">
                        <button id="btns<?php echo $users->cd_usu?>" class="btn btn2 btn-outline-danger btn-block btn-cont" value="<?php echo $users->cd_usu?>"><i class="fas fa-user-minus"></i> Excluir</button>
                    </div>
                </div> 
            </td>
            <td class="hide" id="conf_btn<?php echo $users->cd_usu?>">
                <div class="row">
                    <div class="col-md-5">
                        <button id=btn_conf<?php echo $users->cd_usu?> class="btn btn-conf btn-outline-success btn-cont btn-block"><i class="fas fa-check"></i></button>
                    </div>
                    <div class="col-md-5">
                        <button id="btn_ancor<?php echo $users->cd_usu?>" class="btn btn-outline-danger btn-cont btn-block btn-cancel"><i class="fas fa-times"></i></button>  
                    </div>
                </div>
            </td>
        </tr>

    <?php
        }
    ?>
    </tbody>
</table>