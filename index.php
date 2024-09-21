<?php
//Include Configuration File
include('config.php');

$login_button = '';

// Si se recibe el código de autenticación de Google
if (isset($_GET["code"])) {

    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
    if (!isset($token['error'])) {

        $google_client->setAccessToken($token['access_token']);
        $_SESSION['access_token'] = $token['access_token'];

        // Obtener información del perfil de usuario
        $google_service = new Google_Service_Oauth2($google_client);
        $data = $google_service->userinfo->get();

        if (!empty($data['given_name'])) {
            $_SESSION['user_first_name'] = $data['given_name'];
        }

        if (!empty($data['family_name'])) {
            $_SESSION['user_last_name'] = $data['family_name'];
        }

        if (!empty($data['email'])) {
            $_SESSION['user_email_address'] = $data['email'];
        }

        if (!empty($data['picture'])) {
            $_SESSION['user_image'] = $data['picture'];
        }
    }
}

// Botón de login si no está autenticado
if (!isset($_SESSION['access_token'])) {
    $login_button = '<a href="' . $google_client->createAuthUrl() . '" style=" background: #dd4b39; border-radius: 5px; color: white; display: block; font-weight: bold; padding: 20px; text-align: center; text-decoration: none; width: 200px;">Login With Google</a>';
}
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Login con Google y CRUD de Productos</title>
</head>
<body>
    <div class="container">
        <br />
        <h2 align="center">Inicio de sesión con <img src="img/logoGoogle.png"></h2>
        <br />

        <div class="col-lg-4 offset-4">
            <div class="card">
                <?php
                if ($login_button == '') {
                    echo '<div class="card-header">Bienvenido</div><div class="card-body">';
                    echo '<img src="' . $_SESSION["user_image"] . '" class="rounded-circle container"/>';
                    echo '<h3><b>Nombre :</b> ' . $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'] . '</h3>';
                    echo '<h3><b>Email :</b> ' . $_SESSION['user_email_address'] . '</h3>';
                    echo '<h3><a href="logout.php">Logout</a></h3>';

                    // Agregamos el enlace para listar los productos
                    echo '<h3><a href="productos.php">Gestionar Productos</a></h3></div>';
                } else {
                    echo '<div align="center">' . $login_button . '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
