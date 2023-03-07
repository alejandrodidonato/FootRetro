<?php


if ( !$auth->estaAutenticado() )
{
    header("Location: index.php?seccion=home");
    exit;
}

?>
<section class="gracias">
    <article>
        <section class="gracias-section">
            <p class="title-gracias">Gracias por tu compra!
            </p>
            <p>En breve te estará llegando un mail con la factura y el seguimiento del envío.</p>
            <div>
                <a href="index.php?seccion=home">
                    Volver a la home <i class="fa-solid fa-house"></i>
                </a>
            </div>
        </section>
    </article>
</section>
