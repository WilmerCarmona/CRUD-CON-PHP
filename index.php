<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/8ea4c3725a.js" crossorigin="anonymous"></script>  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>
<body>

   <strong><h1 class="titulo-index">Personal del trabajo</h1></strong> 
        <?php
            include "modelo/base.php";
            include "controlador/eliminar_persona.php";
        ?>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="registrar.php" class="btn btn-registrar">Registrar nueva persona</a>
                <form method="GET" class="d-flex mb-3" role="search">
                    <input class="form-control me-3" type="search" name="buscar" placeholder="Buscar por nombre o apellido" aria-label="Buscar"
                        value="<?= isset($_GET['buscar']) ? htmlspecialchars($_GET['buscar']) : '' ?>">
                    <button class="btn btn-outline-buscar" type="submit">Buscar</button>
                </form>
            </div>

        <div class="col-12 p-4">

            <table class="table table-index table-striped ">
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

                        $registrosPorPagina = 7;

                            $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
                            if ($pagina < 1) $pagina = 1;

                            $inicio = ($pagina - 1) * $registrosPorPagina;

                        $sql=$base->query("select * from personas limit $inicio, $registrosPorPagina");
                        
                        while($datos=$sql->fetch_object()){
                                $totalRegistros = $base->query("select count(*) as total from personas")->fetch_object()->total;
                                $totalPaginas = ceil($totalRegistros / $registrosPorPagina);
                            ?>
                            
                     <tr>
                    
                        <td><?= $datos->id_per?></td>
                        <td><?= $datos->nom_per?></td>
                        <td><?= $datos->ape_per?></td>
                        <td><?= $datos->iden_per?></td>
                        <td><?= $datos->fecha_per?></td>
                        <td><?= $datos->email_per?></td>
                        <td>
                            <a href="modificar.php?iden=<?= $datos->iden_per?>" class="btn btb-small btn-info"><i class="fa-solid fa-user-pen"></i></a>
                            <a href="#" class="btn btb-small btn-danger btn-eliminar" data-id="<?= $datos->iden_per ?>">
                                <i class="fa-solid fa-user-xmark"></i>
                            </a>

                        </td>
                    </tr>

                        <?php }
                    
                    ?>
                    
                </tbody>
            </table>
              
                <div class="d-flex justify-content-center mt-3">
                    <nav>
                        <ul class="pagination">
                        <?php if ($pagina > 1): ?>
                            <li class="page-item"><a class="page-link" href="index.php?pagina=<?= $pagina - 1 ?>">Anterior</a></li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                            <li class="page-item <?= $i == $pagina ? 'active' : '' ?>">
                            <a class="page-link" href="index.php?pagina=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($pagina < $totalPaginas): ?>
                            <li class="page-item"><a class="page-link" href="index.php?pagina=<?= $pagina + 1 ?>">Siguiente</a></li>
                        <?php endif; ?>
                        </ul>
                    </nav>
                </div>                                        

        </div>

        <script>
            document.querySelectorAll('.btn-eliminar').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const id = this.getAttribute('data-id');

                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "¡No podrás revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = `index.php?iden=${id}&confirmado=1`;
                        }
                    });
                });
            });
        </script>

            <?php if (isset($_GET['mensaje'])): ?>
                <script>
                    <?php if ($_GET['mensaje'] === 'eliminado'): ?>
                        Swal.fire({
                            title: "¡Eliminado!",
                            text: "La persona ha sido eliminada correctamente.",
                            icon: "success"
                        });
                    <?php elseif ($_GET['mensaje'] === 'error'): ?>
                        Swal.fire({
                            title: "Error",
                            text: "No se pudo eliminar a la persona.",
                            icon: "error"
                        });
                    <?php endif; ?>

                    if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.pathname);
                    }
        </script>
            <?php endif; ?>

    <script src="https://kit.fontwasome.com/646ac4fad6.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>