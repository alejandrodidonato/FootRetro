<?php

use App\Models\Usuario;

$id = (int) $_GET['id'];
$usuario = new Usuario();
$compras = $usuario->listarCompras($id);

?>


<section class="container-fluid">

  <div class="col-lg-12">
        <div class="panel">
      <div>
        <div class="add-row">

        <a href="index.php?seccion=listado-usuarios" class="btn btn-listado">
                    LISTADO DE USUARIOS
                </a>

               

        

        </div>
      </div>
      <div class="table-responsive">
        <table class="table">
      		<thead>
      			<tr>
      				<th>USUARIO</th>
                    <th>CAMISETA</th>
                    <th>PRECIO</th>
                    <th>CANTIDAD</th>
                    <th>FECHA</th>
      			</tr>
      		</thead>
      		<tbody>
                  
                  <?php
                        foreach($compras as $compra):
                    ?>
                <tr>
                    <td><?= $compra->usuario; ?></td>
                    <td><?= $compra->equipo; ?></td>
                    <td><?= $compra->precio; ?></td>
                    <td><?= $compra->cantidad; ?></td>
                    <td><?= $compra->fecha; ?></td>

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
