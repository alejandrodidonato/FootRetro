<?php

use App\Models\Camiseta;

$camiseta = new Camiseta();
    $productos = $camiseta->listarTodo();

?>


<section class="container-fluid">

  <div class="col-lg-12">
        <div class="panel">
      <div>
        <div class="add-row">

                <a href="index.php?seccion=listado-usuarios" class="btn btn-listado">
                    LISTADO DE USUARIOS
                </a>

                <a href="index.php?seccion=alta-camiseta" class="btn btn-agregar">
                    <i class="fa fa-plus" aria-hidden="true"></i>AGREGAR CAMISETA
                </a>

        </div>
      </div>
      <div class="table-responsive">
        <table class="table">
      		<thead>
      			<tr>
      			  <th>ID</th>
      				<th>EQUIPO</th>
                    <th>TEMPORADA</th>
                    <th>DESCRIPCIÓN</th>
                    <th>PRECIO</th>
                    <th>IMAGEN</th>
      				<th class="text-center">EDITAR</th>
      				<th class="text-center">ELIMINAR</th>
      			</tr>
      		</thead>
      		<tbody>
                  
                  <?php
                        foreach($productos as $producto):
                    ?>
                <tr>
                    <td><?= $producto->getId(); ?></td>
                    <td><?= $producto->getEquipo(); ?></td>
                    <td><?= $producto->getTemporada(); ?></td>
                    <td class="col-descripcion"><?= $producto->getDescripcion(); ?></td>
                    <td>$<?= number_format($producto->getPrecio(), '0', ',', '.'); ?></td>
                    <td><?php if($producto->getImagen()): ?>
                            <img class="img-fluid" src="<?= '../img/' . $producto->getImagen(); ?>" alt="<?=
                            $producto->getAltImagen(); ?>">
                        <?php else: ?>
                            <img class="img-fluid" src="<?= '../img/sin_imagen.jpg' ?>" alt="Sin imagen disponible">
                        <?php endif; ?></td>
                    <td class="edit text-center">

                                    <a href="index.php?seccion=edicion-camiseta&id=<?= $producto->getId(); ?>"
                                       class="btn editar">
                                        <i class="fas fa-pen-square"
                                           aria-hidden="true"></i> Editar
                                    </a>

                    </td>
      				<td class="trash text-center">
                        <form action="acciones/eliminar-camiseta.php" method="post" class="form-eliminar">
                            <button class="btn eliminar" type="submit"> <i class="fas fa-trash-alt"
                                                                            aria-hidden="true"></i> Eliminar</button>
                            <input type="hidden" name="id" value="<?= $producto->getId(); ?>">
                        </form>
                       </td>
                </tr>
                    <?php
                    endforeach;
                    ?>
              
      			
      			
      		</tbody>
      	</table>
      </div>
    </div>
  </div>
  
</section>

<script>
    const formsAction = document.querySelectorAll('.form-eliminar');

    for (let i = 0; i < formsAction.length; i++)
    {
        formsAction[i].addEventListener('submit', function(ev){
            const confirmar = confirm("¿Querés eliminar esta camiseta?");
            if(!confirmar)
            {
                ev.preventDefault();
            }
        })
    }
</script>