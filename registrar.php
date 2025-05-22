<?php
include "modelo/base.php"; 

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Persona</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container mt-4 formulario-index">
    <h1 class="text-center h1-registrar">Registrar Persona</h1>
    <?php
    include "controlador/registro_personas.php";
    ?>

    <form method="POST" class="mx-auto col-md-5">
      <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Apellidos</label>
        <input type="text" name="apellidos" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Número de identificación</label>
        <input type="number" name="identif" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Fecha de nacimiento</label>
        <input type="date" name="fecha" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Correo electrónico</label>
        <input type="email" name="correo" class="form-control" required>
      </div>
      <div class="form-text">No se compartiran los datos, solo es para cumplir con el procedimiento</div>
      <center>
        <button type="submit" class="btn-registra btn btn-success" name="btnregistrar" value="ok">Registrar</button>
        <a href="index.php" class="btn btn-volver">Volver</a>
      </center>
    </form>
  </div>
</body>
</html>

