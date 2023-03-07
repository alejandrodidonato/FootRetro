<?php

if ( isset($_SESSION['old_data']) )
{
    $old_data = $_SESSION['old_data'];
    unset($_SESSION['old_data']);
}
else{
    $old_data = [];
}

if ( $auth->estaAutenticado() )
{
    header("Location: index.php?seccion=home");
    exit;
}

?>

<section class="container-fluid">


    <form action="acciones/auth-iniciar-sesion.php" method="POST" class="login">
        <h2 class="titulo-form">Iniciar sesión</h2>

        <div class="col-12">
            <label for="email"></label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?= $old_data['email'] ?? ''; ?>">
        </div>
        <div class="col-12">
            <label for="password"></label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password"
                   value="<?= $old_data['password'] ?? ''; ?>">
        </div>

        <button type="submit" class="btn-block">Ingresar</button>

    </form>
    
</section>
