<?php
require_once "../controlador/pedidos_controller.php";
require_once "../modelo/producto.php";
require_once "../controlador/validador.php";
require_once "../controlador/token_controller.php";


if($_SERVER['REQUEST_METHOD'] === 'GET'){  
    $funcion = $_REQUEST['funcion'];
    switch ($funcion) {
        case 'index':
            $pedidos=new Pedidos_controller();
            $datos = $pedidos->obtenerPedidos();
            echo $datos;
            break;

        case 'obtenerProducto':
            $id = $_REQUEST['id'];
            $pedidos=new Pedidos_controller();
            echo $pedidos->obtenerPedido($id);
            break;

        case 'eliminar':
            $datosintroducir['Id'] = $_GET["Id"];
            $datosintroducir['Cantidad'] = $_GET["Cantidad"];
            $pedidos=new Pedidos_controller();
            echo $pedidos->eliminarProductoPedido($datosintroducir);
            break;

        case 'carrito':
            $pedidos=new Pedidos_controller();
            echo $pedidos->datosCarrito();
            break;

        case 'pedidosUsuario':
            session_start();

            $token= new Token_controller;
            $tokeninfo= $token->obtenerTokenNumero($_SESSION['token']);

            $tokenId = $tokeninfo[0]["Id"];
            $pedidos=new Pedidos_controller();
            $datos = $pedidos->obtenerPedidoUsuario($tokenId);
            echo $datos;
            break;

    }

}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if($_POST["funcion"]=="añadir"){
        $datosintroducir['Id'] = $_POST["Id"];
        $datosintroducir['Cantidad'] = $_POST["Cantidad"];
            $pedidos=new Pedidos_controller();
            $datos=$pedidos->añadirPedido($datosintroducir);
            if($datos == true){
                echo "producto añadido con exito";
            }else{
                echo json_encode(false);
            }       
    }
    if($_POST["funcion"]=="completarPedido"){
        $totalCarrito = 0;
        $idProductoCarrito="";
        $unidadesCarrito="";
        $preciosCarrito="";

        $valores = $_POST['valores'];
        $datos= explode(",",$valores);
        session_start();
        foreach ($_SESSION['carrito'] as $idProducto => $unidades){
                $producto= new Producto;
                $productos =$producto->getProducto($idProducto);

                $precioProducto = $productos[0]['Precio'];
                $PrecioTotalProducto = $precioProducto * $unidades;

                $idProductoCarrito .= $idProducto.",";
                $unidadesCarrito .= $unidades.",";
                $preciosCarrito .= $precioProducto.",";
                $totalCarrito += $PrecioTotalProducto;            
        }   

        $idProductoCarrito = rtrim($idProductoCarrito, ",");
        $unidadesCarrito = rtrim($unidadesCarrito, ",");
        $token= new Token_controller;
        $tokeninfo= $token->obtenerTokenNumero($_SESSION['token']);

        $datosCarrito["token"] = $tokeninfo[0]["Id"];
        $datosCarrito['nombre'] = $datos[0];
        $datosCarrito['apellido'] = $datos[1];
        $datosCarrito['email'] = $datos[2];
        $datosCarrito['metodoPago'] = $datos[3];
        $datosCarrito['direccion'] = $datos[4];
        $datosCarrito["producto"]= $idProductoCarrito;
        $datosCarrito["cantidad"]= $unidadesCarrito;
        $datosCarrito["precio"]= $preciosCarrito;
        $datosCarrito["total"]= $totalCarrito;

        if($datosCarrito['metodoPago']=="Tarjeta"){
            $datosCarrito['tarjetaNum'] = $datos[5];
            $datosCarrito['fechaCad'] = $datos[6];
            $datosCarrito['Cvv'] = $datos[7];
        }

        if(validar($datosCarrito)!= false){
            $pedidos=new Pedidos_controller();
            $datos=$pedidos->procesarPedido($datosCarrito);
            if($datos == true){
                echo json_encode(True);
            }else{
                echo json_encode(false);
            }

        }    
                        
    }

}