<?php

require_once "../base_de_datos/conexion_base_datos.php";
require_once "../modelo/coleccion.php";

class Coleccion_controller{

    function obtenerColecciones(){

        $coleccion = new Coleccion();
        $colecciones = $coleccion->getColecciones(); 
        $datosjson = json_encode($colecciones);
        return $datosjson; 
        
    }

    function obtenerColeccion($id){

        $coleccion = new Coleccion();
        $colecciones = $coleccion->getColeccion($id); 
        $datosjson = json_encode($colecciones);
        return $datosjson; 
        
    }

    function CrearColeccion($datos){

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $Coleccion = new Coleccion();
            $colecciones = $Coleccion->createColeccion($datos); 
            $datosjson = json_encode($colecciones);
            return $datosjson; 
        }
    }
    function eliminarColeccion($id){

        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $Coleccion = new Coleccion();
            $Coleccion = $Coleccion->deleteColeccion($id); 
            $datosjson = json_encode($Coleccion);
            return $datosjson; 
        }
    }
    function actualizarColeccion($datos){

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $Coleccion = new Coleccion();
            $Coleccion = $Coleccion->updateColeccion($datos); 
            $datosjson = json_encode($Coleccion);
            return $datosjson; 
        }
    }
}
