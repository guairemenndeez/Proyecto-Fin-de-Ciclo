<?php
function Comprobarfoto($foto, $idproducto){//Comprobar,Crear y mover Directorio.
        // $directorio = $_SERVER['DOCUMENT_ROOT'] . "../fotos/";
        // if(!file_exists($directorio)){
        //   if(!mkdir($directorio, 0777)){
        //     throw new Exception("Error Directorios: No se puede crear el directorio o ya esta creado");
        //   }
        // }
        // if (!move_uploaded_file($foto["tmp_name"],$directorio.$foto["name"])) {
        //     throw new Exception("Error ficheros: No se puede mover la foto a la nueva ruta");
        // }
        // //Validar formato
        // $formatos_permitidos =  array('jpg','png');
        // $extension = pathinfo($foto["name"], PATHINFO_EXTENSION);
        // if(!in_array($extension, $formatos_permitidos) ) {
        //   throw new Exception('Error formato no permitido !!');
        // }

        Comprobar_directorio();
        return moverdoc($foto,$idproducto);


      }


      function Comprobar_directorio(){ //Comprobar,Crear Directorio.
        $dir=$_SERVER['DOCUMENT_ROOT'] . "/imagenProyecto/";
        if(!file_exists($dir)){
            if(!mkdir($dir, 0777)){throw new Exception("Error Directorio: No se puede crear el directorio txt o ya esta creado");}
        }
    }
    function moverdoc($documento,$id){
      $rutaFinal = $_SERVER['DOCUMENT_ROOT'] . "/imagenProyecto/";
      $nuevoNombreArchivo = $id . '.jpg'; // Nuevo nombre del archivo
      
      $rutaCompleta = $rutaFinal . $nuevoNombreArchivo;
      
      // Mover el archivo a la nueva ubicación
      if (!move_uploaded_file($documento, $rutaCompleta)) {
          throw new Exception("Error fichero: No se pudo mover el documento a la ruta");
      }
      
      return "http://localhost/imagenProyecto/".$nuevoNombreArchivo;
  }
