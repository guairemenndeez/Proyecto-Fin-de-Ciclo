<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <script href="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script type="module" src="../JavaScript/usuario.js"></script>

    <script type="module" src="../JavaScript/cargarDatos.js"></script>
    <script type="module" src="../JavaScript/cargarProductosNuevo.js"></script>


    <link href="./style.css" rel="stylesheet">

    <?php

    require "../controlador/usuario_controller.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    ?>
    <title>Document</title>
</head>

<body>
    <?php require "./cabecera.php" ?>
    <div id="banner" class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center img-fluid">
        <div class="col-md-6 p-lg-5 mx-auto my-1">
            <h1 class="display-3 fw-bold"> Mendez Shop</h1>
            <h4>Esta tienda mola un fleje</h4>
            <div class="d-flex gap-3 justify-content-center lead fw-normal">
                <a role="button" class="btn" href="./productos.php"> Todos los Productos</a>
                <a role="button" class="btn" href="./nuevosproductos.php"> Todo lo nuevo a tu disposición</a>
            </div>
        </div>

    </div>
    <div class="container">

    </div>
    <div class="container">
        <h2 id="Titular" class="position-relative overflow-hidden text-center">Categorias de productos</h2>
        <br />
        <div id="tipos" class="row position-relative overflow-hidden text-center">

        </div>
    </div>
    <div class="container">
        <br />
        <div id="About-us" class="row position-relative overflow-hidden text-center">
            <h3>Nuevos Productos</h3>
            <div class="col" id="productosNuevo">

            </div>


        </div>
    </div>

    <?php require "./footer.php" ?>
</body>

</html>