<?php


function leerXmlConfiguracion($nombre, $esquema) {
    $config = new DOMDocument();
      $config->load($nombre);
      $res = $config->schemaValidate($esquema);
      if ($res === FALSE) {
          throw new InvalidArgumentException("Revise la configuración de su fichero");
      }
      $datos = simplexml_load_file($nombre);
      $ip = $datos->xpath("//ip");
      $puerto = $datos->xpath("//puerto");
      $nombre = $datos->xpath("//nombre");
      $usu = $datos->xpath("//usuario");
      $clave = $datos->xpath("//clave");
  
      //$cadenaConexion = "mysql:dbname=" . $nombre[0] . ";host=" . $ip[0] . ";port=" . $puerto[0]; 
      $cadenaConexion = sprintf("mysql:dbname=%s;host=%s;port=%s", $nombre[0], $ip[0], $puerto[0]);
  
      $resul = [];
      $resul[] = $cadenaConexion;
      $resul[] = $usu[0];
      $resul[] = $clave[0];
      return $resul;
  }
  
  function conectarDB() {
    $res = leerXmlConfiguracion(dirname(__FILE__) . "/configuracion.xml", dirname(__FILE__) . "/configuracion.xsd");
    $bd = new PDO($res[0], $res[1], $res[2]);
    return $bd;
  }