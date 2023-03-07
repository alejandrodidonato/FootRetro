<?php

use App\Auth\Auth;

require_once __DIR__ . '/../../setup/setup.php';

$email = $_POST['email'];
$password = $_POST['password'];

$auth = new Auth();

if($auth->esAdmin($email))
{
    if ($auth->iniciarSesion($email, $password))
    {
        $_SESSION['message_success'] = "Inicio de sesión exitoso.";

        header("Location: ../index.php?seccion=home");
        exit;
    }
    else
    {
        $_SESSION['message_error'] = "El usuario y/o contraseña son incorrectos.";
        $_SESSION['old_data'] = $_POST;

        header("Location: ../index.php?seccion=login");
        exit;
    }
}
else
{
    $_SESSION['message_error'] = "El usuario debe ser administrador para ingresar al panel.";
    $_SESSION['old_data'] = $_POST;

    header("Location: ../index.php?seccion=login");
    exit;
}