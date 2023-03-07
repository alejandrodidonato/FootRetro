<?php

use App\Auth\Auth;
use App\Models\Camiseta;

require_once __DIR__ . '/../../setup/setup.php';

$auth = new Auth();


$id = $_POST['id'];

try {
    $camiseta = new Camiseta();
    $camiseta->eliminar($id);

    $_SESSION['message_success'] = "¡Listo! La camiseta fue eliminada.";

    header("Location: ../index.php?seccion=home");
    exit;
} catch (Exception $e ){
    $_SESSION['message_error'] = "¡Error! La camiseta no se eliminó. Por favor, volvé a intentar en unos minutos.";
    header("Location: ../index.php?seccion=camisetas");
    exit;
}