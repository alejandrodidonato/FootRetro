<?php

use App\Auth\Auth;
use App\Models\Camiseta;
use App\Models\Usuario;
use App\Models\Carrito;

require_once __DIR__ . '/../setup/setup.php';




$auth = new Auth();


if ( $auth->estaAutenticado() )
{
    try {
        $carrito = new Carrito();
        $carrito->finalizar($_SESSION['id']);

        $carrito->vaciarCarrito();
        header("Location: ../index.php?seccion=gracias");

    } catch(Exception $e )
    {
        $_SESSION['message_error'] = "¡Error! No se pudo efectuar la compra. Por favor, volvé a intentar en unos minutos.";
        header('Location: ../index.php?seccion=carrito');
    }

    
    
}
else
{
    header("Location: ../index.php?seccion=login");
    exit;
}


