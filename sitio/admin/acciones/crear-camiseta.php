<?php

use App\Auth\Auth;
use App\Models\Camiseta;
use App\Validators\ValidacionCamiseta;

require_once __DIR__ . '/../../setup/setup.php';

    $auth = new Auth();

    if(!$auth->estaAutenticado() )
    {
        $_SESSION['message_error'] = "Por favor, iniciá sesión para realizar esta acción.";
        header("Location: ../index.php?s=login");
        exit;
    }

    //Obtengo los datos del formulario de alta
    $equipo = $_POST['equipo'];
    $temporada = $_POST['temporada'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $descripcion_imagen = $_POST['descripcion_imagen'];
    $imagen = $_FILES['imagen'];

     //Valido los datos

     $validator = new ValidacionCamiseta($_POST);
     $validator->ejecutar();
 
     if($validator->hayErrores() )
     {
        

         $_SESSION['errores'] = $validator->getErrores();
         $_SESSION['old_data'] = $_POST;
         header("Location: ../index.php?seccion=alta-camiseta");
         exit;
     }

    // Guardo la imagen
     if(!empty($imagen['tmp_name']))
     {
         $img_nombre = date('YmdHis_') . $imagen['name'];
         move_uploaded_file($imagen['tmp_name'], RUTA_IMGS . DIRECTORY_SEPARATOR . $img_nombre);
     }
     else
     {
         $img_nombre = '';
     }





   


    try {
        $camiseta = new Camiseta();
        $camiseta->crear([
            'fk_equipos' => $equipo,
            'descripcion' => $descripcion,
            'temporada' => $temporada,
            'precio' => $precio,
            'imagen' => $img_nombre,
            'imagen_descripcion' => $descripcion_imagen,
        ]);

        $_SESSION['message_success'] = "¡Listo! La camiseta fue creada.";

        header('Location: ../index.php?seccion=home');

    } catch(Exception $e )
    {
        $_SESSION['message_error'] = "¡Error! La camiseta no pudo ser creada. Por favor, volvé a intentar en unos minutos.";
        header('Location: ../index.php?seccion=alta-camiseta');
    }
