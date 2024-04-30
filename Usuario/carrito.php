<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <script href="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    

    <!-- JavaScript -->
    <script type="module" src="../JavaScript/usuario.js"></script>
    <script type="module" src="../JavaScript/carritoTabla.js"></script>
    <script type="module" src="../JavaScript/carrito.js"></script>



    <title>Document</title>
    <?php 
    
    require "../controlador/usuario_controller.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
           ?>
</head>
<body>
<?php require "./cabecera.php"?> 
<div class="container">
    <form onsubmit="return formularioPagar()" method="POST">
        <div class="row">
            <div id="productos" class="col-md-10">
                <!-- Aquí se mostrarán los productos -->
            </div>
            <div id="resumenTotal" class="col-md-2">
                <!-- Aquí se mostrará el resumen total -->
            </div>
        </div>
    </form>
        
</div>










<?php require "./footer.php"?>    
</body>
</html>