<?php

require_once  "../base_de_datos/conexion_base_datos.php";
// require "../Modelos/Producto.php";

class Pedidos{
    private $Id; //int autoincrement
    private $Num_Token; // int
    private $Id_Producto; //VARCHAR
    private $Cantidad; //VARCHAR
    private $Precio; //vARCHAR
    private $Estado; //VARCHAR
    private $Metodo_Pago; // VARCHAR
    private $Direccion; //DIRECCION
    private $FechaPedido; //DATE
    private $TotalPedido; //DECIMAL

    //Funciones de la Clase Pedidos


    function getPedidos(){
        try{
            $bd = conectarDB();
        
            $pedidosQuery = $bd->prepare("SELECT * from pedidos");
            $pedidosQuery->execute();
            
            if ($pedidosQuery == false) {
                return false;
            }
            
            return $pedidosQuery->fetchAll(PDO::FETCH_ASSOC);
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }

     function getPedido($Id){
        try{
            $bd = conectarDB();
        
            $pedidosQuery = $bd->prepare("SELECT * FROM pedidos WHERE id =:id");
            $pedidosQuery->bindParam(':id', $Id);
            $pedidosQuery->execute();
            
            if ($pedidosQuery == false) {
                return false;
            }
            
            return $pedidosQuery->fetchAll(PDO::FETCH_ASSOC);
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }
     
    function deletePedido($Id){
        try{
            $bd = conectarDB();
        
            $pedidosQuery = $bd->prepare("DELETE FROM pedidos WHERE Id =:id");
            $pedidosQuery->bindParam(':id', $Id);

            $pedidosQuery->execute();
            
            if ($pedidosQuery == false) {
                return false;
            }
            
            return true;
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }

    function createCarrito($datos){
        $dia = date("d-m-y");
        $datos['estado']= "En Preparacion";
        try{
            $bd = conectarDB();
        //Id,Num_Token,Id_Producto,Cantidad,Precio,Estado,Metodo_Pago,Direccion,FechaPedido,TotalPedido	
        $pedidosQuery = $bd->prepare("INSERT INTO pedidos( Num_Token, Id_Producto, Cantidad, Precio, Estado,Metodo_Pago,Direccion,FechaPedido,TotalPedido)
                                                  VALUES ( :token, :producto, :cantidad, :precio, :estado,:metodo_pago,:direccion,:fecha,:total)");
        $pedidosQuery->bindParam(':token', $datos['token']);
        $pedidosQuery->bindParam(':producto', $datos['producto']);
        $pedidosQuery->bindParam(':cantidad', $datos['cantidad']);
        $pedidosQuery->bindParam(':precio', $datos['precio']);
        $pedidosQuery->bindParam(':estado', $datos['estado']);
        $pedidosQuery->bindParam(':metodo_pago', $datos['metodoPago']);
        $pedidosQuery->bindParam(':direccion', $datos['direccion']);
        $pedidosQuery->bindParam(':fecha', $dia);
        $pedidosQuery->bindParam(':total', $datos['total']);
        $pedidosQuery->execute();
        
            if ($pedidosQuery == false) {
                return false;
            }
            return "TRUE";
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }

    function getPedidoUsuario($token){
        try{
            $bd = conectarDB();
        
            $pedidosQuery = $bd->prepare("SELECT * FROM pedidos WHERE Num_Token =:tokenId");
            $pedidosQuery->bindParam(':tokenId', $token);
            $pedidosQuery->execute();
            
            if ($pedidosQuery == false) {
                return false;
            }
            
            return $pedidosQuery->fetchAll(PDO::FETCH_ASSOC);
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }        
    }




}
