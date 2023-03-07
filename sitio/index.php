<?php 
	//Archivo de configuración
use App\Auth\Auth;
use App\Models\Carrito;

require_once __DIR__ . '/setup/setup.php';

	//Rutas
	require_once __DIR__ . '/setup/rutas.php';

	$rutas = getRoutes();

	$seccion = $_GET['seccion'] ?? 'home';


    if(!isset($rutas[$seccion]))
    {
        $seccion = '404';
    }

    $auth = new Auth();

    $carrito = new Carrito();

?>

<!DOCTYPE html>
<html lang="es-AR">
<head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $rutas[$seccion]['title']; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Passion+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-reboot.css" />
		<link rel="stylesheet" href="css/bootstrap-grid.css" />
		<link rel="stylesheet" href="css/bootstrap.css" />
		<link rel="stylesheet" href="css/estilo.css" />
    <link rel="shortcut icon" href="favicon.ico" />
    <script src="https://kit.fontawesome.com/5ecde81f2c.js" crossorigin="anonymous"></script>
</head>
<body>
<header>
			<div class="container">
                <div class="row user-bar">
                    
                    <?php
                            if($auth->estaAutenticado())
                            {
                        ?>
                        <div class="col-lg-6">
                        <p class="user-logged">
                            <a href="index.php?seccion=perfil"><i class="fas fa-user"></i> <?php echo $_SESSION['email']; ?></a>
                        </p>

                        <p class="user-cart">
                            <a href="index.php?seccion=carrito"><i class="fa-solid fa-cart-shopping"></i> <span class="cart-number"><?php echo $carrito->mostrarCantidad(); ?></span> </a>
                        </p>

                        
                        
        
                                
                        
                    </div>
                    <div class="col-lg-6">
                    <form action="acciones/auth-cerrar-sesion.php" method="post" class="logout">
                            <button type="submit" class="btn-cerrar"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</button>
                        </form>
                        
						
                        
                    </div>   

                    <?php
                            }
                            else
                            {
                        ?>
                            
                    
                    <div class="col-lg-12">
                        <div class="btn-login">
                            <a href="index.php?seccion=login"> <p>Login</p></a>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    
                
                </div>
				<div class="row">
					<div class="col-lg-3 logo">
						<img src="img/logo.png" alt="Logo de FootRetro">
					</div>
					<div class="col-lg-9">
                        <div>
                        <p class="marca">FootRetro - Camisetas históricas</p>

                        
                        </div>

<p class="descripcion">Para los más nostalgicos del fútbol, ofrecemos 
nuestro amplio catálogo de camisetas antiguas.
Todas respetan el diseño original, combinandolo con la tecnología utilizada actualmente en la ropa 
deportiva.</p>
                    </div>
					
					
					</div>
				</div>
			</div>
            <nav class="navbar navbar-expand-lg">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                        aria-controls="navbarContent" aria-expanded="false" aria-label="toggle-navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav">
                        <li class='nav-item'>
                            <a class='nav-link' href='index.php?seccion=home'>Home</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='index.php?seccion=camisetas'>Camisetas</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='index.php?seccion=contacto'>Contacto</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container">
                <div class="row">
                <p class="titulo">¡Encontrá la camiseta retro que tanto buscabas! </p>
                </div>
            </div>
            
		</header>
        <main>
<?php 

require 'vistas/' . $seccion . ( '.php' );
    
?>

        </main>
<footer>
			<div class="container">
				<div class="row">
					
					<div class="col-lg-4">
						<p>CAMISETAS DE TODO EL MUNDO.</p>
						<p>ENTREGAS A TODO EL PAÍS.</p>
						<p>TODOS LOS TALLES.</p>
					</div>
					<div class="col-lg-4">
						<p class="logo-footer">FootRetro&reg;</p>
					</div>
					<div class="col-lg-4" >
						<p class="autor"><small>Desarrollado por Alejandro Di Donato</small></p>
					</div>
				</div>
			</div>
		</footer>

            <script src="https://kit.fontawesome.com/cf0fd18c5a.js" crossorigin="anonymous"></script>
            <script src="js/prefixfree.min.js"></script>
            <script src="js/bootstrap.js"></script>
		</body>
</html>
