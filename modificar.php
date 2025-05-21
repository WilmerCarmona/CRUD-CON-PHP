<?php

include "modelo/base.php";
 $iden=$_GET["iden"];
 $sql=$base->query("select * from personas where iden_per = $iden");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    
    <form class="col-3 m-auto" method="POST">
           <h3 class="text-center text-secondary p-1">Modificar persona</h3> 

                <?php
                    include "controlador/editar_persona.php";
                    while($datos=$sql->fetch_object()){
                 ?>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre de la persona</label>
                            <input type="text" class="form-control" name="nombre" value="<?= $datos->nom_per ?>">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Apellidos de la persona</label>
                            <input type="text" class="form-control" name="apellidos" value="<?= $datos->ape_per ?>">  
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Número de indentificación</label>
                            <input type="number" class="form-control" name="identif" value="<?= $datos->iden_per ?>" readonly>  
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Fecha de nacimiento</label>
                            <input type="date" class="form-control" name="fecha" value="<?= $datos-> fecha_per?>">  
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Correo electronico</label>
                            <input type="email" class="form-control" name="correo" value="<?= $datos->email_per?>">
                            <div class="form-text">No compartiremos los datos con nadie, solo es para cumplir con el procedimiento y enviar informacion privada</div>
                        </div> 
                    <?php
                    }
                ?>                                       
            <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Editar</button> <!-- Editar este boton -->
    </form>
            
</body>
</html>