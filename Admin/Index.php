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
    <!-- <script src="POP_UT5.js"></script> -->
    <script type="module" src="./js/cabecera.js"></script>
    <link href="../bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php  include "cabecera.php"  ?>
    <section id="formulario" style="display: none;">
        
    </section>

    <section id="busqueda" class="container "  style="display: none;">
        <h2 id="titulo"></h2>
        <div id="contenido"></div>


    
    </section>

    <section id="inicio" class="container "  style="display: block;">
      <!-- Linea Superior -->
      <div class="row mb-2">
        <!-- Listado -->
        <div class="col-md-5">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <h3 class="mb-0">Listado</h3>
              <div class="mb-1 text-body-secondary">Lorem ipsum</div>
              <p class="card-text mb-auto">Listado de la base seleccionada</p>
              <button class="btn btn-primary  align-items-center" type="button" onclick="mostrarLista()">
                Continuar
              </button>
            </div> 
          </div>
        </div>
        <!-- crear -->
        <div class="col-md-5">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <h3 class="mb-0">Crear</h3>
              <div class="mb-1 text-body-secondary">dolor sit</div>
              <p class="card-text mb-auto">Crear en la base de datos</p>
              <button class="btn btn-warning  align-items-center" type="button" onclick="mostrarCrear()">
                Continuar
              </button>
            </div> 
          </div>
        </div>
      </div>
      <!-- Linea Inferior -->
      <div class="row mb-2">
        <!-- Usuario -->
        <div class="col-md-5">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <h3 class="mb-0">Usuarios</h3>
              <div class="mb-1 text-body-secondary">amet, consectetur</div>
              <p class="card-text mb-auto">Listado de los Usuarios con sus respectivos carritos</p>
              <button class="btn btn-success  align-items-center" type="button" onclick="mostrarUsuarios()">
                Continuar
              </button>
            </div> 
          </div>
        </div>
        <!-- crear -->
        <div class="col-md-5">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <h3 class="mb-0">Salir</h3>
              <div class="mb-1 text-body-secondary">adipiscing elit</div>
              <p class="card-text mb-auto">Volver a la tienda de Usuarios</p>
              <button class="btn btn-danger  align-items-center" type="button" onclick="tienda()">
                Continuar
              </button>
            </div> 
          </div>
        </div>
      </div>
    </section>

</body>
</html>