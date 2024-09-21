<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID | Copiar "ID DE CLIENTE"
$google_client->setClientId('32484368864-3ic2d92jb7kqpa13vo0cia7nuj80fvnl.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI | URL AUTORIZADO
$google_client->setRedirectUri('http://localhost:8083/APICLIENTEDEGOOGLE/ProyectoOauthGoogle/index.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>