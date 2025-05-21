<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8ea4c3725a.js" crossorigin="anonymous"></script>
</head>
<body>
    <h1 class="text-center p-2">FORMULARIO DE PERSONAS</h1>

        <?php
            include "modelo/base.php";
            include "controlador/eliminar_persona.php";
        ?>

    <div class="container-fluid row">
        <form class="col-3" method="POST">
           <h3 class="text-center text-secondary p-1">Registrar persona</h3> 

                <?php
                    include "controlador/registro_personas.php";               
                ?>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre de la persona</label>
                <input type="text" class="form-control" name="nombre">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellidos de la persona</label>
                <input type="text" class="form-control" name="apellidos">  
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Número de indentificación</label>
                <input type="number" class="form-control" name="identif">  
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" name="fecha">  
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo electronico</label>
                <input type="email" class="form-control" name="correo">
                <div class="form-text">No compartiremos los datos con nadie, solo es para cumplir con el procedimiento y enviar informacion privada</div>
            </div> 
            
            <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
        </form>
        <div class="col-9 p-4">

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