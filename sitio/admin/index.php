<?php 
	//ADMIN
use App\Auth\Auth;

require_once __DIR__ . '/../setup/setup.php';
	
	//Clases
	require_once RUTA_RAIZ . '/clases/Models/Camiseta.php';
	require_once RUTA_RAIZ . '/clases/Models/Equipo.php';
	require_once RUTA_RAIZ . '/clases/DB/Connection.php';
    require_once RUTA_RAIZ . '/clases/Models/Usuario.php';
    require_once RUTA_RAIZ . '/clases/Auth/Auth.php';
	require_once RUTA_RAIZ . '/clases/Validators/ValidacionCamiseta.php';

	//Rutas
	require_once RUTA_RAIZ . '/setup/rutas.php';

	$rutas = getRoutesAdmin();

	$seccion = $_GET['seccion'] ?? 'login';

    if(!isset($rutas[$seccion]))
    {
        $seccion = '404';
    }

    $auth = new Auth();

    $requiereAuth = $rutas[$seccion]['auth'] ?? false;

    if($requiereAuth && !$auth->estaAutenticado())
    {
        $_SESSION['message_error'] = "Por favor, iniciá sesión para acceder a esta sección.";
        header("Location: index.php?s=login");
        exit;
    }

    $messageSuccess = $_SESSION['message_success'] ?? null;
    $messageError = $_SESSION['message_error'] ?? null;

    unset($_SESSION['message_success'], $_SESSION['message_error']);


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
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap-reboot.css" />
		<link rel="stylesheet" href="../css/bootstrap-grid.css" />
		<link rel="stylesheet" href="../css/bootstrap.css" />
		<link rel="stylesheet" href="../css/estilo.css" />
    <link rel="shortcut icon" href="../favicon.ico" />
	<script src="https://kit.fontawesome.com/cf0fd18c5a.js" crossorigin="anonymous"></script>
    <script src="../js/prefixfree.min.js"></script>
	<script src="../js/bootstrap.js"></script>
</head>
<body>
<header>
			<div class="container">
				<div class="row">
					<div class="col-lg-3 logo text-center">
                        <a href="index.php?seccion=home">
						<img src="../img/logo-min.png" alt="Logo de FootRetro">
                        </a>
					</div>
					<div class="col-lg-6 panel-heading">
						<h1>PANEL DE ADMINISTRACIÓN</h1>
					</div>
                    <?php
                    if($auth->estaAutenticado()): ?>
                    <div class="col-lg-3">
                        <form action="acciones/auth-cerrar-sesion.php" method="post" class="logout">
                            <button type="submit" class="btn-cerrar"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</button>
                        </form>
                    </div>
                    <?php endif; ?>
                </div>



            </div>
		</header>
        <main class="admin-main">
            <?php
                if ($messageSuccess !== null): ?>
                    <div class="alert alert-success" role="alert">
                        <?= $messageSuccess; ?>
                    </div>
            <?php
                endif;
            if ($messageError !== null): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $messageError; ?>
                </div>
            <?php
            endif;
            ?>
		<?php 
   			 require 'vistas/' . $seccion . ( '.php' );
    
?>

        </main>
<footer>
			<div class="container">
				<div class="row">

					<div class="col-lg-12">
						<p class="logo-footer">FootRetro&reg;</p>
					</div>
				</div>
			</div>
		</footer>

		</body>
</html>
