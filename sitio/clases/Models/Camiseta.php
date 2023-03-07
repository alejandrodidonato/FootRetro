<?php

namespace App\Models;

    use App\DB\Connection;
    use PDO;
    use PDOException;

    class Camiseta
    {
        /**
         * @var int
         */
        protected $id;

        /**
         * @var int
         */
        protected $id_equipo;

        /**
         * @var string
         */
        protected $equipo;

        /**
         * @var int
         */
        protected $temporada;

        /**
         * @var string
         */
        protected $descripcion;

        /**
         * @var double
         */
        protected $precio;

        /**
         * @var string
         */
        protected $imagen;

        /**
         * @var string
         */
        protected $alt_imagen;

        /**
         * Lista todas las camisetas de la base de datos.
         *
         * 
         * @return Camiseta[]
         */
        public function listarTodo(): array
        {
            $db = new Connection();
            $db = $db->getConnection();

            $query = "SELECT camisetas.id, equipos.nombre AS equipo, temporada, descripcion, precio, imagen, alt_imagen FROM camisetas 
            INNER JOIN equipos ON camisetas.fk_equipos = equipos.id
            ORDER BY camisetas.id";
            $stmt = $db->prepare($query);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

            return $stmt->fetchAll();
        }

        /**
         * 
         * Retorna el producto asociado al id.
         * Si no existe, retorna null.
         * 
         * @param int $id
         * @return Camiseta|null
         */
        public function traerPorId(int $id): ?Camiseta
        {
            $db = new Connection();
            $db = $db->getConnection();

            $query = "SELECT camisetas.id, equipos.nombre AS equipo, equipos.id AS id_equipo, temporada, descripcion,precio, imagen, alt_imagen 
                      FROM camisetas
                      INNER JOIN equipos ON camisetas.fk_equipos = equipos.id where camisetas.id = ?";

            $stmt = $db->prepare($query);
            $stmt->execute([$id]);

            $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

            $producto = $stmt->fetch();

            if( !$producto )
            {
                return null;
            }
            else
            {
                return $producto;
            }
        }



        /**
         * 
         * Crea una camiseta nueva.
         * 
         * @param array $data
         * @throws PDOException
         */
        public function crear(array $data)
        {
            $db = new Connection();
            $db = $db->getConnection();

            $query = "INSERT INTO camisetas (fk_equipos, descripcion, temporada, precio, imagen, alt_imagen)
                    VALUES (:fk_equipos, :descripcion, :temporada, :precio, :imagen, :alt_imagen )";

            $stmt = $db->prepare($query);
            $stmt->execute([
                'fk_equipos' => $data['fk_equipos'],
                'descripcion' => $data['descripcion'],
                'temporada' => $data['temporada'],
                'precio' => $data['precio'],
                'imagen' => $data['imagen'],
                'alt_imagen' => $data['imagen_descripcion'],
            ]);

        
        }


        /**
         *
         * Elimina una camiseta.
         *
         * @param int $id
         */
        public function eliminar(int $id)
        {
            $db = new Connection();
            $db = $db->getConnection();

            $query = "DELETE FROM camisetas WHERE id = ?";

            $stmt = $db->prepare($query);
            $stmt->execute([$id]);

        }


        /**
         *
         * Edita una camiseta.
         *
         * @param int $id
         * @param array $data
         */
        public function editar(int $id, array  $data)
        {
            $db = new Connection();
            $db = $db->getConnection();

            $query = "UPDATE camisetas 
                      SET fk_equipos = :fk_equipos,
                          descripcion = :descripcion, 
                          temporada = :temporada, 
                          precio = :precio,
                          imagen = :imagen,
                          alt_imagen = :alt_imagen
                          WHERE id = :id";

            $stmt = $db->prepare($query);
            $stmt->execute([
                'fk_equipos' => $data['fk_equipos'],
                'descripcion' => $data['descripcion'],
                'temporada' => $data['temporada'],
                'precio' => $data['precio'],
                'imagen' => $data['imagen'],
                'alt_imagen' => $data['imagen_descripcion'],
                'id' => $id,
            ]);

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
         * @return int
         */
        public function getIdEquipo(): int
        {
            return $this->id_equipo;
        }

        /**
         * @param int $id_equipo
         */
        public function setIdEquipo(int $id_equipo)
        {
            $this->id_equipo = $id_equipo;
        }

         /**
         * @return string
         */
        public function getEquipo(): string
        {
            return $this->equipo;
        }

        /**
         * @param string $equipo
         */
        public function setEquipo(string $equipo)
        {
            $this->equipo = $equipo;
        }

         /**
         * @return int
         */
        public function getTemporada(): int
        {
            return $this->temporada;
        }

        /**
         * @param string $temporada
         */
        public function setTemporada(string $temporada)
        {
            $this->temporada = $temporada;
        }

         /**
         * @return string
         */
        public function getDescripcion(): string
        {
            return $this->descripcion;
        }

        /**
         * @param string $descripcion
         */
        public function setDescripcion(string $descripcion)
        {
            $this->descripcion = $descripcion;
        }

        /**
         * @return double
         */
        public function getPrecio(): float
        {
            return $this->precio;
        }

        /**
         * @param double $precio
         */
        public function setPrecio(float $precio)
        {
            $this->precio = $precio;
        }

        /**
         * @return string
         */
        public function getImagen(): string
        {
            return $this->imagen;
        }

        /**
         * @param string $imagen
         */
        public function setImagen(string $imagen)
        {
            $this->imagen = $imagen;
        }

        /**
         * @return string
         */
        public function getAltImagen(): string
        {
            return $this->alt_imagen;
        }

        /**
         * @param string $alt_imagen
         */
        public function setAltImagen(string $alt_imagen)
        {
            $this->alt_imagen = $alt_imagen;
        }


    }

