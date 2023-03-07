<?php

namespace App\Models;

use App\DB\Connection;
use PDO;

class Usuario
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $nombre;

    /**
     * @var string
     */
    protected $apellido;

    /**
     * @var string
     */
    protected $domicilio;

    /**
     * @var string
     */
    protected $ciudad;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var int
     */
    protected $rol;


    /**
     * Obtener el usuario mediante el mail.
     *
     * @param string $email
     * @return Usuario|null
     */
    public function traerPorEmail(string $email): ?Usuario
    {
        $db = new Connection();
        $db = $db->getConnection();

        $query = "SELECT *
                      FROM usuarios
                      where email = ?";

        $stmt = $db->prepare($query);
        $stmt->execute([$email]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

        $usuario = $stmt->fetch();

        if( !$usuario )
        {
            return null;
        }

        return $usuario;
    }


    /**
         * Lista todos los usuarios de la base de datos.
         *
         * 
         * @return Usuario[]
         */
        public function listarTodo(): array
        {
            $db = new Connection();
            $db = $db->getConnection();

            $query = "SELECT id, email, nombre, apellido, domicilio, ciudad, fk_roles as rol FROM usuarios 
            ORDER BY id";
            $stmt = $db->prepare($query);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

            return $stmt->fetchAll();
        }

        /**
         * Lista todas las compras realizadas por un usuario.
         *
         * @param int $id
         * @return array
         */
        public function listarCompras($id): array
        {
            $db = new Connection();
            $db = $db->getConnection();

            $query = "SELECT usuarios.email as usuario, equipos.nombre as equipo, camisetas.precio as precio, compras.cantidad as cantidad, compras.fecha as fecha  FROM compras 
            INNER JOIN camisetas ON compras.camisetas_id = camisetas.id
            INNER JOIN equipos ON camisetas.fk_equipos = equipos.id
            INNER JOIN usuarios ON usuarios.id = compras.usuarios_id
            where compras.usuarios_id = ?
            ORDER BY compras.fecha DESC";
            $stmt = $db->prepare($query);
            $stmt->execute([$id]);

            $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

            return $stmt->fetchAll();
        }


    /**SETTERS Y GETTERS**/

    /**
     * @return int
     */
    public function getRol(): int
    {
        return $this->fk_roles;
    }

    /**
     * @param int $rol
     */
    public function setRol(int $rol): void
    {
        $this->fk_roles = $rol;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getApellido(): string
    {
        return $this->apellido;
    }

    /**
     * @param string $apellido
     */
    public function setApellido(string $apellido): void
    {
        $this->apellido = $apellido;
    }

    /**
     * @return string
     */
    public function getDomicilio(): string
    {
        return $this->domicilio;
    }

    /**
     * @param string $domicilio
     */
    public function setDomicilio(string $domicilio): void
    {
        $this->domicilio = $domicilio;
    }

    /**
     * @return string
     */
    public function getCiudad(): string
    {
        return $this->ciudad;
    }

    /**
     * @param string $ciudad
     */
    public function setCiudad(string $ciudad): void
    {
        $this->ciudad = $ciudad;
    }
}