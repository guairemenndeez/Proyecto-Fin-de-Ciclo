<?php

require_once "../base_de_datos/conexion_base_datos.php";
require_once "../modelo/pedidos.php";
require "../controlador/producto_controller.php";


class Pedidos_controller{

    function obtenerPedidos(){
    
            $pedido = new pedidos();
            $pedidos = $pedido->getPedidos(); 
            $datosjson = json_encode($pedidos);
            return $datosjson; 
        
    }

    function obtenerPedido($id){

        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $pedido = new pedidos();
            $pedidos = $pedido->getPedido($id); 
            $datosjson = json_encode($pedidos);
            return $datosjson; 
        }

    }
    
    function añadirPedido($datos){

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            session_start();
            $_SESSION['carrito'][$datos['Id']] = isset($_SESSION['carrito'][$datos['Id']]) ? $_SESSION['carrito'][$datos['Id']] : 0;
            $_SESSION['carrito'][$datos['Id']] += $datos['Cantidad'];
            return  true; 
        }

    }
    function eliminarProductoPedido($datos){

        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            session_start();
            if($datos['Cantidad']>=$_SESSION['carrito'][$datos['Id']]){
                unset($_SESSION['carrito'][$datos['Id']]);
                return "Se ha eliminado el producto de la cesta";
            }else{
                $_SESSION['carrito'][$datos['Id']] -= $datos['Cantidad'];
                if($_SESSION['carrito'][$datos['Id']]==0){
                    unset($_SESSION['carrito'][$datos['Id']]);
                    return "Se ha eliminado el producto de la cesta";
                }
                return "Producto eliminado con exito";
            }
        }
    }

    function datosCarrito(){

        session_start();
        $datos = array(); 
        $datosproducto = new Producto_controller;
      
        foreach ($_SESSION['carrito'] as $producto => $unidades) {
            $datos[0][] = $datosproducto->obtenerProducto($producto); 
            $datos[1][] = $unidades;
        }
        return json_encode($datos);

    }

    function procesarPedido($Carrito){

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $tipo = new Pedidos();
            $tipos = $tipo->createCarrito($Carrito); 
            $datosjson = json_encode($tipos);
            return $datosjson; 
        }

    }

    function obtenerPedidoUsuario($token){

        if ($_SERVER['REQUEST_METHOD'] === 'GET'){           
            $pedido = new pedidos();
            $pedidos = $pedido->getPedidoUsuario($token); 
            $datosjson = json_encode($pedidos);
            return $datosjson; 
        }

    }

}
