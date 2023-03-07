<?php

namespace App\Auth;

use App\Models\Usuario;

class Auth
{
    /**
     * @var Usuario
     */
    protected $usuario;



    /**
     * Autenticación del usuario mediante el mail y password.
     *
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function iniciarSesion(string $email, string $password): bool
    {
        $usuario = new Usuario();
        $usuario = $usuario->traerPorEmail($email);

        if($usuario === null )
        {
            return false;
        }

        if(!password_verify($password, $usuario->getPassword()) )
        {
            return false;
        }

        $_SESSION['id'] = $usuario->getId();
        return true;
    }

    /**
     * Cerrar sesión del usuario logueado.
     *
     */
    public function cerrarSesion()
    {
        session_destroy();
    }

    /**
     * Verificar si el usuario está logueado.
     *
     * @return bool
     */
    public function estaAutenticado() : bool
    {
        return isset($_SESSION['id']);
    }


    /**
     * Verificar si el usuario es Admin.
     *
     * @param string $email
     * @return bool
     */
    public function esAdmin(string $email) : bool
    {
        $usuario = new Usuario();
        $usuario = $usuario->traerPorEmail($email);

        if ($usuario->getRol() !== 1 )
        {
            return false;
        }

        return true;
    }

}