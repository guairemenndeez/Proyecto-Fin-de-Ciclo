<?php

require_once  "../base_de_datos/conexion_base_datos.php";
require_once "../controlador/token_controller.php";
// require "../Modelos/Producto.php";

class Usuario{
    private $Id;           //INT(11)
    private $Nombre;       //VARCHAR(20)
    private $Apellidos;    //VARCHAR(255)
    private $Correo;       //VARCHAR (50)
    private $Direccion;    //VARCHAR (255)
    private $Telefono;     //INT(9)
    private $Contraseña;   //VARCHAR(255)
    private $Token;        //VARCHAR(40)
    private $Permisos;     //TINYINT(1)


    function getUsuarios(){
        try{
            $bd = conectarDB();
        
            $usuarioQuery = $bd->prepare("SELECT * from usuario");
            $usuarioQuery->execute();
            
            if ($usuarioQuery == false) {
                return false;
            }
            
            return $usuarioQuery->fetchAll(PDO::FETCH_ASSOC);
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }

     function getUsuario($Id){
        try{
            $bd = conectarDB();
        
            $usuarioQuery = $bd->prepare("SELECT * FROM usuario WHERE Id = :id");
            $usuarioQuery->bindParam(':id',$Id);
            $usuarioQuery->execute();
            
            if ($usuarioQuery == false) {
                return false;
            }
            
            return $usuarioQuery->fetchAll(PDO::FETCH_ASSOC);
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }
     
    function createUsuario($datos){
        $nombreUsuario=$datos['nombre'];
        $apellidosUsuario = $datos["apellidos"];
        $emailUsuario = $datos["correo"];
        $direccionUsuario = $datos["direccion"];
        $telefonoUsuario = $datos["telefono"];
        $contraseñaUsuario =password_hash($datos["contraseña"],PASSWORD_DEFAULT);
        $permisosUsuario = $datos["permisos"];
        $tokenUsuario = "token";
        
        
        try{
            $bd = conectarDB();
            $usuarioQuery = $bd->prepare("INSERT INTO usuario(Nombre, Apellidos, Correo, Direccion, Telefono, Contraseña, Token, Permisos)
            values(:nombre, :apellidos, :correo, :direccion, :telefono, :password, :token, :permisos)");
           
            $usuarioQuery->bindParam(':nombre',$nombreUsuario);
            $usuarioQuery->bindParam(':apellidos',$apellidosUsuario);
            $usuarioQuery->bindParam(':correo',$emailUsuario);
            $usuarioQuery->bindParam(':direccion',$direccionUsuario);
            $usuarioQuery->bindParam(':telefono',$telefonoUsuario);
            $usuarioQuery->bindParam(':password',$contraseñaUsuario);
            $usuarioQuery->bindParam(':token',$tokenUsuario);
            $usuarioQuery->bindParam(':permisos',$permisosUsuario); 
            $usuarioQuery->execute();
            
            if ($usuarioQuery == false) {
                return false;
            }

            $usuarioQuery->fetchAll(PDO::FETCH_ASSOC);
            $usuarioTokenQuery = $bd->prepare("SELECT MAX(Id) AS max_id FROM usuario");
            $usuarioTokenQuery->execute();
            
            if ($usuarioQuery == false) {
                return false;
            }
            
             $id = $usuarioTokenQuery->fetchAll(PDO::FETCH_ASSOC);



            $token= new Token_controller(); 
            $token->CrearToken($emailUsuario,$id[0]["max_id"]); 
            return "TRUE";
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }
    function deleteUsuario($Id){
        try{
            $bd = conectarDB();
        
            $usuarioQuery = $bd->prepare("DELETE FROM usuario WHERE id =:id");
            $usuarioQuery->bindParam(':id',$Id);
            $usuarioQuery->execute();
            
            if ($usuarioQuery == false) {
                return false;
            }
            
            return true;
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }

    function updateUsuario($datos){
        $idUsuario=$datos['Id'];
        $nombreUsuario=$datos['nombre'];
        $apellidosUsuario = $datos["apellidos"];
        $emailUsuario = $datos["correo"];
        $direccionUsuario = $datos["direccion"];
        $telefonoUsuario = $datos["telefono"];
        $contraseñaUsuario = $datos["contraseña"];
        //crear token
        $token= new Token_controller(); 
            $token->actualizarToken($emailUsuario,$idUsuario);
        
        try{
            $bd = conectarDB();
        
            $usuarioQuery = $bd->prepare("UPDATE usuario SET Nombre = :nombre, Apellidos = :apellido, Correo = :correo, Direccion = :direccion, Telefono = :telefono, Contraseña = :password WHERE Id = :id");
            $usuarioQuery->bindParam(':nombre',$nombreUsuario);
            $usuarioQuery->bindParam(':apellido',$apellidosUsuario);
            $usuarioQuery->bindParam(':correo',$emailUsuario);
            $usuarioQuery->bindParam(':direccion',$direccionUsuario);
            $usuarioQuery->bindParam(':telefono',$telefonoUsuario);
            $usuarioQuery->bindParam(':password',$contraseñaUsuario);
            $usuarioQuery->bindParam(':id',$idUsuario);

            $usuarioQuery->execute();
            
            if ($usuarioQuery == false) {
                return false;
            }
            
            return "TRUE";
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }

    function login($dato) {

        $correo = $dato['correo'];
        // $contraseña = $dato['contraseña'];
        $bd = conectarDB();
        $usuarioQuery = $bd->prepare("SELECT Id, Correo, Token, Permisos,Contraseña from usuario where correo = :correo");
        $usuarioQuery->bindParam(':correo', $correo);
        $usuarioQuery->execute();

        if ($usuarioQuery->rowCount() === 1) {
            return $usuarioQuery->fetch();
        } else {
            return FALSE;
        }
    }
    function getUsuarioCorreo($correo){
        try{
            $bd = conectarDB();
        
            $usuarioQuery = $bd->prepare("SELECT * FROM usuario WHERE Correo =:correo");
            $usuarioQuery->bindParam(':correo',$correo);
            $usuarioQuery->execute();
            
            if ($usuarioQuery == false) {
                return false;
            }
            
            return $usuarioQuery->fetchAll(PDO::FETCH_ASSOC);
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }
    function updateUsuarioComun($datos){
        $tokenUsuario=$datos['Token'];
        $nombreUsuario=$datos['nombre'];
        $apellidosUsuario = $datos["apellidos"];
        $emailUsuario = $datos["correo"];
        $direccionUsuario = $datos["direccion"];
        $telefonoUsuario = $datos["telefono"];
        
        try{
            $bd = conectarDB();
        
            $usuarioQuery = $bd->prepare("UPDATE usuario SET Nombre = :nombre, Apellidos = :apellido, Correo = :correo, Direccion = :direccion, Telefono = :telefono WHERE Token = :token");
            $usuarioQuery->bindParam(':nombre',$nombreUsuario);
            $usuarioQuery->bindParam(':apellido',$apellidosUsuario);
            $usuarioQuery->bindParam(':correo',$emailUsuario);
            $usuarioQuery->bindParam(':direccion',$direccionUsuario);
            $usuarioQuery->bindParam(':telefono',$telefonoUsuario);
            $usuarioQuery->bindParam(':token',$tokenUsuario);
            $usuarioQuery->execute();
            
            if ($usuarioQuery == false) {
                return false;
            }
            
            return TRUE;
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }
}
