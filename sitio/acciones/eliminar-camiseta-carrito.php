<?php

use App\Auth\Auth;
use App\Models\Camiseta;
use App\Models\Usuario;
use App\Models\Carrito;

require_once __DIR__ . '/../setup/setup.php';

$carrito = new Carrito();

$auth = new Auth();

$id = (int) $_GET['id'];

if ( $auth->estaAutenticado() )
{
    $carrito->eliminarItem($id);
    header("Location: ../index.php?seccion=carrito");
    
}
else
{
    header("Location: ../index.php?seccion=login");
    exit;
}


