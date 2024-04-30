<?php

function validar($objeto){

    foreach($objeto as $clave => $propiedad){
        switch($clave){
            case "correo":
                validarcorreo($propiedad);
                break;
            case "telefono":
                validartelefono($propiedad);
                break;
            case "token":
                validartoken($propiedad);
                break;
            case "tarjetaCredito":
                validarTarjetaCredito($propiedad);
                break;
            case "imagen":
                validarImagen($propiedad);
                break;
            default:
            if(!isset($propiedad)){
                return false; 
            }

        }

    }
    return true;
}


function validarcorreo($correo){

    if(filter_var($correo, FILTER_VALIDATE_EMAIL)== false){
        return false;
    };

}

function validartelefono($telefono){

    $regexTlf = "/(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){9}/";
    if(preg_match($regexTlf, $telefono)== false){
        return false;
    };

}
function validartoken($token){

    $regextelefono = "/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/";
    if(preg_match($regextelefono, $token)== false){
        return false;
    };

}
function validarTarjetaCredito($TarjCredito){
    
    $regexTarjCredito = "/^(?:4\d([\- ])?\d{6}\1\d{5}|(?:4\d{3}|5[1-5]\d{2}|6011)([\- ])?\d{4}\2\d{4}\2\d{4})$/";
    if(preg_match($regexTarjCredito, $TarjCredito)== false){
        return false;
    };

}
function validarImagen($imagen){
    
    if(!isset($imagen) || empty($imagen['name'])){throw new Exception( "Es necesario disponer de una foto del usuario en el sistema");}

}

