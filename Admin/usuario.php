<?php
    session_start();
    if($_SESSION['permiso']==0){
        header("Location:../");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="./style.css">

    <!-- JavaScript -->
    <script type="module" src="./js/cabecera.js"></script>
    <script type="module" src="./js/añadir.js"></script>
    <script type="module" src="./js/editar.js"></script>
    <script>
        // script para cuando sea Actualizar que recoja los datos de la url
        document.addEventListener('DOMContentLoaded', function () {
        // Obtener parámetros de la URL
        let urlParams = new URLSearchParams(window.location.search);

        // Obtener valores de los parámetros
        let Id = urlParams.get('id');
        let nombre = urlParams.get('nombre');
        let apellidos = urlParams.get('apellidos');
        let correo = urlParams.get('correo');
        let direccion = urlParams.get('direccion');
        let telefono = urlParams.get('telefono');
        let conteseña = urlParams.get('conteseña');
        let imagen = urlParams.get('imagen');
        // Llenar los campos del formulario con los valores obtenidos en caso de que no tenga un valor asignado el campo estara vacio
        document.getElementById('Id').value = Id || '';
        document.getElementById('nombreActualizar').value = nombre || '';
        document.getElementById('apellidosActualizar').value = apellidos || '';
        document.getElementById('correoActualizar').value = correo || '';
        document.getElementById('direccionActualizar').value = direccion || '';
        document.getElementById('telefonoActualizar').value = telefono || '';
        document.getElementById('contraseñaActualizar').value = conteseña || '';

        if(null!=Id){
            document.getElementById('formularioCrear').style.display="none";
            document.getElementById('formularioActualizar').style.display="block";
        }
        
        
        });
    </script>

</head>
<body>
<?php require "./cabecera.php"?>
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
    <section id="formularioActualizar" class="form" style="display: none;">

<h1>Añadir un nuevo Usuario</h1>
<form onsubmit="return updateUsuario()" method="POST">
<input type="hidden" id="Id" name="Id"></p>
    <p><label for="nombreActualizar">Nombre:</label></br>
    <input type="text" id="nombreActualizar" name="nombreActualizar" required></p>
    <p><label for="apellidosActualizar">Apellidos:</label></br>
    <input type="text" id="apellidosActualizar" name="apellidosActualizar" required></p>
    <p><label for="correoActualizar">Correo electronico:</label></br>
    <input type="email" id="correoActualizar" name="correoActualizar" required></p>
    <p><label for="direccionActualizar">Direccion:</label></br>
    <input type="text" id="direccionActualizar" name="direccionActualizar"></p>
    <p><label for="telefonoActualizar">Telefono:</label></br>
    <input type="number" id="telefonoActualizar" name="telefonoActualizar" required></p>
    <p><label for="contraseñaActualizar">Contraseña:</label></br>
    <input type="password" id="contraseñaActualizar" name="contraseñaActualizar"placeholder="Usa numeros, mayusculas y al menos 8 caracteres" required></p>
    

    <button type="submit" class="btn btn-success">Crear Usuario</button>
  </form>
</section>






<!-- <script type="module" src="../js/crearFormulario.js"></script> -->
</body>
</html>