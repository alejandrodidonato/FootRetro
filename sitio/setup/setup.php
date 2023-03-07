<?php 
    
    date_default_timezone_set( 'America/Argentina/Buenos_aires' );
    ini_set( 'display_errors' , 1 );
    error_reporting( E_ALL ^ E_NOTICE);


    //INICIALIZO LA SESIÓN
    session_start();

    //ARMO LAS RUTAS CONSTANTES 
    const RUTA_RAIZ = __DIR__ . DIRECTORY_SEPARATOR . "..";
    const RUTA_IMGS = RUTA_RAIZ . DIRECTORY_SEPARATOR . 'img';


    //AUTOLOAD

    spl_autoload_register(function ($className)
    {
        $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);

        $className = substr($className, 3);

        $className = "clases" . $className . ".php";

        if (file_exists(RUTA_RAIZ . DIRECTORY_SEPARATOR . $className))
        {
            require_once RUTA_RAIZ . DIRECTORY_SEPARATOR . $className;
        }
    }
    );
    
