<?php

use App\Auth\Auth;
use App\Models\Camiseta;
use App\Validators\ValidacionCamiseta;

require_once __DIR__ . '/../../setup/setup.php';

$auth = new Auth();

if(!$auth->estaAutenticado())
{
    $_SESSION['message_error'] = "Por favor, iniciá sesión para realizar esta acción.";
    header("Location: ../index.php?s=login");
    exit;
}

//Obtengo los datos del formulario

$id = $_POST['id'];
$equipo = $_POST['equipo'];
$temporada = $_POST['temporada'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
$descripcion_imagen = $_POST['descripcion_imagen'];
$imagen_actual = $_POST['imagen_actual'];
$imagen = $_FILES['imagen'];


//Valido los datos

$validator = new ValidacionCamiseta($_POST);
$validator->ejecutar();

if($validator->hayErrores() )
{


    $_SESSION['errores'] = $validator->getErrores();
    $_SESSION['old_data'] = $_POST;
    header("Location: ../index.php?seccion=edicion-camiseta");
    exit;
}

$camisetaActual = new Camiseta();
$camisetaActual = $camisetaActual->traerPorId($id);


// Guardo la imagen
if(!empty($imagen['tmp_name']))
{
    $img_nombre = date('YmdHis_') . $imagen['name'];
    move_uploaded_file($imagen['tmp_name'], RUTA_IMGS . DIRECTORY_SEPARATOR . $img_nombre);
}
else
{
    $img_nombre = $camisetaActual->getImagen();
}


try {
    $camiseta = new Camiseta();
    $camiseta->editar($id, [
        'fk_equipos' => $equipo,
        'descripcion' => $descripcion,
        'temporada' => $temporada,
        'precio' => $precio,
        'imagen' => $img_nombre,
        'imagen_descripcion' => $descripcion_imagen,
    ]);

    if (!empty($imagen['tmp_name']))
    {
        unlink(RUTA_IMGS . DIRECTORY_SEPARATOR . $camisetaActual->getImagen());
    }

    $_SESSION['message_success'] = "¡Listo! La camiseta fue editada.";

    header('Location: ../index.php?seccion=home');

} catch(Exception $e )
{
    $_SESSION['message_error'] = "¡Error! La camiseta no pudo ser editada. Por favor, volvé a intentar en unos minutos.";
    header('Location: ../index.php?seccion=alta-camiseta');
}
