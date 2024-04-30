<?php

require_once "../base_de_datos/conexion_base_datos.php";
require_once "../modelo/usuario.php";

class Usuario_controller{

    function obtenerUsuarios(){

        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $usuario = new Usuario();
            $usuarios = $usuario->getUsuarios(); 
            $datosjson = json_encode($usuarios);
            return $datosjson; 
        }

    }
    function obtenerUsuario($id){

        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $usuario = new Usuario();
            $usuarios = $usuario->getUsuario($id); 
            $datosjson = json_encode($usuarios);
            return $datosjson; 
        }

    }
   

    function CrearUsuario($datos){

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $Usuario = new Usuario();
            $usuarios = $Usuario->createUsuario($datos); 
            $datosjson = json_encode($usuarios);
            return $datosjson; 
        }

    }
 function eliminarUsuario($id){

        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $usuario = new Usuario();
            $usuarios = $usuario->deleteUsuario($id); 
            $datosjson = json_encode($usuarios);
            return $datosjson; 
        }

    }
    function actualizarUsuario($datos){

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $Usuario = new Usuario();
            $usuarios = $Usuario->updateUsuario($datos); 
            $datosjson = json_encode($usuarios);
            return $datosjson; 
        }

    }
    function inicioSesion($datos){

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $Usuario = new Usuario();
            $usuarios = $Usuario->login($datos);

                $fecha= Date('Y-n-j');
                $fecha= new DateTime($fecha);
                $token= new Token_controller;
                $numeroToken =$usuarios['Token'];
                $caducidadToken= new DateTime($token->caducidadToken($numeroToken));
                while($caducidadToken<$fecha ) {
                    $token->actualizarToken($usuarios['Correo'],$usuarios['Id']);
                };
                session_start();
                $_SESSION['usuario'] = $usuarios['Correo'];
                $_SESSION['permiso'] = $usuarios["Permisos"];
                $_SESSION['token'] = $usuarios["Token"];
                $_SESSION['carrito'];
                return TRUE;

        } 
        return FALSE;

    }
    function cerrarSesion(){
        
        session_start();
        $_SESSION = array();
        session_destroy();
        return TRUE; 
        
    }
    function permiso(){
        
        if($_SESSION['permiso']==1){
            return TRUE;
        }
        return false;
             
    }

    function obtenerUsuarioCorreo($correo){

        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            $usuario = new Usuario();
            $usuarios = $usuario->getUsuarioCorreo($correo); 
            $datosjson = json_encode($usuarios);
            return $datosjson; 
        }

    }

    function actualizarUsuarioComun($datos){

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $Usuario = new Usuario();
            $usuarios = $Usuario->updateUsuarioComun($datos); 
            $datosjson = json_encode($usuarios);
            return $datosjson; 
        }
        
    }

}
