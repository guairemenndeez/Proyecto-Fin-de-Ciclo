<?php
require_once "../controlador/producto_controller.php";
require_once "../controlador/validador.php";


if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $funcion = $_REQUEST['funcion'];
    switch ($funcion) {
        case 'index':
            $producto=new Producto_controller();
            $datos = $producto->obtenerProductos();
            echo $datos;
            break;
        
        case 'obtenerProducto':
            $id = $_REQUEST['id'];
            $producto=new Producto_controller();
            echo $producto->obtenerProducto($id);
            break;

        case 'eliminar':
            $id = $_REQUEST['id'];
            $tipo=new Producto_controller();
            echo $tipo->eliminarProducto($id);
            break;

        case 'indextipo':
            $producto=new Producto_controller();
            $datos = $producto->obtenerProductosTipo($_GET['id']);
            echo $datos;
            break;

        case 'indexColeccion':
            $producto=new Producto_controller();
            $datos = $producto->obtenerProductosColeccion($_GET['id']);
            echo $datos;
            break;

        case 'indexstock':
            $producto=new Producto_controller();
            $datos = $producto->obtenerProductosStock($_GET['stock']);
            echo $datos;
            break;

        case 'nuevosProductos':
            $producto=new Producto_controller();
            $datos = $producto->obtenerProductosNuevos();
            echo $datos;
            break;

    }

}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if($_POST["funcion"]=="actualizar"){
        $datosintroducir['Id'] = $_POST["Id"];
        $datosintroducir['nombre'] = $_POST["nombreActualizar"];
        $datosintroducir['descripcion'] = $_POST["descripcionActualizar"];
        $datosintroducir['precio'] = $_POST["precioActualizar"];
        $datosintroducir['stock'] = $_POST["stockActualizar"];
        $datosintroducir['tipo'] = $_POST["tipoActualizar"];
        $datosintroducir['coleccion'] = $_POST["coleccionActualizar"];
        $datosintroducir['imagen'] = $_FILES["imgActualizar"];
        
        if(validar($datosintroducir)!= false){
            $producto=new Producto_controller();
            $datos = $producto->actualizarProducto($datosintroducir);
            echo $datos;
        }

    }else{

        $datosintroducir['nombre'] = $_POST["nombre"];
        $datosintroducir['descripcion'] = $_POST["descripcion"];
        $datosintroducir['precio'] = $_POST["precio"];
        $datosintroducir['stock'] = $_POST["stock"];
        $datosintroducir['tipo'] = $_POST["tipo"];
        $datosintroducir['coleccion'] = $_POST["coleccion"];
        $datosintroducir['imagen'] = $_FILES["img"];

        if(validar($datosintroducir)!= false){
            $producto=new Producto_controller();
            $datos = $producto->CrearProducto($datosintroducir);
            echo $datos;

        }

    }

}