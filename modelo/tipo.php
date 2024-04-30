<?php

require_once  "../base_de_datos/conexion_base_datos.php";
// require "../Modelos/Producto.php";

class Tipo{
    private $Id; //INT autoincrement
    private $Nombre; //VARCHAR(50)
    private $Descripcion; //VARCHAR(255)


    function getTipos(){
        try{
            $bd = conectarDB();
        
            $tipoQuery = $bd->prepare("SELECT * from tipo");
            $tipoQuery->execute();
            
            if ($tipoQuery == false) {
                return false;
            }
            
            return $tipoQuery->fetchAll(PDO::FETCH_ASSOC);
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }

     function getTipo($Id){
        try{
            $bd = conectarDB();
        
            $tipoQuery = $bd->prepare("SELECT * FROM tipo WHERE Id =:id");
            $tipoQuery->bindParam(':id',$Id); 

            $tipoQuery->execute();
            
            if ($tipoQuery == false) {
                return false;
            }
            
            return $tipoQuery->fetchAll(PDO::FETCH_ASSOC);
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }
    function createTipo($datos){
        $nombreTipo=$datos['nombre'];
        $descripcionTipo=$datos['descripcion'];
        try{
            $bd = conectarDB();
        
            $tipoQuery = $bd->prepare("INSERT INTO tipo(Nombre, Descripcion)
                                            values(:nombre,:descripcion)");
            $tipoQuery->bindParam(':nombre',$nombreTipo); 
            $tipoQuery->bindParam(':descripcion',$descripcionTipo); 
            $tipoQuery->execute();
            
            if ($tipoQuery == false) {
                return false;
            }
            
            return "TRUE";
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }

    function deleteTipo($Id){
        try{
            $bd = conectarDB();
        
            $tipoQuery = $bd->prepare("DELETE FROM tipo WHERE id =:id");
            $tipoQuery->bindParam(':id',$Id); 
            $tipoQuery->execute();
            
            if ($tipoQuery == false) {
                return false;
            }
            
            return true;
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }

    function updateTipo($datos){
        $Id=$datos["id"];
        $nombreTipo=$datos['nombre'];
        $descripcionTipo=$datos['descripcion'];
        try{
            $bd = conectarDB();
        
            $tipoQuery = $bd->prepare("UPDATE tipo set Nombre= :nombre, Descripcion= :descripcion WHERE id =:id");
            $tipoQuery->bindParam(':nombre', $nombreTipo);
            $tipoQuery->bindParam(':descripcion', $descripcionTipo);
            $tipoQuery->bindParam(':id',$Id); 
            $tipoQuery->execute();
            
            if ($tipoQuery == false) {
                return false;
            }
            
            return "TRUE";
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }


}
