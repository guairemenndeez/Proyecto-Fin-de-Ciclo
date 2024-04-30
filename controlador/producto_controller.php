<?php

require_once "../base_de_datos/conexion_base_datos.php";
require_once "../modelo/producto.php";

class Producto_controller{

    function obtenerProductos(){

        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $producto = new Producto();
            $productos = $producto->getProductos(); 
            $datosjson = json_encode($productos);
            return $datosjson; 
        }

    }
    
    function obtenerProducto($id){

        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $producto = new Producto();
            $productos = $producto->getProducto($id); 
            $datosjson = json_encode($productos);
            return $datosjson; 
        }

    }

    function CrearProducto($datos){

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $producto = new Producto();
            $productos = $producto->createProducto($datos); 
            $datosjson = json_encode($productos);
            return $datosjson; 
        }

    }
    
    function eliminarProducto($id){

        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $producto = new Producto();
            $productos = $producto->deleteProducto($id); 
            $datosjson = json_encode($productos);
            return $datosjson; 
        }

    }
    function actualizarProducto($datos){

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $producto = new Producto();
            $productos = $producto->updateProducto($datos); 
            $datosjson = json_encode($productos);
            return $datosjson; 
        }

    }

    function obtenerProductosTipo($idTipo){

        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $tipo = new Producto();
            $tipos = $tipo->getProductosTipo($idTipo); 
            $datosjson = json_encode($tipos);
            return $datosjson; 
        }

    }
    function obtenerProductosColeccion($idColeccion){

        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $coleccion = new Producto();
            $coleccions = $coleccion->getProductosColeccion($idColeccion); 
            $datosjson = json_encode($coleccions);
            return $datosjson; 
        }

    }
    function obtenerProductosStock($stock){

        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $productos = new Producto();
            $stockProductos = $productos->getProductosStock($stock); 
            $datosjson = json_encode($stockProductos);
            return $datosjson; 
        }

    }

    function obtenerProductosNuevos(){

        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $producto = new Producto();
            $productos = $producto->getProductosNuevos(); 
            $datosjson = json_encode($productos);
            return $datosjson; 
        }

    }


}
