<?php

require_once  "../base_de_datos/conexion_base_datos.php";


$funcion = $_GET['funcion'];

    // Verificar el valor de $funcion
    if ($funcion == 'cargarTablas') {
       
        echo cargarTablas(); 
    }
function cargarTablas()
{
    try {
        $bd = conectarDB();

        $productosQuery = $bd->prepare("Show Tables");
        $productosQuery->execute();
        
        if ($productosQuery == false) {
            return false;
        }
        //devuelve las tablas en un array asociativo
        return json_encode($productosQuery->fetchAll(PDO::FETCH_COLUMN));

    } catch (PDOException $e) {
        echo 'Error con la base de datos: ' . $e->getMessage();
    }
}
