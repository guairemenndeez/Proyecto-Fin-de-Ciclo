<?php

require_once "../base_de_datos/conexion_base_datos.php";
require_once "../modelo/marca.php";

class Marca_controller{

    function obtenerMarcas(){

        $marca = new Marca();
        $marcas = $marca->getMarcas(); 
        $datosjson = json_encode($marcas);
        return $datosjson; 
        
    }
    function obtenerMarca($id){

        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $marca = new Marca();
            $marcas = $marca->getMarca($id); 
            $datosjson = json_encode($marcas);
            return $datosjson; 
        }
    }
    
    function crearMarca($datos){

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $Marca = new Marca();
            $Marcas = $Marca->createMarca($datos); 
            $datosjson = json_encode($Marcas);
            return $datosjson; 
        }
    }

    function eliminarMarca($id){

        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $marca = new Marca();
            $marcas = $marca->deleteMarca($id); 
            $datosjson = json_encode($marcas);
            return $datosjson; 
        }
    }

    function actualizarMarca($id){

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $marca = new Marca();
            $marcas = $marca->updateMarca($id); 
            $datosjson = json_encode($marcas);
            return $datosjson; 
        }
    }

}
