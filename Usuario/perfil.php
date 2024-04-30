<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <script href="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    
    <script type="module" src="../JavaScript/usuario.js"></script>
    <script type="module" src="../JavaScript/cargarInfoUsuario.js"></script>

    <?php     
        require "../controlador/usuario_controller.php";
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    ?>
    <title>Document</title>
</head>
<body >
    <?php require "./cabecera.php" ?>
    <div class="position-relative overflow-hidden  text-center img-fluid">
        <div class="col-md-6 mx-auto my-1">
            <img src="../fotos/banner1.png" class="img-fluid">
    

    </div>
    <div class="container">
        <h2>INFORMACION PERFIL DE USUARIO</h2>
        <form id="formulario" class="ms-5 ps-5" method="POST">
        <div class="row">
        <div class="col-md-3">
            <label for="nombreUsuario" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombreUsuario" disabled readonly>
        </div>
        <div class="col-md-3">
            <label for="apellidoUsuario" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellidoUsuario"disabled readonly>
        </div>
        <div class="col-md-3">
            <label for="correoUsuario" class="form-label">Correo:</label>
            <input type="email" class="form-control" id="correoUsuario"disabled readonly>
        </div>
    </div>
    <div class="row">     
        <div class="col-md-3">
            <label for="direccionUsuario" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccionUsuario"disabled readonly>
        </div>
        <div class="col-md-3">
            <label for="telefonoUsuario" class="form-label">Telefono</label>
            <input type="tlf" class="form-control" id="telefonoUsuario"disabled readonly>
        </div>
        <p> </p>
    </div>
    <div class="row">
    <h5>Pedidos de Usuario</h5>
        <div class="col-md-9" id="contenido">
           
        </div>
    </div>
    <div class="row-auto">
        <div class="col-auto mt-5 position-relative overflow-hidden  text-center">
        <a id="boton" type="button " class="btn btn-primary" onclick=" modificarInformacion()">Modificar Información</a>        
        <button id="boton" type="submit " class="btn btn-primary" onclick="actualizarDatos()">Actualizar informacion</button>        
        </div>
    
    </div>
        </form>




    </div>
    
    
    <?php require "./footer.php" ?>
</body>
</html>