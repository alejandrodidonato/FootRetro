<?php

use App\Models\Camiseta;
use App\Models\Equipo;

$camiseta = new Camiseta();
$productos = $camiseta->listarTodo();

$equipo = new Equipo();
$equipos = $equipo->listarTodo();

if ( isset($_SESSION['errores']) )
{
    $errores = $_SESSION['errores'];
    unset($_SESSION['errores']);
}
else{
    $errores = [];
}

if ( isset($_SESSION['old_data']) )
{
    $old_data = $_SESSION['old_data'];
    unset($_SESSION['old_data']);
}
else{

    $camiseta = $camiseta->traerPorId($_GET['id']);
    $equipo = $equipo->traerPorId($camiseta->getIdEquipo());

    $old_data = [
            'id' => $camiseta->getId(),
            'equipo' => $equipo->getId(),
            'temporada' => $camiseta->getTemporada(),
            'descripcion' => $camiseta->getDescripcion(),
            'precio' => $camiseta->getPrecio(),
            'imagen' => $camiseta->getImagen(),
            'descripcion_imagen' => $camiseta->getAltImagen(),
            'imagen_actual' => $camiseta->getImagen(),

    ];
}






?>

<section class="container">
  

    <form action="acciones/editar-camiseta.php" method="POST" enctype="multipart/form-data" >
        <input type="hidden" name="id" value="<?= $old_data['id']; ?>">
        <input type="hidden" name="imagen_actual" value="<?= $old_data['imagen_actual']; ?>">
    <h2 class="titulo-form">Editar camiseta</h2>
       <label for="equipo">Equipo* </label>
       <select class="form-control selector" name="equipo" id="equipo">
            <option value="">Equipo*</option>
           <?php
           foreach($equipos as $equipo)
           {
               ?>
               <option value="<?= $equipo->getId();?>" <?= $old_data['equipo'] == $equipo->getId() ? 'selected' : '' ?> >
                   <?=
                   $equipo->getNombre(); ?></option>
               <?php
           }
           ?>

        </select>
        <?php
        if(isset($errores['equipo'])):
            ?>
            <div class="alert alert-danger validation text-left p-3" role="alert" id="error-equipo"><?= $errores['equipo'] ?></div>
        <?php
        endif;
        ?>

       <label for="temporada">Temporada* </label>
        <select class="form-control selector" name="temporada" id="temporada" >
            <option value="">Temporada*</option>
            <?php
            for($i = date("Y"); $i >= 1930; $i-- ):
            ?>
            <option value="<?= $i ?>" <?=  $i == $old_data['temporada'] ? 'selected' : '' ?> > <?= $i ?></option>
            <?php
            endfor;
            ?>
        </select>
        <?php
        if(isset($errores['temporada'])):
            ?>
            <div class="alert alert-danger validation text-left p-3" role="alert" id="error-temporada"><?= $errores['temporada']
                ?></div>
        <?php
        endif;
        ?>
        <label for="descripcion">Descripción*</label>
        <textarea id="descripcion" name="descripcion" placeholder="Descripción de la camiseta*"  ><?= $old_data['descripcion'] ?? ''; ?></textarea>
        <?php
        if(isset($errores['descripcion'])):
            ?>
            <div class="alert alert-danger validation text-left p-3" role="alert" id="error-descripcion"><?= $errores['descripcion']
                ?></div>
        <?php
        endif;
        ?>
       
       <label for="precio">Precio*</label><input id="precio" type="number" name="precio" placeholder="Precio*"
                                           class="form-control" value="<?= $old_data['precio'] ?? ''; ?>">
        <?php
        if(isset($errores['precio'])):
            ?>
            <div class="alert alert-danger validation text-left p-3" role="alert" id="error-precio"><?=
                $errores['precio']
                ?></div>
        <?php
        endif;
        ?>
        <div class="row">
            <div class="col-8">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control">
                <label for="descripcion_imagen">Descripción de la imagen</label><input id="descripcion_imagen" type="text" name="descripcion_imagen" placeholder="Descripción de la imagen" class="form-control"  value="<?= $old_data['descripcion_imagen'] ?? ''; ?>">
            </div>
            <div class="col-4">
                <?php if($old_data['imagen_actual']): ?>
                    <img class="img-fluid" src="<?= '../img/' . $old_data['imagen_actual']; ?>" alt="<?=
                    $old_data['descripcion_imagen']; ?>">
                <?php else: ?>
                    <img class="img-fluid" src="<?= '../img/sin_imagen.jpg' ?>" alt="Sin imagen disponible">
                <?php endif; ?>
            </div>
        </div>



        <p ><small>*Campos obligatorios</small></p>
        <input type="submit" name="submit" value="Actualizar">
        
        </form>
  
        </section>