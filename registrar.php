<?php
include "modelo/base.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registrar Persona</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container mt-3 formulario-index">
    <h1 class="text-center titulo-regis">Registrar Persona</h1>
    <form method="POST" class="mx-auto col-md-4">
      <?php include "controlador/registro_personas.php"; ?>

      <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control">
      </div>
      <div class="mb-3">
        <label>Apellidos</label>
        <input type="text" name="apellidos" class="form-control">
      </div>
      <div class="mb-3">
        <label>Número de identificación</label>
        <input type="number" name="identif" class="form-control">
      </div>
      <div class="mb-3">
        <label>Fecha de nacimiento</label>
        <input type="date" name="fecha" class="form-control">
      </div>
      <div class="mb-3">
        <label>Correo electrónico</label>
        <input type="email" name="correo" class="form-control">
      </div>
      <center><button type="submit" class="btn-registra" value="ok">Registrar</button>
      <a href="index.php" class="btn btn-volver">Volver</a></center>
    </form>
  </div>
</body>
</html>
