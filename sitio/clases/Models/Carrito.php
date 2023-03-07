<?php

namespace App\Models;

use App\DB\Connection;
use PDO;

class Carrito
{
    /**
    * Agrega una camiseta al carrito.
    *
    * @param int $producto_id
    */
    public function agregarItem($producto_id, $precio) {
        if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
        }

        // Verifica si el item ya está en el carrito
        foreach($_SESSION['carrito'] as &$item_cargado) {
            if($item_cargado["producto_id"] === $producto_id) {
                $item_cargado["cantidad"]++;
                return;
            }
        }

        // Si el item no está en el carrito, lo agrega
        $item = array(
        "producto_id" => $producto_id,
        "cantidad" => 1,
        "precio" => $precio
        );

        array_push($_SESSION['carrito'], $item);

    }

    /**
    * Elimina una camiseta al carrito.
    *
    * @param int $producto_id
    */
    public function eliminarItem($producto_id) {
        if (!isset($_SESSION['carrito'])) {
        return;
        }

        foreach($_SESSION['carrito'] as $key => &$item) {
        if($item["producto_id"] == $producto_id) {
            if($item["cantidad"] == 1)
            {
                unset($_SESSION['carrito'][$key]);
                return;
            }
            $item["cantidad"]--;
            return;
            
        }
        }
    }

    /**
    * Retorna la cantidad de camisetas que hay en el carrito.
    *
    * @return int
    */
    public function mostrarCantidad() {

        $cantidad_total = 0;

        if(isset($_SESSION['carrito']))
        {
            foreach($_SESSION['carrito'] as &$item) {
                $cantidad_total += $item['cantidad'];
            }
        }
        
        return $cantidad_total;
    }

    /**
    * Obtener el precio total de las camisetas que hay en el carrito.
    *
    * @return int
    */
    public function obtenerPrecioTotal() {

        $precio_total = 0;

        if(isset($_SESSION['carrito']))
        {
            foreach($_SESSION['carrito'] as &$item) {
                $precio_total += ($item['precio'] * $item['cantidad']);
            }
        }
        
        return $precio_total;
    }

    /**
    * Devuelve el contenido del carrito.
    *
    * @return Carrito
    */
    public function obtenerContenido() {
            
        if (!isset($_SESSION['carrito'])) {
            return array();
        }
            return $_SESSION['carrito'];
        }

    /**
    * Guarda un registro de la compra del carrito en la base de datos.
    *
    * 
    * @param int $id
    */
    public function finalizar() {
        
            $db = new Connection();
            $db = $db->getConnection();
            $datetime = date_create()->format('Y-m-d H:i:s');

            

            foreach($_SESSION['carrito'] as &$item) {
                
                $query = "INSERT INTO compras (camisetas_id, usuarios_id, cantidad, fecha)
                    VALUES (:camisetas_id, :usuarios_id, :cantidad, :fecha )";

                $stmt = $db->prepare($query);

                $stmt->execute([
                    'camisetas_id' => $item['producto_id'],
                    'usuarios_id' => $_SESSION['id'],
                    'cantidad' => $item['cantidad'],
                    'fecha' => $datetime
                ]);
            }

            
      }

    /**
    * Vacía el contenido del carrito.
    *
    * 
    */
        public function vaciarCarrito() {
            unset($_SESSION['carrito']);
          }


}