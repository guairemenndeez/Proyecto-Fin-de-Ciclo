<?php
session_start();
if ($_SESSION['permiso'] == 0) {
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
        // script para cuando sea actualizar que recoja los datos de la url
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener parámetros de la URL
            let urlParams = new URLSearchParams(window.location.search);

            // Obtener valores de los parámetros
            let Id = urlParams.get('id');
            let nombre = urlParams.get('nombre');
            let descripcion = urlParams.get('descripcion');
            let marca = urlParams.get('marca');

            // Llenar los campos del formulario con los valores obtenidos en caso de que no tenga un valor asignado el campo estara vacio
            document.getElementById('Id').value = Id || '';
            document.getElementById('nombreAcualizar').value = nombre || '';
            document.getElementById('descripcionAcualizar').value = descripcion || '';
            document.getElementById('marcaAcualizar').value = marca || '';
            if (null != Id) {
                document.getElementById('formulariocrear').style.display = "none";
                document.getElementById('formularioactualizar').style.display = "block";
            }
        });
    </script>





</head>

<body>
    <?php require "./cabecera.php" ?>

    <section id="formulariocrear" style="display: block;">
        <h1>Añadir una nueva coleccion</h1>
        <form id="formulario" onsubmit="return addColeccion()" method="POST">
            <p><label for="nombre">Nombre:</label></br>
                <input type="text" id="nombre" name="nombre" required>
            </p>
            <p><label for="descripcion">Descripcion:</label></br>
                <input type="text" id="descripcion" name="descripcion" required>
            </p>
            <p><label for="marca">Marca:</label></br>

                <select id="marca" name="marca">
                    <option value="" selected disabled>Selecciona la marca a la que pertenece la coleccion</option>
                    <?php require_once "../controlador/marca_controller.php";
                    $marcas = new Marca_controller;
                    $datosMarcas = json_decode($marcas->obtenerMarcas(), true);

                    foreach ($datosMarcas as $marca) {
                        echo "<option value='" . $marca["Id"] . "'>" . $marca["Nombre"] . "</option>";
                    }
                    ?>
                </select>
            </p>

            <button type="submit" class="btn btn-success">Añadir Coleccion</button>
        </form>
    </section>
    <section id="formularioactualizar" style="display: none;">
        <h1>Actualizar coleccion</h1>
        <form id="formulario" onsubmit="return updateColeccion()" method="POST">
            <p><label for="Id">Id:</label></br>
                <input type="Id" id="Id" name="Id" disabled>
            </p>
            <p><label for="nombre">Nombre:</label></br>
                <input type="text" id="nombreAcualizar" name="nombre" required>
            </p>
            <p><label for="descripcion">Descripcion:</label></br>
                <input type="text" id="descripcionAcualizar" name="descripcion" required>
            </p>
            <p><label for="marca">Marca:</label></br>

                <select id="marcaAcualizar" name="marca">
                    <option value="" selected disabled>Selecciona la marca a la que pertenece la coleccion</option>
                    <?php require_once "../controlador/marca_controller.php";
                    $marcas = new Marca_controller;
                    $datosMarcas = json_decode($marcas->obtenerMarcas(), true);

                    foreach ($datosMarcas as $marca) {
                        echo "<option value='" . $marca["Id"] . "'>" . $marca["Nombre"] . "</option>";
                    }
                    ?>
                </select>
            </p>

            <button type="submit" class="btn btn-success">Actualizar Coleccion</button>
        </form>
    </section>








    <!-- <script type="module" src="../js/crearFormulario.js"></script> -->
</body>

</html>