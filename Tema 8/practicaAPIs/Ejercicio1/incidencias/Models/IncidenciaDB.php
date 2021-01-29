<?php
namespace Incidencias;

use Incidencias\Incidencia;
use Incidencias\ConexionDB;
use \PDO;
use \PDOException;

class IncidenciaDB {

    //Inserta incidencia 
    public static function insertInc() {

        try {
            $conexion = ConexionDB::conectar("incidencias");

            //La única forma de leer PUT en PHP
            $put = file_get_contents( 'php://input', 'r' );
            //Enviamos en POSTMAN en body la canción en formato JSON como raw (marcar también JSON al final)
            $put_json = json_decode($put,true);
    
            //Primero sacamos el máximo id
            $inc = $conexion->incidencia->findOne(
                [],
                [
                    'sort' => ['id' => -1],
                ]);
            if (isset($inc['id']))
                $max = $inc['id'] + 1;
            else 
                $max = 1;

            $result = $conexion->incidencia->insertOne([
                'id' => $max,
                'latitud' => $put_json["latitud"],
                'longitud' => $put_json["longitud"],
                'ciudad' => $put_json["ciudad"],
                'direccion' => $put_json["direccion"],
                'etiqueta' => $put_json["etiqueta"],
                'descripcion' => $put_json["descripcion"],
                'id_cliente' => $put_json["id_cliente"]
            ]);

            $result = self::json_message("Created 1 document\n",true,1);
          } catch(Exception $e) {
            $result = self::json_message("Database error",false,2);
          }
          $conexion = null;
          return $result;
    }

    //Ver incidencias
    public static function getIncidencias() {
        try {
            $conexion = ConexionDB::conectar("incidencias");
            $cursor = $conexion->incidencia->find();
            $result = json_encode($cursor->toArray());
        } catch(Exception $e) {
            $result = self::json_message("Database error",false,2);
        }
        $conexion = null;
        return $result;
    }

    //Borrar incidencia
    public static function deleteIncidencia($id) {
        try {
            $conexion = ConexionDB::conectar("incidencias");
            $cursor = $conexion->incidencia->deleteOne(array('id' => intval($id)));  
            
            $result = self::json_message("Deleted ".$cursor->getDeletedCount()." document(s)\n",true,1);        
        } catch(Exception $e) {
            $result = self::json_message("Database error",false,2);
        }
        $conexion = null;
        return $result;
    }

    //Update incidencia
    /*public static function updateIncidencia($estado,$id) {
        $consulta = "UPDATE incidencias SET estado=:estado WHERE id=:id";
        $conexion = ConexionDB::conectar("incidencias");

        try {
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam(":estado",$estado);
            $stmt->bindParam(":id",$id);
            $stmt->execute();            
        } catch (PDOException $e){
		    echo $e->getMessage();
        }  
          
        ConexionDB::desconectar();
    } */



}
