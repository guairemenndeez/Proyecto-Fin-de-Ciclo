<?php

require_once  "../base_de_datos/conexion_base_datos.php";
require_once "../foto.php";

class Producto{
    private $Id;  //INT AUTO-INCREMENT
    private $Nombre; //VARCHAR(50)
    private $Descripcion; //VARCHAR(255)
    private $Precio; //DECIMAL(6,2)
    private $Stock; //INT(11)
    private $Tipo_Id;  //INT(11) 
    private $Coleccion_Id; //INT (11)
    private $Imagen; //VARCHAR (255)


    function getProductos(){
        try{
            $bd = conectarDB();
        
            $productosQuery = $bd->prepare("SELECT * from productos");
            $productosQuery->execute();
            
            if ($productosQuery == false) {
                return false;
            }
            
            return $productosQuery->fetchAll(PDO::FETCH_ASSOC);
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }

     function getProducto($Id){
        try{
            $bd = conectarDB();
        
            $productosQuery = $bd->prepare("SELECT * FROM productos WHERE id =:id");
            $productosQuery->bindParam(':id',$Id); 
            $productosQuery->execute();
            
            if ($productosQuery == false) {
                return false;
            }
            
            return $productosQuery->fetchAll(PDO::FETCH_ASSOC);
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }
    function createProducto($datos){
        $nombreProducto=$datos['nombre'];
        $descripcionProducto=$datos['descripcion'];
        $precioProducto = $datos["precio"];
        $stockProducto = $datos["stock"];
        $tipoProducto = $datos["tipo"];
        $coleccionProducto = $datos["coleccion"];
        $imagenProducto = $datos["imagen"]["tmp_name"];
        try{
            $bd = conectarDB();
        
            $productoQuery = $bd->prepare("INSERT INTO productos(Nombre, Descripcion, Precio, Stock, Tipo_id, Coleccion_id)
                                            VALUES (:nombre, :descripcion, :precio, :stock, :tipo, :coleccion)");
                                            
            $productoQuery->bindParam(':nombre', $nombreProducto);
            $productoQuery->bindParam(':descripcion', $descripcionProducto);
            $productoQuery->bindParam(':precio', $precioProducto);
            $productoQuery->bindParam(':stock', $stockProducto);
            $productoQuery->bindParam(':tipo', $tipoProducto);
            $productoQuery->bindParam(':coleccion', $coleccionProducto);
            $productoQuery->execute();

            if ($productoQuery == false) {
                return false;
            }

            $id = $bd->lastInsertId(); 

            $fotoProducto=Comprobarfoto($imagenProducto, $id);
            $productosQuery = $bd->prepare("UPDATE productos SET Imagen=:imagen WHERE id = :id");
            $productosQuery->bindParam(':imagen', $fotoProducto);
            $productosQuery->bindParam(':id', $id);

            $productosQuery->execute();
            
            return "TRUE";
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }

    function deleteProducto($Id){
        try{
            $bd = conectarDB();
        
            $productosQuery = $bd->prepare("DELETE FROM productos WHERE Id =:id");
            $productosQuery->bindParam(':id',$Id); 

            $productosQuery->execute();
            
            if ($productosQuery == false) {
                return false;
            }
            
            return true;
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }

    function updateProducto($datos){
        $id=$datos['Id'];
        $nombreProducto=$datos['nombre'];
        $descripcionProducto=$datos['descripcion'];
        $precioProducto = $datos["precio"];
        $stockProducto = $datos["stock"];
        $tipoProducto = $datos["tipo"];
        $coleccionProducto = $datos["coleccion"];
        $imagenProducto = $datos["imagen"]["tmp_name"];
        $fotoProducto=Comprobarfoto($imagenProducto, $id);
        try{
            $bd = conectarDB();
        
            $productoQuery = $bd->prepare("UPDATE productos set Nombre= :nombre, Descripcion= :descripcion,Precio= :precio, Stock= :stock, Tipo_id= :tipo, Coleccion_id= :coleccion, Imagen= :imagen WHERE id=:id");
                              
            $productoQuery->bindParam(':id', $id);
            $productoQuery->bindParam(':nombre', $nombreProducto);
            $productoQuery->bindParam(':descripcion', $descripcionProducto);
            $productoQuery->bindParam(':precio', $precioProducto);
            $productoQuery->bindParam(':stock', $stockProducto);
            $productoQuery->bindParam(':tipo', $tipoProducto);
            $productoQuery->bindParam(':coleccion', $coleccionProducto);
            $productoQuery->bindParam(':imagen', $fotoProducto);
            $productoQuery->execute();

            if ($productoQuery == false) {
                return false;
            }
            
            return true;
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }

    function getProductosTipo($idTipo){
        try{
            $bd = conectarDB();
        
            $productosQuery = $bd->prepare("SELECT * from productos where Tipo_id= :tipo");
            $productosQuery->bindParam(':tipo',$idTipo); 

            $productosQuery->execute();
            
            if ($productosQuery == false) {
                return false;
            }
            
            return $productosQuery->fetchAll(PDO::FETCH_ASSOC);
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }
    function getProductosColeccion($idColeccion){
        try{
            $bd = conectarDB();
        
            $productosQuery = $bd->prepare("SELECT * from productos where Coleccion_id= :coleccion");
            $productosQuery->bindParam(':coleccion',$idColeccion); 

            $productosQuery->execute();
            
            if ($productosQuery == false) {
                return false;
            }
            
            return $productosQuery->fetchAll(PDO::FETCH_ASSOC);
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }
    function getProductosStock($stock){
        try{
            $bd = conectarDB();
            if($stock== "En Stock"){
                $productosQuery = $bd->prepare("SELECT * from productos where Stock>=1");
            }elseif($stock== "Sin Stock"){
                $productosQuery = $bd->prepare("SELECT * from productos where Stock=0");
            }
            // $productosQuery = $bd->prepare("SELECT * from productos where Stock='$stock'");
            $productosQuery->execute();
            
            if ($productosQuery == false) {
                return false;
            }
            
            return $productosQuery->fetchAll(PDO::FETCH_ASSOC);
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }

    function getProductosNuevos(){
        try{
            $bd = conectarDB();
        
            $productosQuery = $bd->prepare("SELECT * from productos ORDER BY productos.`Id` DESC");
            $productosQuery->execute();
            
            if ($productosQuery == false) {
                return false;
            }
            
            return $productosQuery->fetchAll(PDO::FETCH_ASSOC);
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }




}
