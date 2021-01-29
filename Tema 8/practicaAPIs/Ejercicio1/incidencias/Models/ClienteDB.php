<?php

namespace Incidencias;

use Incidencias\Cliente;
use Incidencias\ConexionDB;
use \PDO;
use \PDOException;

class ClienteDB
{

    //Insertar incidencia
    public static function newCliente()
    {
        try {
            $conexion = ConexionDB::conectar("incidencias");

            //La única forma de leer PUT en PHP
            $put = file_get_contents('php://input', 'r');
            //Enviamos en POSTMAN en body la canción en formato JSON como raw (marcar también JSON al final)
            $put_json = json_decode($put, true);

            //Primero sacamos el máximo id
            $cliente = $conexion->cliente->findOne(
                [],
                [
                    'sort' => ['id' => -1],
                ]
            );
            if (isset($cliente['id']))
                $max = $cliente['id'] + 1;
            else
                $max = 1;

            $result = $conexion->cliente->insertOne([
                'id' => $max,
                'movil' => $put_json["movil"]
            ]);

            $result = self::json_message("Created 1 document\n", true, 1);
        } catch (Exception $e) {
            $result = self::json_message("Database error", false, 2);
        }
        $conexion = null;
        return $result;
    }


    public static function getId($movil)
    {
        try {
            $conexion = ConexionDB::conectar("incidencias");
            $cursor = $conexion->Songs->find(array('movil' => $movil));
            $result = json_encode($cursor->toArray());
        } catch (Exception $e) {
            $result = self::json_message("Database error", false, 2);
        }
        $conexion = null;
        return $result;
    }

    public static function getClientes()
    {
        try {
            $conexion = ConexionDB::conectar("incidencias");
            $cursor = $conexion->cliente->find();
            $result = json_encode($cursor->toArray());
        } catch(Exception $e) {
            $result = self::json_message("Database error",false,2);
        }
        $conexion = null;
        return $result;
    }


    //Borrar cliente
    public static function deleteCliente($id)
    {
        try {
            $conexion = ConexionDB::conectar("incidencias");
            $cursor = $conexion->cliente->deleteOne(array('id' => intval($id)));  
            
            $result = self::json_message("Deleted ".$cursor->getDeletedCount()." document(s)\n",true,1);        
        } catch(Exception $e) {
            $result = self::json_message("Database error",false,2);
        }
        $conexion = null;
        return $result;
    }
}
