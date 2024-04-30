<?php
require_once "../controlador/tipo_controller.php";
require_once "../controlador/validador.php";


if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $funcion = $_REQUEST['funcion'];
    switch ($funcion) {
        case 'index':
            $tipo=new Tipo_controller();
            $datos = $tipo->obtenerTipos();
            echo $datos;
            break;
        case 'obtenerTipo':
            $id = $_REQUEST['id'];
            $tipo=new Tipo_controller();
            echo $tipo->obtenerTipo($id);
            break;
        case 'eliminar':
            $id = $_REQUEST['id'];
            $tipo=new Tipo_controller();
            echo $tipo->eliminarTipo($id);
            break;
    }
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
   if($_POST['funcion']=="actualizar"){
    var_dump($_POST);
    // $funcion = $_POST['funcion'];
        $datosintroducir['id'] = $_POST["Id"];
        $datosintroducir['nombre'] = $_POST["nombre"];
        $datosintroducir['descripcion'] = $_POST["descripcion"];
        if(validar($datosintroducir)!= false){
            $tipo=new Tipo_controller();
            $datos = $tipo->actualizarTipo($datosintroducir);
            echo $datos;
        }
   }else{
    var_dump($_POST);
    // $funcion = $_POST['funcion'];
        $datosintroducir['nombre'] = $_POST["nombre"];
        $datosintroducir['descripcion'] = $_POST["descripcion"];
        if(validar($datosintroducir)!= false){
            $tipo=new Tipo_controller();
            $datos = $tipo->CrearTipo($datosintroducir);
            echo $datos;
        }
   }
            
}
