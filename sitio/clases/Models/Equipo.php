<?php

namespace App\Models;

    use App\DB\Connection;
    use PDO;

    class Equipo
    {
        /**
         * @var int
         */
        protected $id;

        /**
         * @var string
         */
        protected $nombre;

    
        /**
         * Lista todos los equipos.
         *
         * 
         * @return Equipo[]
         */
        public function listarTodo(): array
        {
            $db = new Connection();
            $db = $db->getConnection();

            $query = "SELECT * FROM equipos";
            $stmt = $db->prepare($query);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

            return $stmt->fetchAll();
        }

        /**
         *
         * Retorna el equipo asociado al id.
         * Si no existe, retorna null.
         *
         * @param int $id
         * @return Equipo | null
         */
        public function traerPorId(int $id): ?Equipo
        {
            $db = new Connection();
            $db = $db->getConnection();

            $query = "SELECT *
                      FROM equipos
                      where id = ?";

            $stmt = $db->prepare($query);
            $stmt->execute([$id]);

            $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

            $equipo = $stmt->fetch();

            if( !$equipo )
            {
                return null;
            }
            else
            {
                return $equipo;
            }
        }




        /** SETTERS Y GETTERS */

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
        public function setId(int $id)
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
        public function setNombre(string $nombre)
        {
            $this->nombre = $nombre;
        }

        
    }


