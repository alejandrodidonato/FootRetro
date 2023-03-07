<?php

    /**
     * Función para obtener rutas del sitio.
     *
     * @return string[][]
     */
    function getRoutes(): array
    {
        return [
            'home' => [
                'title' => 'Página principal - FootRetro',
            ],
            'login' => [
                'title' => 'Login - FootRetro',
            ],
            'register' => [
                'title' => 'Registro - FootRetro',
            ],
            'perfil' => [
                'title' => 'Perfil - FootRetro',
            ],
            'camisetas' => [
                'title' => 'Listado de camisetas - FootRetro',
            ],
            'carrito' => [
                'title' => 'Carrito - FootRetro',
            ],
            'ver-camiseta' => [
                'title' => ' Camiseta - FootRetro',
            ],
            'contacto' => [
                'title' => 'Contacto - FootRetro',
            ],
            'gracias' => [
                'title' => 'Gracias por tu compra - FootRetro',
            ],
            '404' => [
                'title' => 'Error 404 - Sitio no encontrado',
            ]
        ];
    }

    /**
     * Función para obtener rutas del panel de administración.
     *
     * @return string[][]
     */
    function getRoutesAdmin(): array
    {
        return [
            'home' => [
                'title' => 'Panel de Administración - FootRetro',
                'auth' => true,
            ],
            'login' => [
                'title' => 'Iniciar sesión - FootRetro',
            ],
            'productos' => [
                'title' => 'Administrar productos - FootRetro',
                'auth' => true,
            ],
            'listado-usuarios' => [
                'title' => 'Listado de usuarios - FootRetro',
                'auth' => true,
            ],
            'listado-compras' => [
                'title' => 'Listado de compras - FootRetro',
                'auth' => true,
            ],
            'alta-camiseta' => [
                'title' => 'Alta de camiseta - FootRetro',
                'auth' => true,
            ],
            'edicion-camiseta' => [
                'title' => 'Editar camiseta - FootRetro',
                'auth' => true,
            ],
            '404' => [
                'title' => 'Error 404 - Sitio no encontrado',
            ]
        ];
    }
