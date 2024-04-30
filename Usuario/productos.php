<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <script href="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script type="module" src="../JavaScript/usuario.js"></script>
    <script type="module" src="../JavaScript/cargarProductos.js"></script>
    <script type="module" src="../JavaScript/cargarTipo.js"></script>
    <script type="module" src="../JavaScript/cargarStock.js"></script>
    <script type="module" src="../JavaScript/cargarColeccion.js"></script>
    <script type="module" src="../JavaScript/carrito.js"></script>
    <title>Productos</title>
    <?php 
    
    require "../controlador/usuario_controller.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
           ?>
</head>
<body>
<?php require "./cabecera.php";
    
?>    <div class="container-fluid">
    <div class="row-2 border-bottom">
        <h1 id="Titulo">Productos</h1>
    </div>
    <br/>
    <div class="row-auto d-flex flex-wrap">
        <div class="col-2">
        <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          Tipo de Productos
        </button>
        <div class="collapse show" id="home-collapse">
          <ul id="tipo" class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
        Stock
        </button>
        <div class="collapse" id="dashboard-collapse">
          <ul id="stock"  class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
          Colecciones
        </button>
        <div class="collapse" id="orders-collapse">
          <ul id="coleccion" class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            
          </ul>
        </div>
      </li>
    </ul>

        </div>
        <div id="productos" class="col-10">

        </div>


    </div>
    </div>




    <?php require "./footer.php" ?>
</body>
</html>