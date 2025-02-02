<?php

/**
 * Gestión del blog.
 * 
 * Muestra una interfaz para gestionar las entradas del blog, incluyendo la creación y visualización de entradas.
 */

// Incluir la lógica centralizada
include "../util/logica.php";

// Cargar la lógica para la sección "blog"
$config = cargarLogica("blog_posts", "blog");
extract($config);  // Convertir el array en variables ($conexion, $tabla, $seccion, $message, $registros)
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión del Blog</title>
    <link rel="stylesheet" href="../css/dashboard.css"> <!-- Estilos generales -->
</head>

<body>
    <?php include "../includes/header.php"; ?> <!-- Incluir el encabezado -->
    <main>
        <h2>Gestión del Blog</h2>

        <!-- Mensaje de confirmación o error -->
        <?php if (!empty($message)) : ?>
            <p class="message"><?= $message ?></p>
        <?php endif; ?>

        <!-- Enlace para crear una nueva entrada -->
        <a href="../crud/create.php?tabla=<?= htmlspecialchars($tabla) ?>&seccion=<?= htmlspecialchars($seccion) ?>">Crear Nueva Entrada</a>
        <br><br>

        <!-- Lista de entradas del blog -->
        <h3>Entradas del Blog</h3>
        <?php
        include "../util/tabla_dinamica.php";  // Incluir la lógica de la tabla dinámica
        mostrarTablaDinamica($conexion, $tabla, $seccion);  // Mostrar la tabla de entradas
        ?>
    </main>
    <?php include "../includes/footer.php"; ?> <!-- Incluir el pie de página -->
</body>

</html>