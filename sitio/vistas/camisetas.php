<?php

use App\Models\Camiseta;

$camiseta = new Camiseta();
    $productos = $camiseta->listarTodo();

    

?>
  
  <section class="container" id="productos">
    <h1>Camisetas Retro</h1>
    <p>¡Elegí la tuya!</p>

    

    <div class="row">
    <ul class="card-deck">
    <?php 
        foreach( $productos as $producto ):
    ?>  
        
        <li class="card">
            <?php if($producto->getImagen()): ?>
            <img class="img-fluid" src="<?= 'img/' . $producto->getImagen(); ?>" alt="<?= $producto->getAltImagen(); ?>">
            <?php else: ?>
                <img class="img-fluid" src="<?= 'img/sin_imagen.jpg' ?>" alt="Sin imagen disponible">
            <?php endif; ?>

            <section class="card-block">
                <h2 class="card-title"><?php echo $producto->getEquipo() . ' ' . $producto->getTemporada(); ?></h2>
                <p class="card-text">$<?php echo number_format($producto->getPrecio(), 0, ',', '.'); ?> </p>
                <a href="index.php?seccion=ver-camiseta&id=<?php echo $producto->getId(); ?>" class="btn btn-primary btn-block card-btn">
                    Ver más
                </a>
            </section>
        </li>
        
    <?php
        endforeach;
    ?> 
    </ul>
    
    </div>

  </section>

 