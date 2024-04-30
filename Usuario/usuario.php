<section id="formularioCrear" class="form" style="display: block;">

    <h1>Añadir un nuevo Usuario</h1>
    <form onsubmit="return addUsuario()" method="POST">
        <p><label for="nombre">Nombre:</label></br>
        <input type="text" id="nombre" name="nombre" required></p>
        <p><label for="apellidos">Apellidos:</label></br>
        <input type="text" id="apellidos" name="apellidos" required></p>
        <p><label for="email">Correo electronico:</label></br>
        <input type="email" id="email" name="email" required></p>
        <p><label for="direccion">Direccion:</label></br>
        <input type="text" id="direccion" name="direccion"></p>
        <p><label for="telefono">Telefono:</label></br>
        <input type="number" id="telefono" name="telefono" required></p>
        <p><label for="contraseña">Contraseña:</label></br>
        <input type="password" id="contraseña" name="contraseña"placeholder="Usa numeros, mayusculas y al menos 8 caracteres" required></p>
        <p><label for="repcontraseña">Repetir Contraseña:</label></br>
        <input type="password" id="repcontraseña" name="repcontraseña" required></p>
        <button type="submit" class="btn btn-success">Crear Usuario</button>
    </form>
</section>
    