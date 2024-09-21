

<?php
session_start();
if (!isset($_SESSION['access_token'])) {  
   header('location: index.php');
   exit();
}

include('conexion.php');

// Ejecutar el script de Python para la acci�n solicitada
$accion = isset($_GET['accion']) ? $_GET['accion'] : "";

if ($accion == "crear") {
    $id = $_POST["id"];
    $descripcion = $_POST["descripcion"];
    $costo = $_POST["costo"];
    $precioventa = $_POST["precioventa"];

    $query = "INSERT INTO productos (ID_Producto, Descripcion, Costo, Precio_Venta) VALUES ('$id', '$descripcion', '$costo', '$precioventa')";
    if ($conexion->query($query) === TRUE) {
        echo "Producto agregado con éxito";
    } else {
        echo "Error al agregar el producto: " . $conexion->error;
    }
    Header("location: ./productos.php");
}

if ($accion == 'actualizar') {
    $output = shell_exec('python3 C:\Program Files\xampp\htdocs\APICLIENTEDEGOOGLE\ProyectoOauthGoogle/actualizar_producto.py');
} elseif ($accion == 'eliminar') {
    $output = shell_exec('python3 C:\Program Files\xampp\htdocs\APICLIENTEDEGOOGLE\ProyectoOauthGoogle/eliminar_producto.py');
}

?>

<html>
    <head>
        <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    
    
</head>
    <body>
        <h3><a href="?accion=listar">Listar productos</a></h3>

<?php
    if ($accion == 'listar') {
        $query = "SELECT * FROM productos ORDER BY Descripcion ASC";
        $resultado = $conexion->query($query);

        if ($resultado && $resultado->num_rows > 0) {
            while($fila = $resultado->fetch_assoc()) {
?>
        <div class="row">
            <div class="col s12 m6">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title"><?php echo $fila['Descripcion'] ?></span>
                    <p>Costo: <?php echo $fila['Costo'] ?></p>
                    <p>Precio Venta: <?php echo $fila['Precio_Venta'] ?></p>
                </div>
                <div class="card-action">
                <a href="#">Comprar</a>
                <a href="#">Agregar al carrito</a>
                </div>
            </div>
            </div>
        </div>

<?php
            }
        }
    }

?>
        <h3><a href="?accion=registrar"">Registrar nuevo producto</a></h3>

        <?php
    if ($accion == 'registrar') {
?>
            <div class="row">
        <form class="col s12" method="POST" action="?accion=crear">
        <div class="row">
            <div class="input-field col s6">
            <input placeholder="Placeholder" id="id" type="text" name="id" class="validate">
            <label for="id">ID</label>
            </div>
            <div class="input-field col s6">
            <input placeholder="Placeholder" id="descripcion" type="text" name="descripcion" class="validate">
            <label for="description">Descripcion</label>
            </div>
            <div class="input-field col s6">
            <input id="costo" type="number" name="costo" class="validate">
            <label for="costo">Costo</label>
            </div>
        </div>
        <div class="row">
        <div class="input-field col s6">
            <input id="last_name" type="number" name="precioventa" class="validate">
            <label for="last_name">Precio de Venta</label>
            </div>
        </div>
        
        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
            <i class="material-icons right">Registrar Producto</i>
        </button>
        </form>
    </div>

<?php
    }
?>
        

        <h3><a href="?accion=actualizar">Actualizar producto</a></h3>
        <h3><a href="?accion=eliminar">Eliminar producto</a></h3>
        <h3><a href="index.php">Regresar al inicio</a></h3>

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    </body>
</html>
