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
    <script type="module" src="./js/añadir.js"></script>
    <script type="module" src="./js/cabecera.js"></script>
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
        // Llenar los campos del formulario con los valores obtenidos en caso de que no tenga un valor asignado el campo estara vacio
        document.getElementById('Id').value = Id || '';
        document.getElementById('nombreActualizar').value = nombre || '';
        document.getElementById('descripcionActualizar').value = descripcion || '';

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

        <h1>Añadir un nuevo Tipo</h1>
        <div id="contenido"></div>
        <form onsubmit="return addTipo()" method="POST">
            <p><label for="nombre">Nombre:</label></br>
            <input type="text" id="nombre" name="nombre" required></p>
            <p><label for="descripcion">Descripcion:</label></br>
            <input type="text" id="descripcion" name="descripcion" required></p>
            
        
            <button type="submit" class="btn btn-success">Añadir Tipo</button>
          </form>
    </section>
    
    <section id="formularioActualizar" class="form" style="display: none;">
        <h1>Añadir un nuevo Tipo</h1>
        <div id="contenido"></div>
        <form onsubmit="return updateTipo()" method="POST">
            <input type="hidden" id="Id" name="Id"></p>
            <p><label for="nombreActualizar">Nombre:</label></br>
            <input type="text" id="nombreActualizar" name="nombre" required></p>
            <p><label for="descripcionActualizar">Descripcion:</label></br>
            <input type="text" id="descripcionActualizar" name="descripcion" required></p>


            <button type="submit" class="btn btn-success">Añadir Tipo</button>
        </form>
    </section>


</body>
</html>