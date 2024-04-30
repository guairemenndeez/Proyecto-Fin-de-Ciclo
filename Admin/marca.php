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

        <h1>Añadir una nueva Marca</h1>
        <form onsubmit="return addMarca()" method="POST">
            <p><label for="nombre">Nombre:</label></br>
            <input type="text" id="nombre" name="nombre" required></p>
            <p><label for="descripcion">Descripcion:</label></br>
            <input type="text" id="descripcion" name="descripcion" required></p>
            
        
            <button type="submit" class="btn btn-success">Añadir Marca</button>
          </form>
    </section>
    <section id="formularioActualizar" class="form" style="display: none;">

        <h1>Actualizar Marca</h1>
        <form onsubmit="return updateMarca()" method="POST">
        <p><label for="Id">Id:</label></br>
            <input type="Id" id="Id" name="Id" disabled></p>
            <p><label for="nombreActualizar">Nombre:</label></br>
            <input type="text" id="nombreActualizar" name="nombreActualizar" required></p>
            <p><label for="descripcionActualizar">Descripcion:</label></br>
            <input type="text" id="descripcionActualizar" name="descripcionActualizar" required></p>
            
        
            <button type="submit" class="btn btn-success">Actualizar Marca</button>
          </form>
    </section>







<!-- <script type="module" src="../js/crearFormulario.js"></script> -->
</body>
</html>