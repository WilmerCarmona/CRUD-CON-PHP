<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentación Técnica - CRUD en PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <h1 class="text-center mb-4">📘 Documentación Técnica – CRUD de Personas en PHP</h1>

        <section>
            <h2>📝 Descripción del Proyecto</h2>
            <p>Este es un sistema CRUD (Crear, Leer, Actualizar, Eliminar) básico desarrollado en PHP, con una interfaz visual usando Bootstrap. Permite gestionar los datos de personas, incluyendo nombre, apellidos, número de identificación, fecha de nacimiento y correo electrónico.</p>
        </section>

        <section>
            <h2>🛠️ Tecnologías Usadas</h2>
            <ul>
                <li><strong>PHP</strong> >=7.x</li>
                <li><strong>MySQL</strong> >=5.7</li>
                <li><strong>Bootstrap</strong> 5.2.3</li>
                <li><strong>JavaScript</strong> (Vanilla)</li>
                <li><strong>SweetAlert2</strong> 11</li>
                <li><strong>Font Awesome</strong> 6+</li>
            </ul>
        </section>

        <section>
            <h2>📁 Estructura de Archivos</h2>
            <pre><code>/crud-personas/
├── index.php
├── registrar.php
├── modificar.php
├── controlador/
│   ├── registrar_persona.php
│   ├── editar_persona.php
│   └── eliminar_persona.php
├── modelo/
│   └── base.php
├── styles.css </code></pre>
        </section>

        <section>
            <h2>📋 Funcionalidades del CRUD</h2>
            <h4>1. Crear Persona</h4>
            <ul>
                <li>Página: <code>registrar.php</code></li>
                <li>Campos: nombre, apellidos, identificación, fecha de nacimiento, correo</li>
                <li>Validaciones: HTML5 + JS + PHP</li>
            </ul>

            <h4>2. Leer/Listar Personas</h4>
            <ul>
                <li>Página: <code>index.php</code></li>
                <li>Funcionalidades: búsqueda, paginación, botones de acción</li>
            </ul>

            <h4>3. Actualizar Persona</h4>
            <ul>
                <li>Página: <code>modificar.php</code></li>
                <li>Identificación no editable</li>
            </ul>

            <h4>4. Eliminar Persona</h4>
            <ul>
                <li>Confirmación con SweetAlert2</li>
            </ul>
        </section>

        <section>
            <h2>🔐 Validaciones</h2>
            <ul>
                <li><strong>HTML:</strong> required, minlength, maxlength, pattern</li>
                <li><strong>JS:</strong> SweetAlert2 para confirmar acciones</li>
                <li><strong>PHP:</strong> Sanitización de entradas</li>
            </ul>
        </section>

        <section>
            <h2>🧮 Base de Datos</h2>
            <pre><code>CREATE TABLE personas (
    id_per INT AUTO_INCREMENT PRIMARY KEY,
    nom_per VARCHAR(30) NOT NULL,
    ape_per VARCHAR(50) NOT NULL,
    iden_per BIGINT UNIQUE NOT NULL,
    fecha_per DATE NOT NULL,
    email_per VARCHAR(100) NOT NULL
);</code></pre>
        </section>

        <section>
            <h2>✅ Recomendaciones para Producción</h2>
            <ul>
                <li>Usar consultas preparadas (prepare y bind_param)</li>
                <li>Validación y sanitización estricta</li>
                <li>Uso de sesiones para autenticación</li>
                <li>Implementar tokens CSRF</li>
            </ul>
        </section>

        <section>
            <h2>🔄 Paginación</h2>
            <p>Usa <code>LIMIT</code> y <code>OFFSET</code> con número de registros por página definidos como <strong>7</strong>.</p>
        </section>

        <section>
            <h2>🎨 Estilos</h2>
            <p>Diseño personalizado con Bootstrap 5 y estilos en <code>styles.css</code>.</p>
        </section>

        <section>
            <h2>📦 Librerías externas</h2>
            <ul>
                <li>Bootstrap 5</li>
                <li>Font Awesome</li>
                <li>SweetAlert2</li>
            </ul>
        </section>

        <section>
            <h2>📈 Mejoras Futuras</h2>
            <ul>
                <li>Validación AJAX</li>
                <li>Exportar datos</li>
                <li>Login con roles</li>
                <li>Filtros avanzados</li>
                <li>API REST</li>
            </ul>
        </section>
    </div>
</body>
</html>
