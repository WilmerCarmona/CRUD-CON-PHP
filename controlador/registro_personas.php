<?php
if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) &&
        !empty($_POST["apellidos"]) &&
        !empty($_POST["identif"]) && 
        !empty($_POST["fecha"]) &&
        !empty($_POST["correo"])) {
        
        $nombre    = htmlspecialchars(trim($_POST["nombre"]), ENT_QUOTES, 'UTF-8');
        $apellidos = htmlspecialchars(trim($_POST["apellidos"]), ENT_QUOTES, 'UTF-8');
        $identif   = intval($_POST["identif"]);
        $fecha     = htmlspecialchars(trim($_POST["fecha"]), ENT_QUOTES, 'UTF-8');
        $email     = filter_var($_POST["correo"], FILTER_SANITIZE_EMAIL);


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

        $verificar = $base->query("SELECT * FROM personas WHERE iden_per = '$identif'");
        if ($verificar->num_rows > 0) {
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Identificación duplicada',
                    text: 'Este número de identificación ya está registrado.'
                });
            </script>";
        } else {
            $sql = $base->query("INSERT INTO personas(nom_per, ape_per, iden_per, fecha_per, email_per)
                                 VALUES('$nombre', '$apellidos', '$identif', '$fecha', '$email')");
            if ($sql == 1) {
                echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: '¡Registro exitoso!',
                        text: 'La persona ha sido registrada correctamente.',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(() => {
                        window.location.href = 'index.php';
                    });
                </script>";
            } else {
                echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error al registrar persona.'
                    });
                </script>";
            }
        }
    } else {
        echo "<script>
            Swal.fire({
                icon: 'warning',
                title: 'Campos vacíos',
                text: 'Ningún campo debe estar vacío.'
            });
        </script>";
    }
}
?>
