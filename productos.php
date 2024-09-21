<?php
session_start();
if (!isset($_SESSION['composer require guzzlehttp/guzzle google/apiclient -W'])) {  #access_token
    header('location: index.php');
    exit();
}

// Ejecutar el script de Python para la acción solicitada
$accion = isset($_GET['accion']) ? $_GET['accion'] : 'listar';

$output = 'Salida';

if ($accion == 'listar') {
    $output = shell_exec('python3 C:\Program Files\xampp\htdocs\API CLIENTE DE GOOGLE/listar_productos.py');
} elseif ($accion == 'registrar') {
    // Toma valores del formulario para registrar un nuevo producto
    $output = shell_exec('python3 C:\Program Files\xampp\htdocs\API CLIENTE DE GOOGLE/registrar_producto.py');
} elseif ($accion == 'actualizar') {
    $output = shell_exec('python3 C:\Program Files\xampp\htdocs\API CLIENTE DE GOOGLE/actualizar_producto.py');
} elseif ($accion == 'eliminar') {
    $output = shell_exec('python3 C:\Program Files\xampp\htdocs\API CLIENTE DE GOOGLE/eliminar_producto.py');
}

echo "<pre>$output</pre>";
?>

<html>
    <body>
        <h3><a href="?accion=listar">Listar productos</a></h3>
        <h3><a href="?accion=registrar">Registrar nuevo producto</a></h3>
        <h3><a href="?accion=actualizar">Actualizar producto</a></h3>
        <h3><a href="?accion=eliminar">Eliminar producto</a></h3>
        <h3><a href="index.php">Regresar al inicio</a></h3>
    </body>
</html>
