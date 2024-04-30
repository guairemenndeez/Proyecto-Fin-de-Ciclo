<?php

require_once  "../base_de_datos/conexion_base_datos.php";
// require "../Modelos/Producto.php";

class Coleccion
{
    //Porpiedades de la clase Coleccion.
    private $Id; // INT AUTOINCREMENT
    private $Nombre; // VARCHAR
    private $Descripcion; //VARCHAR
    private $Marca_Id; //INT

    function getColecciones()
    {
        try {
            $bd = conectarDB();

            $coleccionQuery = $bd->prepare("SELECT * from coleccion");
            $coleccionQuery->execute();

            if ($coleccionQuery == false) {
                return false;
            }

            return $coleccionQuery->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }

    function getColeccion($Id)
    {
        try {
            $bd = conectarDB();

            $coleccionQuery = $bd->prepare("SELECT * FROM coleccion WHERE Id =:id");
            $coleccionQuery->bindParam(':id', $Id);
            $coleccionQuery->execute();

            if ($coleccionQuery == false) {
                return false;
            }

            return $coleccionQuery->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }
    function createColeccion($datos)
    {

        $nombreColeccion = $datos['nombre'];
        $descripcionColeccion = $datos['descripcion'];
        $marcaColeccion = $datos['marca'];

        try {
            $bd = conectarDB();

            $coleccionQuery = $bd->prepare("INSERT INTO coleccion(Nombre, Descripcion, Marca_id)
                                            values(:nombre,:descripcion,:marca)");
            $coleccionQuery->bindParam(':nombre', $nombreColeccion);
            $coleccionQuery->bindParam(':descripcion', $descripcionColeccion);
            $coleccionQuery->bindParam(':marca', $marcaColeccion);
            $coleccionQuery->execute();

            if ($coleccionQuery == false) {
                return false;
            }

            return "TRUE";
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }
    function deleteColeccion($Id)
    {
        try {
            $bd = conectarDB();

            $coleccionQuery = $bd->prepare("DELETE FROM coleccion WHERE id =:id");
            $coleccionQuery->bindParam(':id', $Id);
            $coleccionQuery->execute();

            if ($coleccionQuery == false) {
                return false;
            }

            return true;
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }

    function updateColeccion($datos)
    {
        try {
            $Id = $datos["Id"];
            $bd = conectarDB();

            $coleccionQuery = $bd->prepare("UPDATE coleccion set Nombre= :nombre, Descripcion= :descripcion, Marca_ID= :marca   WHERE id =:id");
            $coleccionQuery->bindParam(':nombre', $datos['nombre']);
            $coleccionQuery->bindParam(':descripcion', $datos['descripcion']);
            $coleccionQuery->bindParam(':marca', $datos['marca']);
            $coleccionQuery->bindParam(':id', $Id);
            $coleccionQuery->execute();

            if ($coleccionQuery == false) {
                return false;
            }

            return true;
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }
}
