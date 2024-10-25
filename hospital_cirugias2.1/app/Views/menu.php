<!DOCTYPE html>
<html>
<head>
    <title>Menú Principal</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="<?php echo site_url('materias'); ?>">Listar Materiales</a></li>
            <li><a href="<?php echo site_url('materias/create'); ?>">Agregar Materiales</a></li>
            <li><a href="<?php echo site_url('alumnos'); ?>">Listar Turnos</a></li>
            <li><a href="<?php echo site_url('alumnos/create'); ?>">Agregar Turnos</a></li>
            <li><a href="<?php echo site_url('desarrollador'); ?>">Desarrollador</a></li>
        </ul>
    </nav>

    <?php 
    // Aquí se carga la vista principal definida en 'content_view'
    if (isset($content_view)) {
        echo view($content_view); 
    }
    ?>
</body>
</html>
