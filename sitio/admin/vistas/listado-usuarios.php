<?php

use App\Models\Usuario;

$usuario = new Usuario();
$usuarios = $usuario->listarTodo();

?>


<section class="container-fluid">

  <div class="col-lg-12">
        <div class="panel">
      <div>
        <div class="add-row">

                <a href="index.php?seccion=home" class="btn btn-listado">
                    LISTADO DE CAMISETAS
                </a>

        

        </div>
      </div>
      <div class="table-responsive">
        <table class="table">
      		<thead>
      			<tr>
      			  <th>ID</th>
      				<th>USUARIO</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>DOMICILIO</th>
                    <th>CIUDAD</th>
      				<th class="text-center">COMPRAS</th>
      			</tr>
      		</thead>
      		<tbody>
                  
                  <?php
                        foreach($usuarios as $usuario):
                    ?>
                <tr>
                    <td><?= $usuario->getId(); ?></td>
                    <td><?= $usuario->getEmail(); ?></td>
                    <td><?= $usuario->getNombre(); ?></td>
                    <td><?= $usuario->getApellido(); ?></td>
                    <td><?= $usuario->getDomicilio(); ?></td>
                    <td><?= $usuario->getCiudad(); ?></td>
                    <td>

                                    <a href="index.php?seccion=listado-compras&id=<?= $usuario->getId(); ?>"
                                       class="btn ver-compras">
                                         Ver
                                    </a>

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
