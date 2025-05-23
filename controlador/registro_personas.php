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

        $verificar = $base->query("SELECT * FROM personas WHERE iden_per = '$identif'");
        if ($verificar->num_rows > 0) {
            echo '<div class="alert alert-danger">Este número de identificación ya está registrado.</div>';
        } else {
            
            
        }
    } else {
        echo '<div class="alert alert-danger">Alguno de los campos está vacío</div>';
    }
}

if (!empty($_GET["registro"]) && $_GET["registro"] == "exito") {
    echo '<div class="alert-registrar">La persona se ha registrado</div>';
}
?>