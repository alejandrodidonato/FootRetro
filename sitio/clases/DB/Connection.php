<?php

namespace App\DB;

use Exception;
use PDO;

class Connection
{
    /**
     * @var PDO
     */
    protected $db;

     /**
      * SERVIDOR
      * @var string
      */ 
    protected const DB_HOST = '127.0.0.1';

    /**
      * USUARIO
      * @var string
      */ 
    protected const DB_USER = 'root';

    /**
      * PASSWORD
      * @var string
      */ 
    protected const DB_PASS = '';

    /**
      * BASE DE DATOS
      * @var string
      */ 
    protected const DB_NAME = 'dw3_di_donato_alejandro';

    /**
     * Se instancia la clase PDO. Si hay un error, se lanza una Exception.
     * @return PDO
     */

    public function getConnection() : PDO
    {

        try
        {
            $dsn = "mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_NAME . ";charset=utf8mb4";

            $this->db = new PDO($dsn, self::DB_USER, self::DB_PASS);

            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->db;
        }
        catch(Exception $e)
        {
            die("Error en la conexión con la base de datos.");
        }


    }

} 

