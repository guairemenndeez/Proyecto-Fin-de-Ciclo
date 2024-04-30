<?php

require_once  "../base_de_datos/conexion_base_datos.php";
// require "../Modelos/Producto.php";

class Token{
    private $Id; //ITN
    private $Id_Usuario; //INT
    private $Token_Num; //VARCHAR(40)
    private $Fecha_Creacion; //DATE
    private $Fecha_expiracion; //DATE


    function getTokens(){
        try{
            $bd = conectarDB();
        
            $tokenQuery = $bd->prepare("SELECT * from token");
            $tokenQuery->execute();
            
            if ($tokenQuery == false) {
                return false;
            }
            
            return $tokenQuery->fetchAll(PDO::FETCH_ASSOC);
        
        }catch(PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }

     function getToken($Id){
        try{
            $bd = conectarDB();
        
            $tokenQuery = $bd->prepare("SELECT * FROM token WHERE id =:id");
            $tokenQuery->bindParam(':id',$Id);
            $tokenQuery->execute();
            
            if ($tokenQuery == false) {
                return false;
            }
            
            return $tokenQuery->fetchAll(PDO::FETCH_ASSOC);
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }
     
    function createToken($datos,$id){
        //$generador= bin2hex(openssl_random_pseudo_bytes(8));
        $tokenUsuario= hash("md2",$datos);
        
        $bd = conectarDB();
        $tokenQuery = $bd->prepare("UPDATE usuario SET Token=:tokenUsuario WHERE Id = :id");
        $tokenQuery->bindParam(':tokenUsuario',$tokenUsuario);
        $tokenQuery->bindParam(':id',$id);

            $tokenQuery->execute();
            if ($tokenQuery == false) {
                return false;
            }
            $fechaCreacion = date('Y-n-j');
            $fechaExpiracion = date('Y-n-j',strtotime('+2 week'));

        $tokenQuery = $bd->prepare("INSERT INTO token(Id_Usuario, Token_Num, Fecha_Creacion, Fecha_expiracion)
                                    Values (:id,:numeroToken,:fechaCreacion,:fechaExpiracion)");
        $tokenQuery->bindParam(':id',$id);
        $tokenQuery->bindParam(':numeroToken',$tokenUsuario);
        $tokenQuery->bindParam(':fechaCreacion',$fechaCreacion);
        $tokenQuery->bindParam(':fechaExpiracion',$fechaExpiracion);
        $tokenQuery->execute();


        return true;
    }
    function deleteToken($id){
        try{
            $bd = conectarDB();
        
            $tokenQuery = $bd->prepare("DELETE FROM token WHERE Id =:id");
            $tokenQuery->bindParam(':id',$id);

            $tokenQuery->execute();
            
            if ($tokenQuery == false) {
                return false;
            }
            
            return true;
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }
    function updateToken($datos,$idUsuario){

        $tokenUsuario= hash("md2",$datos);
        $fechaCreacion = date('Y-n-j');
        $fechaExpiracion = date('Y-n-j',strtotime('+2 week'));

        $bd = conectarDB();

        $tokenQuery = $bd->prepare("DELETE FROM token WHERE Id_Usuario =$idUsuario");
        $tokenQuery->bindParam(':id',$idUsuario);
        $tokenQuery->execute();


        $tokenQuery = $bd->prepare("INSERT INTO token(Id_Usuario, Token_Num, Fecha_Creacion, Fecha_expiracion)
                                    Values (:id,:numeroToken, :fechaCreacion, :fechaExpiracion)");
        $tokenQuery->bindParam(':id',$idUsuario);
        $tokenQuery->bindParam(':numeroToken',$tokenUsuario);
        $tokenQuery->bindParam(':fechaCreacion',$fechaCreacion);
        $tokenQuery->bindParam(':fechaExpiracion',$fechaExpiracion);

            $tokenQuery->execute();
            if ($tokenQuery == false) {
                return false;
            }
            $usuarioQuery = $bd->prepare("UPDATE usuario SET Token=:tokenUsuario WHERE Id = :id");
            $tokenQuery->bindParam(':tokenUsuario',$tokenUsuario);
            $tokenQuery->bindParam(':id',$idUsuario);

            $usuarioQuery->execute();
        return $tokenUsuario;
    }
    function getTokenCaducidad($token){
        try{
            $bd = conectarDB();
        
            $tokenQuery = $bd->prepare("SELECT Fecha_expiracion FROM token WHERE Token_Num = :token");
            $tokenQuery->bindParam(':token',$token);
            $tokenQuery->execute();
            
            if ($tokenQuery == false) {
                return false;
            }
            
            return $tokenQuery->fetchAll(PDO::FETCH_ASSOC);
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }


    function getTokenperToken($token){
        try{
            $bd = conectarDB();
        
            $tokenQuery = $bd->prepare("SELECT * FROM token WHERE Token_Num = :token");
            $tokenQuery->bindParam(':token',$token);
            $tokenQuery->execute();
            
            if ($tokenQuery == false) {
                return false;
            }
            
            return $tokenQuery->fetchAll(PDO::FETCH_ASSOC);
        
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }


}
