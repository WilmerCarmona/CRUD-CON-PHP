<?php
if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) and
        !empty($_POST["apellidos"]) and
        !empty($_POST["identif"]) and 
        !empty($_POST["fecha"]) and
        !empty($_POST["correo"])) {
        
        $nombre = $_POST["nombre"];  
        $apellidos = $_POST["apellidos"];
        $identif = $_POST["identif"];
        $fecha = $_POST["fecha"];
        $email = $_POST["correo"];

        if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/", $nombre)) {
            echo '<div class="alert alert-fallo">Los nombres solo deben contener letras y espacios.</div>';
            return;
        }

        if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/", $apellidos)) {
            echo '<div class="alert alert-fallo">Los apellidos solo deben contener letras y espacios.</div>';
            return;
        }

        $verificar = $base->query("SELECT * FROM personas WHERE iden_per = '$identif'");
        if ($verificar->num_rows > 0) {
            echo '<div class="alert alert-fallo">Este número de identificación ya está registrado</div>';
        } else {
            $sql = $base->query("insert into personas(nom_per, ape_per, iden_per, fecha_per, email_per)
                                 values('$nombre', '$apellidos', '$identif', '$fecha', '$email')");
            if ($sql == 1) {
                header("Location: " . $_SERVER['PHP_SELF'] . "?registro=exito");
                exit();
            } else {
                echo '<div class="alert alert-error">Error al registrar persona</div>';
            }
        }
    } else {
        echo '<div class="alert alert-danger">Alguno de los campos está vacío</div>';
    }
}

if (!empty($_GET["registro"]) && $_GET["registro"] == "exito") {
    echo '<div class="alert-registrar">La persona se ha registrado</div>';
}
?>