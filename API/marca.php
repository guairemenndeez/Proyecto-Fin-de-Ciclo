<?php
require_once "../controlador/marca_controller.php";
require_once "../controlador/validador.php";


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $funcion = $_REQUEST['funcion'];
    switch ($funcion) {
        case 'index':
            $marca = new Marca_controller();
            $datos = $marca->obtenerMarcas();
            echo $datos;
            break;

        case 'obtenerMarca':
            $id = $_REQUEST['id'];
            $marca = new Marca_controller();
            echo $marca->obtenerMarca($id);
            break;

        case 'eliminar':
            $id = $_REQUEST['id'];
            $marca = new Marca_controller();
            echo $marca->eliminarMarca($id);
            break;

    }

}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['funcion'] == "actualizar") {
        $datosintroducir['Id'] = $_POST["Id"];
        $datosintroducir['nombre'] = $_POST["nombre"];
        $datosintroducir['descripcion'] = $_POST["descripcion"];
        if (validar($datosintroducir) != false) {
            $marca = new Marca_controller();
            $datos = $marca->actualizarMarca($datosintroducir);
            echo $datos;
        }
    } else {
        $datosintroducir['nombre'] = $_POST["nombre"];
        $datosintroducir['descripcion'] = $_POST["descripcion"];
        if (validar($datosintroducir) != false) {
            $marca = new Marca_controller();
            $datos = $marca->crearMarca($datosintroducir);
            echo $datos;
        }
    }
}
