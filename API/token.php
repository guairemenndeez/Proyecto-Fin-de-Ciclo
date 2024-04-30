<?php
require_once "../controlador/Token_controller.php";
require_once "../controlador/validador.php";


if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $funcion = $_REQUEST['funcion'];
    switch ($funcion) {
        case 'index':
            $token=new Token_controller();
            $datos = $token->obtenerTokens();
            echo $datos;
            break;
        case 'obtenerProducto':
            $id = $_REQUEST['id'];
            $token=new Token_controller();
            echo $token->obtenerToken($id);
            break;
        case 'eliminar':
            $id = $_REQUEST['id'];
            $token=new Token_controller();
            echo $token->eliminarToken($id);
            break;
    }
}
// if($_SERVER['REQUEST_METHOD'] === 'POST'){
//     var_dump($_POST);
//     // $funcion = $_POST['funcion'];
//         $datosintroducir['nombre'] = $_POST["nombre"];
//         $datosintroducir['descripcion'] = $_POST["descripcion"];
//         if(validar($datosintroducir)!= false){
//             $token=new Token_controller();
//             $datos = $token->CrearToken($datosintroducir);
//             echo $datos;
//         }
            
// }