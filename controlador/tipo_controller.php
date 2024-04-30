<?php

require_once "../base_de_datos/conexion_base_datos.php";
require_once "../modelo/tipo.php";

class Tipo_controller{

    function obtenerTipos(){

        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $tipo = new Tipo();
            $tipos = $tipo->getTipos(); 
            $datosjson = json_encode($tipos);
            return $datosjson; 
        }

    }
    function obtenerTipo($id){

        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $tipo = new Tipo();
            $tipos = $tipo->getTipo($id); 
            $datosjson = json_encode($tipos);
            return $datosjson; 
        }

    }
    
    function CrearTipo($datos){

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $tipo = new Tipo();
            $tipos = $tipo->createTipo($datos); 
            $datosjson = json_encode($tipos);
            return $datosjson; 
        }

    }

    function eliminarTipo($id){
        
        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $tipo = new Tipo();
            $tipos = $tipo->deleteTipo($id); 
            $datosjson = json_encode($tipos);
            return $datosjson; 
        }

    }
    function actualizarTipo($datos){

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $tipo = new Tipo();
            $tipos = $tipo->updateTipo($datos); 
            $datosjson = json_encode($tipos);
            return $datosjson; 
        }
        
    }

}
