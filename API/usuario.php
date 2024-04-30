<?php
require_once "../controlador/usuario_controller.php";
require_once "../controlador/validador.php";


if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $funcion = $_REQUEST['funcion'];
    switch ($funcion) {
        case 'index':
            $usuarios=new Usuario_controller();
            $datos = $usuarios->obtenerUsuarios();
            echo $datos;
            break;
        case 'obtenerUsuario':
            $id = $_REQUEST['id'];
            $usuario=new Usuario_controller();
            echo $usuario->obtenerUsuario($id);
            break;
        case 'eliminar':
            $id = $_REQUEST['id'];
            $usuario=new Usuario_controller();
            echo $usuario->eliminarUsuario($id);
            break;
        case 'cerrarsesion':
            $usuario=new Usuario_controller();
            echo $usuario->cerrarSesion();
            break;
            case 'obtenerUsuarioCorreo':
                session_start();
                $correo = $_SESSION['usuario'];
                $usuario=new Usuario_controller();
                echo $usuario->obtenerUsuarioCorreo($correo);
                break;
    }
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
       switch ($_POST['funcion']){
        case 'actualizar':
            $datosintroducir['Id'] = $_POST["Id"];
            $datosintroducir['nombre'] = $_POST["nombre"];
            $datosintroducir['apellidos'] = $_POST["apellidos"];
            $datosintroducir['correo'] = $_POST["email"];
            $datosintroducir['direccion'] = $_POST["direccion"];
            $datosintroducir['telefono'] = $_POST["telefono"];
            $datosintroducir['contraseña'] = $_POST["contraseña"];
            if(validar($datosintroducir)!= false){
                $tipo=new Usuario_controller();
                $datos = $tipo->actualizarUsuario($datosintroducir);
                echo $datos;
            }
            break;
        case 'actualizarUsuario':
            session_start();
            $datosintroducir['Token'] = $_SESSION['token'];
            $datosintroducir['nombre'] = $_POST["nombre"];
            $datosintroducir['apellidos'] = $_POST["apellidos"];
            $datosintroducir['correo'] = $_POST["email"];
            $datosintroducir['direccion'] = $_POST["direccion"];
            $datosintroducir['telefono'] = $_POST["telefono"];
            if(validar($datosintroducir)!= false){
                $tipo=new Usuario_controller();
                $datos = $tipo->actualizarUsuarioComun($datosintroducir);
                echo $datos;
            }
            break;
        case 'login':
            $datosintroducir['correo'] = $_POST["correo"];
            $datosintroducir['contraseña'] = $_POST["contraseña"];
            if(validar($datosintroducir)!= false){
                $tipo=new Usuario_controller();
                $datos = $tipo->inicioSesion($datosintroducir);
                echo $datos;
            }   
            break;
        case 'crear':
            $datosintroducir['nombre'] = $_POST["nombre"];
            $datosintroducir['apellidos'] = $_POST["apellidos"];
            $datosintroducir['correo'] = $_POST["email"];
            $datosintroducir['direccion'] = $_POST["direccion"];
            $datosintroducir['telefono'] = $_POST["telefono"];
            $datosintroducir['contraseña'] = $_POST["contraseña"];
            $datosintroducir['permisos'] = ($_POST["permisos"]== 'admin')? 1 : 0;
            if(validar($datosintroducir)!= false){
                $tipo=new Usuario_controller();
                $datos = $tipo->CrearUsuario($datosintroducir);
                echo $datos;
            }
            break;
       }     
}