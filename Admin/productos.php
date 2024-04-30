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
        let descripcion = urlParams.get('descripcion');
        let precio = urlParams.get('precio');
        let stock = urlParams.get('stock');
        let tipo = urlParams.get('tipo');
        let coleccion = urlParams.get('coleccion');
        let imagen = urlParams.get('imagen');
        // Llenar los campos del formulario con los valores obtenidos en caso de que no tenga un valor asignado el campo estara vacio
        document.getElementById('Id').value = Id || '';
        document.getElementById('nombreActualizar').value = nombre || '';
        document.getElementById('descripcionActualizar').value = descripcion || '';
        document.getElementById('precioActualizar').value = precio || '';
        document.getElementById('stockActualizar').value = stock || '';
        document.getElementById('tipoActualizar').value = tipo || '';
        document.getElementById('coleccionActualizar').value = coleccion || '';
        document.getElementById('imgActualizar').value = imagen || '';
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

        <h1>Añadir nuevo Producto</h1>
        <form action="../API/productos.php" method="POST" enctype="multipart/form-data">
            <p><label for="nombre">Nombre:</label></br>
            <input type="text" id="nombre" name="nombre" required></p>
            <p><label for="descripcion">Descripcion:</label></br>
            <input type="text" id="descripcion" name="descripcion" required></p>
            <p><label for="precio">Precio:</label></br>
                <input type="number" id="precio" name="precio" required></p>
            <p><label for="stock">Stock:</label></br>
                <input type="number" id="stock" name="stock"></p>
            <p><label for="tipo">Tipo:</label></br>
            
            <select id="tipo" name="tipo">
                <option value="" selected disabled>Selecciona el tipo de producto</option>
                <?php require_once "../controlador/tipo_controller.php";
                $tipos = new Tipo_controller;
                $datosTipos = json_decode($tipos->obtenerTipos(), true);

                foreach ($datosTipos as $tipo) {
                    echo "<option value='".$tipo["Id"]."'>".$tipo["Nombre"]."</option>";
                }
                ?>
            </select></p>
        
            <p><label for="coleccion">Coleccion:</label> </br>   
                <select id="coleccion" name="coleccion" required>
                  <option value="" selected disabled>Selecciona la coleccion a la que pertenece</option>
                  <?php require_once "../controlador/coleccion_controller.php";
                $colecciones = new Coleccion_controller;
                $datosColeccion = json_decode($colecciones->obtenerColecciones(), true);

                foreach ($datosColeccion as $coleccion) {
                    echo "<option value='".$coleccion["Id"]."'>".$coleccion["Nombre"]."</option>";
                }
                ?>
                </select></p>
        
            <p><label for="img">Imagen:</label></br>
                <input type="file" id="img" name="img"></p>
        
            <button type="submit" class="btn btn-success">Añadir Producto</button>
          </form>
    </section>
    <section id="formularioActualizar" class="form" style="display: none;">

        <h1>Añadir nuevo Producto</h1>
        <form action="../API/productos.php" method="POST" enctype="multipart/form-data">
            <p></br>
                <input type="hidden" id="Id" name="Id"></p>
            <p><label for="nombreActualizar">Nombre:</label></br>
            <input type="text" id="nombreActualizar" name="nombreActualizar" required></p>
            <p><label for="descripcionActualizar">Descripcion:</label></br>
            <input type="text" id="descripcionActualizar" name="descripcionActualizar" required></p>
            <p><label for="precioActualizar">Precio:</label></br>
                <input type="number" id="precioActualizar" name="precioActualizar" required></p>
            <p><label for="stockActualizar">Stock:</label></br>
                <input type="number" id="stockActualizar" name="stockActualizar"></p>
            <p><label for="tipoActualizar">Tipo:</label></br>
            
            <select id="tipoActualizar" name="tipoActualizar">
                <option value="" selected disabled>Selecciona el tipo de producto</option>
                <?php require_once "../controlador/tipo_controller.php";
                $tipos = new Tipo_controller;
                $datosTipos = json_decode($tipos->obtenerTipos(), true);

                foreach ($datosTipos as $tipo) {
                    echo "<option value='".$tipo["Id"]."'>".$tipo["Nombre"]."</option>";
                }
                ?>
            </select></p>
        
            <p><label for="coleccionActualizar">Coleccion:</label> </br>   
                <select id="coleccionActualizar" name="coleccionActualizar" required>
                  <option value="" selected disabled>Selecciona la coleccion a la que pertenece</option>
                  <?php require_once "../controlador/coleccion_controller.php";
                $colecciones = new Coleccion_controller;
                $datosColeccion = json_decode($colecciones->obtenerColecciones(), true);

                foreach ($datosColeccion as $coleccion) {
                    echo "<option value='".$coleccion["Id"]."'>".$coleccion["Nombre"]."</option>";
                }
                ?>
                </select></p>
        
            <p><label for="imgActualizar">Imagen:</label></br>
                <input type="file" id="imgActualizar" name="imgActualizar"></p>
                <input name="funcion"type="hidden"id="funcion"value="actualizar"/>
            <button type="submit" class="btn btn-success">Añadir Producto</button>
          </form>
    </section>







<!-- <script type="module" src="../js/crearFormulario.js"></script> -->
</body>
</html>