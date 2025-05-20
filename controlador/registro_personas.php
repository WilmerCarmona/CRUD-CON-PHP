<?php
    if(!empty($_POST["btnregistrar"])) {
        if (!empty($_POST["nombre"]) and 
            !empty($_POST["apellidos"]) and
            !empty($_POST["identif"]) and 
            !empty($_POST["fecha"]) and
            !empty($_POST["correo"])){
          
            $nombre=$_POST["nombre"];  
            $apellidos=$_POST["apellidos"];
            $identif=$_POST["identif"];
            $fecha=$_POST["fecha"];
            $email=$_POST["correo"];

            $sql=$base->query("insert into personas(nom_per,ape_per,iden_per,fecha_per,email_per)values('$nombre','$apellidos','$identif','$fecha','$email') ");
                if ($sql==1) {
                 echo '<div class="alert alert-success">La persona se ha registrado correctamente</div>';
                } else {
                    echo '<div class="alert alert-darger">Error ala registrar esta persona</div>';
                }
                
        }else{
            echo '<div class="alert alert-darger">Alguno de los campos está vacío</div' ;
        }
    }
?>