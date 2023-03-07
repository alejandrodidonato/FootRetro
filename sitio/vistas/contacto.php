  <section id="consulta" class="container">
   <h1>Contacto</h1>
   <p>Si necesitás pedirnos una camiseta que no encontrás en el listado, o tenés alguna duda sobre los productos, escribinos y te contestaremos a la brevedad.</p>
   <section>
       <form action="index.php" method="POST" >
       
       <label for="nombre"> </label><input id="nombre" type="text" name="nombre" placeholder="Nombre*" class="form-control" required>
       <label for="apellido"></label><input id="apellido" type="text" name="apellido" placeholder="Apellido*" class="form-control" required>
        <label for="mail"></label><input id="mail" type="email" name="mail" placeholder="Mail*" class="form-control" required>
        <label for="tel"></label><input id="tel" type="number" name="telefono" placeholder="Teléfono" class="form-control">
        <label for="mensaje"></label>
        <textarea id="mensaje" name="mensaje" placeholder="Tu mensaje*"></textarea>
        <p><small>*Campos obligatorios</small></p>
        <input type="submit" name="submit" value="Enviar">
        
        </form>
        
   </section>
</section>