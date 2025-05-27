<?php

    if(!empty($_POST["btnregistrar"])){
        if(!empty($_POST["nombre"]) and
         !empty($_POST["apellidos"]) and
         !empty($_POST["identif"]) and
         !empty($_POST["fecha"])and 
         !empty($_POST["correo"])){
            $nombre=$_POST["nombre"];
            $apellidos=$_POST["apellidos"];
            $iden=$_POST["identif"];
            $fech=$_POST["fecha"];
            $email=$_POST["correo"];

            if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/", $nombre)) {
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Nombre inválido',
                        text: 'Los nombres solo deben contener letras y espacios.'
                    });
                </script>";
                return;
             }

            if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/", $apellidos)) {
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Apellidos inválidos',
                        text: 'Los apellidos solo deben contener letras y espacios.'
                    });
                </script>";
                return;
            }

            $sql=$base->query("UPDATE personas SET nom_per='$nombre' , ape_per='$apellidos' , iden_per=$iden , fecha_per='$fech' , email_per='$email' where iden_per=$iden ");
            if ($sql == 1) {
                header("location:modificar.php?iden=$iden&editado=1");
                exit();
            } else {
                echo "<div class='alert alert-danger'>Error al modificar persona</div>";
            }
              
        }else{
            echo "<div class='alert alert-warning'>Ningún campo debe de estar vacio</div>";
        }
    }  

?>