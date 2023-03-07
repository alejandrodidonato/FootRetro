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

    $old_data = [];
}


?>

<section class="container">
  

    <form action="acciones/crear-camiseta.php" method="POST" enctype="multipart/form-data" >
    <h2 class="titulo-form">Nueva camiseta</h2>



       <label for="equipo"> </label>
       <select class="form-control selector" name="equipo" id="equipo" >
            <option value="">Equipo*</option>
            <?php
            foreach($equipos as $equipo)
            {
                ?>
                <option value="<?= $equipo->getId();?>"
                        <?php
                        if( $old_data )
                        {
                        ?>
                             <?= $old_data['equipo'] == $equipo->getId() ? 'selected' : '';
                        }
                ?> >
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

       <label for="temporada"></label>
        <select class="form-control selector" name="temporada" id="temporada" >
            <option value="">Temporada*</option>
        <?php 
            for($i = date("Y"); $i >= 1930; $i-- ):
            ?>
                    <option value="<?= $i ?>"<?php

                    if ($old_data)
                    {
                    ?>
                        <?= $i == $old_data['temporada'] ? 'selected' : '';
                    }
                    ?> >
                        <?= $i ?></option>

            }
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



        <label for="descripcion"></label>
        <textarea id="descripcion" name="descripcion" placeholder="Descripción de la camiseta*" ><?= $old_data['descripcion'] ?? ''; ?></textarea>

        <?php
        if(isset($errores['descripcion'])):
            ?>
            <div class="alert alert-danger validation text-left p-3" role="alert" id="error-descripcion"><?= $errores['descripcion']
                ?></div>
        <?php
        endif;
        ?>

       <label for="precio"></label><input id="precio" type="number" name="precio" placeholder="Precio*" class="form-control"  value="<?= $old_data['precio'] ?? ''; ?>">

        <?php
        if(isset($errores['precio'])):
            ?>
            <div class="alert alert-danger validation text-left p-3" role="alert" id="error-precio"><?= $errores['precio'] ?></div>
        <?php
        endif;
        ?>

       <label for="imagen"></label><input id="imagen" type="file" name="imagen" >


        <label for="descripcion_imagen"></label><input id="descripcion_imagen" type="text" name="descripcion_imagen" placeholder="Descripción de la imagen" class="form-control" value="<?= $old_data['descripcion_imagen'] ?? ''; ?>">


        <p><small>*Campos obligatorios</small></p>
        <input type="submit" name="submit" value="Agregar">
        
        </form>
  
        </section>