<?php

use App\Models\Camiseta;

$id = (int) $_GET['id'];
    $camiseta = new Camiseta();
    $camiseta = $camiseta->traerPorId($id);


?>

<section class="container" id="detalle">
    <div class="row">
        <div class="col-lg-6">
            <div class="thumbnail-container">
                <?php if($camiseta->getImagen()): ?>
                    <img class="img-fluid borde" src="<?= 'img/' . $camiseta->getImagen(); ?>" alt="<?=
                    $camiseta->getAltImagen(); ?>">
                <?php else: ?>
                    <img class="img-fluid borde" src="<?= 'img/sin_imagen.jpg' ?>" alt="Sin imagen disponible">
                <?php endif; ?>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="details">
            <h1><?php echo $camiseta->getEquipo() . ' ' . $camiseta->getTemporada(); ?></h1>
            <p class="price">$<?php echo number_format($camiseta->getPrecio(), 0, ',', '.'); ?></p>
            <p class="info"><span>Envío a todo el país</span></p>
            <p class="info"><span>Llega en 24hs</span></p>
            <p class="description"><?php echo $camiseta->getDescripcion(); ?></p>



            <div class="columns">
                
                <div class="column" id="buy-container">

                <a href="acciones/agregar-camiseta-carrito.php?id=<?php echo $id ?>&precio=<?php echo$camiseta->getPrecio();?>" class="carrito-btn">
                            <button type="submit" class="button buy-button ml-0"><i class="fas fa-shopping-cart"></i> AGREGAR AL CARRITO</button>
                        </a>

                </div>

            </div>


            </div>
        </div>
    </div>

  

</section>