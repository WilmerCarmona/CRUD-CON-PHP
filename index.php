<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/8ea4c3725a.js" crossorigin="anonymous"></script>
</head>
<body>

   <strong><h1 class="titulo-index">Personal del trabajo</h1></strong> 
        <?php
            include "modelo/base.php";
            include "controlador/eliminar_persona.php";
        ?>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="mb-0">Formulario de Personas</h2>
                <a href="registrar.php" class="btn btn-success">Registrar nueva persona</a>
            </div>

        <div class="col-11 p-4">

            <table class="table table-dark table-striped ">
                <thead>
                    <tr class="text-center">
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">APELLIDOS</th> 
                        <th scope="col">IDENTIFICACIÓN</th>
                        <th scope="col">NACIMIENO</th>
                        <th scope="col">CORREO</th>
                        <th scope="col">OPCIONES</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "modelo/base.php";
                        $sql=$base->query("select * from personas");
                        
                        while($datos=$sql->fetch_object()){?>

                     <tr>
                    
                        <td><?= $datos->id_per?></td>
                        <td><?= $datos->nom_per?></td>
                        <td><?= $datos->ape_per?></td>
                        <td><?= $datos->iden_per?></td>
                        <td><?= $datos->fecha_per?></td>
                        <td><?= $datos->email_per?></td>
                        <td>
                            <a href="modificar.php?iden=<?= $datos->iden_per?>" class="btn btb-small btn-info"><i class="fa-solid fa-user-pen"></i></a>
                            <a href="index.php?iden=<?= $datos->iden_per?>" class="btn btb-small btn-danger"><i class="fa-solid fa-user-xmark"></i></a>
                        </td>
                    </tr>

                        <?php }
                    
                    ?>
                    
                </tbody>
            </table>
        </div>
    <script src="https://kit.fontwasome.com/646ac4fad6.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>