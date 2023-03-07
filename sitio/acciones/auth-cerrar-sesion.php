<?php

use App\Auth\Auth;

require_once __DIR__ . '/../setup/setup.php';

$auth = new Auth();
$auth->cerrarSesion();

$_SESSION['message_success'] = "Se cerró la sesión del usuario";
header("Location: ../index.php?seccion=login");
