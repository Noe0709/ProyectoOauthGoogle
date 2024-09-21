<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID | Copiar "ID DE CLIENTE"
$google_client->setClientId('432540372977-4o03uc5ek4uq5j0j6lqbip12c4dn8krm.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI | URL AUTORIZADO
$google_client->setRedirectUri('http://localhost/accesogmail/index.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>