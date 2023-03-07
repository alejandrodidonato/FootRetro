<?php

use App\Models\Carrito;
use App\Models\Camiseta;

$camiseta = new Camiseta();

$carrito = new Carrito();

if ( !$auth->estaAutenticado() )
{
    header("Location: index.php?seccion=login");
    exit;
}

$productos_carrito = $carrito->obtenerContenido();

if (empty($_SESSION['carrito'])) {

?>

<section class="h-100 mx-auto" >
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">

        <h1>El carrito está vacío. </h1>
        <p class="sad"><i class="fa-solid fa-face-sad-tear"></i></p>
      </div>
    </div>
  </div>
</section>
  
<?php

}
else
{


?>

  <section class="h-100 mx-auto" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">

      <?php 
        foreach( $productos_carrito as $producto ){

            $camiseta = $camiseta->traerPorId($producto['producto_id']);
    ?>  

        <div class="card rounded-3 mb-4 ">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center carrito">
              <div class="col-md-2 col-lg-2 col-xl-2">
                <img
                  src="<?= 'img/' . $camiseta->getImagen(); ?>"
                  class="img-fluid rounded-3" alt="Camiseta de <?= $camiseta->getEquipo(); ?> <?= $camiseta->getTemporada(); ?>">
              </div>
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2">Temporada <?= $camiseta->getTemporada(); ?></p>
                <p><span class="text-muted"><?= $camiseta->getEquipo(); ?></span></p>
              </div>
              <div class="col-md-3 col-lg-3 col-xl-2 d-flex">


              <p><span class="mb-2 text-muted">Cantidad: <?= $producto['cantidad']; ?> </span> </p>
              

          
              </div>
              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <p><span class="mb-0 ">$ <?= $producto['cantidad'] * $camiseta->getPrecio(); ?></span></p>
              </div>
              <div class="col-md-1 col-lg-1 col-xl-1 text-end">
              <a href="acciones/eliminar-camiseta-carrito.php?id=<?php echo $producto['producto_id'] ?>" class="eliminar-carrito">
                            <button type="submit" class="text-danger"> <i class="fas fa-trash fa-lg"></i></button>
                        </a>
              </div>
            </div>
          </div>
        </div>
        <?php 
        }
    ?>  
        
        <div class="card">
          <div class="card-body text-center">
            <div class="row">
              <div class="col-12">
                <span class="precio-total">Precio total: $ <?= $carrito->obtenerPrecioTotal(); ?> </span>
              </div>
            </div>
            
          </div>
        </div>
      

        <div class="card">
          <div class="card-body text-center">
            <div class="row">
              <div class="col-6">
                <a href="index.php?seccion=camisetas">
                <button type="button" class="button buy-button-2">Seguir comprando</button>
                </a>
              </div>
              <div class="col-6">
              <form action="acciones/finalizar-compra.php?id=<?= $_SESSION['id'] ?>" class="fin-compra">
                <button type="submit" class="button buy-button">Finalizar compra</button>
                </form>
              </div>
            </div>
            
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<?php

}

?>