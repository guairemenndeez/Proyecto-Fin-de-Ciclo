<?php

require_once "../base_de_datos/conexion_base_datos.php";
require_once "../modelo/token.php";

class Token_controller{

    function obtenerTokens(){

        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $token = new Token();
            $tokens = $token->getTokens(); 
            $datosjson = json_encode($tokens);
            return $datosjson; 
        }

    }
    function obtenerToken($id){

        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $token = new Token();
            $tokens = $token->getToken($id); 
            $datosjson = json_encode($tokens);
            return $datosjson; 
        }

    }
    

    function crearToken($datos,$id){

        $Token = new Token();
        $Tokens = $Token->createToken($datos,$id); 
        $datosjson = json_encode($Tokens);
        return $datosjson; 
        
    }
    function eliminarToken($id){

        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $token = new Token();
            $tokens = $token->deleteToken($id); 
            $datosjson = json_encode($tokens);
            return $datosjson; 
        }

    }

    function actualizarToken($datos,$id){

        $Token = new Token();
        $Tokens = $Token->updateToken($datos,$id); 
        $datosjson = json_encode($Tokens);
        return $datosjson; 
    
    }

    function caducidadToken($tokennum){

        $token = new Token();
        $tokens = $token->getTokenCaducidad($tokennum); 
        return $tokens[0]["Fecha_expiracion"]; 
        
    }
    function obtenerTokenNumero($tokennum){ //Obtenemos los datos del token mediantes el token

        $token = new Token();
        $tokens = $token->getTokenperToken($tokennum); 
        return $tokens; 
        
    }

}
