<?php

require_once  "../base_de_datos/conexion_base_datos.php";
// require "../Modelos/Producto.php";

class Marca
{
    private $Id; //INT
    private $Nombre; //VARCHAR
    private $Descripcion; //VARCHAR


    function getMarcas()
    {
        try {
            $bd = conectarDB();

            $marcasQuery = $bd->prepare("SELECT * from marca");
            $marcasQuery->execute();

            if ($marcasQuery == false) {
                return false;
            }

            return $marcasQuery->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }

    function getMarca($Id)
    {
        try {
            $bd = conectarDB();

            $marcasQuery = $bd->prepare("SELECT * FROM marca WHERE Id =:id");
            $marcasQuery->bindParam(':id', $Id);
            $marcasQuery->execute();

            if ($marcasQuery == false) {
                return false;
            }

            return $marcasQuery->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }

    function createMarca($datos)
    {
        $nombreMarca = $datos['nombre'];
        $descripcionMarca = $datos['descripcion'];
        try {
            $bd = conectarDB();

            $marcasQuery = $bd->prepare("INSERT INTO marca(Nombre, Descripcion)
                                            values(:nombre,:descripcion)");
            $marcasQuery->bindParam(':nombre', $nombreMarca);
            $marcasQuery->bindParam(':descripcion', $descripcionMarca);
            $marcasQuery->execute();

            if ($marcasQuery == false) {
                return false;
            }

            return "TRUE";
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }
    function deleteMarca($Id)
    {
        try {
            $bd = conectarDB();

            $marcasQuery = $bd->prepare("DELETE FROM marca WHERE Id = :id");
            $marcasQuery->bindParam(':id', $Id);

            $marcasQuery->execute();

            if ($marcasQuery == false) {
                return false;
            }

            return true;
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }
    function updateMarca($datos)
    {
        try {
            $Id = $datos["Id"];
            $bd = conectarDB();

            $marcasQuery = $bd->prepare("UPDATE marca set Nombre= :nombre, Descripcion= :descripcion WHERE Id =:id");
            $marcasQuery->bindParam(':id', $Id);
            $marcasQuery->bindParam(':nombre', $datos['nombre']);
            $marcasQuery->bindParam(':descripcion', $datos['descripcion']);

            $marcasQuery->execute();

            if ($marcasQuery == false) {
                return false;
            }

            return true;
        } catch (PDOException $e) {
            echo 'Error con la base de datos: ' . $e->getMessage();
        }
    }
}
