<?php

namespace App\Validators;


class ValidacionCamiseta
{
    /**
     * @var array
     */
    protected $data = [];

     /**
     * @var array
     */
    protected $errores = [];

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }


    /**
     * Ejecuta las validaciones.
     */
     public function ejecutar()
     {
        if(empty($this->data['descripcion']))
        {
            $this->errores['descripcion'] = "Por favor, escribí la descripción de la camiseta.";
        } else if( strlen($this->data['descripcion']) < 10 )
        {
            $this->errores['descripcion'] = "La descripción tiene que tener mínimo 10 caracteres.";
        }

        if(empty($this->data['precio']))
        {
            $this->errores['precio'] = "Por favor, ingresá el precio de la camiseta.";
        } else if( (strlen($this->data['precio']) < 0) || (strlen($this->data['precio']) > 999999) )
        {
            $this->errores['precio'] = "El precio debe ser un valor entre 0 y 999.999";
        }

        if(empty($this->data['equipo']))
        {
            $this->errores['equipo'] = "Por favor, elegí el equipo al cual pertenece la camiseta.";
        }

        if(empty($this->data['temporada']))
        {
            $this->errores['temporada'] = "Por favor, elegí la temporada correspondiente a la camiseta.";
        }
        
     }

     

     /**
     * Verifica si hubo errores.
     */
     public function hayErrores() : bool
     {
         return count($this->errores) > 0;
     }

     /**
      * @return array
      */
      public function getErrores() : array
      {
          return $this->errores;
      }


}