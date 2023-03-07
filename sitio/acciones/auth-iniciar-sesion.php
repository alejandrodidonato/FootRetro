<?php

use App\Auth\Auth;

require_once __DIR__ . '/../setup/setup.php';

$email = $_POST['email'];
$password = $_POST['password'];
$id = $_POST['id'];

$auth = new Auth();



if ($auth->iniciarSesion($email, $password))
{
    $_SESSION['email'] = $email;
    header("Location: ../index.php?seccion=home");
    exit;
}
else
{
    $_SESSION['old_data'] = $_POST;

    header("Location: ../index.php?seccion=login");
    exit;
}