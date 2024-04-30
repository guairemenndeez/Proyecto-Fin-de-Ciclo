<?php
//Importaciones
require_once "../controlador/coleccion_controller.php";
require_once "../controlador/validador.php";


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $funcion = $_REQUEST['funcion'];
    switch ($funcion) {
        case 'index':
            $coleccion = new Coleccion_controller();
            $datos = $coleccion->obtenerColecciones();
            echo $datos;
            break;

        case 'obtenerProducto':
            $id = $_REQUEST['id'];
            $coleccion = new Coleccion_controller();
            echo $coleccion->obtenerColeccion($id);
            break;

        case 'eliminar':
            $id = $_REQUEST['id'];
            $tipo = new Coleccion_controller();
            echo $tipo->eliminarColeccion($id);
            break;

    }

}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['funcion'] == "actualizar") {
        $datosintroducir['Id'] = $_POST["Id"];
        $datosintroducir['nombre'] = $_POST["nombre"];
        $datosintroducir['descripcion'] = $_POST["descripcion"];
        $datosintroducir['marca'] = $_POST["marca"];
        if (validar($datosintroducir) != false) {
            $coleccion = new Coleccion_controller();
            $datos = $coleccion->actualizarColeccion($datosintroducir);
            echo $datos;
        }
    } else {
        $datosintroducir['nombre'] = $_POST["nombre"];
        $datosintroducir['descripcion'] = $_POST["descripcion"];
        $datosintroducir['marca'] = $_POST["marca"];
        if (validar($datosintroducir) != false) {
            $coleccion = new Coleccion_controller();
            $datos = $coleccion->CrearColeccion($datosintroducir);
            echo $datos;
        }
    }
}
