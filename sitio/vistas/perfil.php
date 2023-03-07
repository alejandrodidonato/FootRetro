<?php

use App\Models\Usuario;

if ( !$auth->estaAutenticado() )
{
    header("Location: index.php?seccion=login");
    exit;
}

$usuario = new Usuario();

$perfil = $usuario->traerPorEmail($_SESSION['email']);

?>

  <section class="container" id="perfil">
    <h1>Mi Perfil</h1>

    

    <div class="row">
    <div class="col-xxl-8 mb-5 mb-xxl-0 ml-auto mr-auto mt-5">
						<div class="bg-grey px-4 py-5 rounded text-center cont-profile">
							<div class="row g-3">
								<div class="col-md-6 p-4">
                                    <p class="label">Nombre</p>
									<p class="label-dato"><?php echo $perfil->getNombre(); ?></p>
								</div>
								<div class="col-md-6 p-4">
                                    <p class="label">Apellido</p>
                                    <p class="label-dato"><?php echo $perfil->getApellido(); ?></p>
								</div>
								<div class="col-md-6 p-4">
                                    <p class="label">Domicilio</p>
                                    <p class="label-dato"><?php echo $perfil->getDomicilio(); ?></p>
                                </div>
								<div class="col-md-6 p-4">
                                    <p class="label">Ciudad</p>
                                    <p class="label-dato"><?php echo $perfil->getCiudad(); ?></p>
								</div>
								
							</div>
						</div>
					</div>
    
    </div>

  </section>