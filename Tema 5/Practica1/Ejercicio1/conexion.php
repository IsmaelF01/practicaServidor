<?php
    //Conexión a BD
    function conectar($basededatos) {
        $MySQL_host = "localhost";
        $MySQL_user = "root";
        $MySQL_password = "";
        try {
		    $dsn = "mysql:host=$MySQL_host;dbname=$basededatos";
            $conexion = new PDO($dsn, $MySQL_user,  $MySQL_password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
		} catch (PDOException $e){
		    echo $e->getMessage();
        }
    }

    function filtrado($datos){
        $datos = trim($datos);
        $datos = stripslashes($datos);
        $datos = filter_var($datos,FILTER_SANITIZE_STRING);  
        return $datos;
    } 

    function hacerSelect() {
        //Resultados por página a mostrar

        try {
            //Establecer conexión
            $conexion = conectar("ejercicio1");
            //Para evitar problemas con caracteres especiales
            $conexion->query("SET NAMES utf8");            
            //Consulta de todos los tareas
            $consulta = "SELECT descripcion, fecha, categoria, id FROM tareas ";
    
            //Preparamos la consulta
            $stmt = $conexion->prepare($consulta);
    
            //Ejecutamos la consulta
            $stmt->execute();
    
            //Devolvemos los resultados
            $tareas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $conexion = null;
        } catch (PDOException $e){
            file_put_contents("bd.log",$e->getMessage(), FILE_APPEND | LOCK_EX);
        }
    
        return $tareas;
    }

    function addTareas($descripcion, $fecha, $categoria) {
        try {
            $conexion = conectar("ejercicio1");
            $conexion->query("SET NAMES utf8");

            $consulta = "INSERT INTO tareas (descripcion, fecha, categoria) VALUES (";
            $consulta .= ":descripcion, :fecha, :categoria)";
            $stmt = $conexion->prepare($consulta);

            $stmt->bindParam(":descripcion", $descripcion);
            $stmt->bindParam(":fecha", $fecha);
            $stmt->bindParam(":categoria", $categoria);

            $stmt->execute();
            $conexion = null;
        } catch (PDOException $e){
            file_put_contents("bd.log",$e->getMessage(), FILE_APPEND | LOCK_EX);
        }
    }

    function delAll() {
        try {
            //Establecer conexión
            $conexion = conectar("ejercicio1");
            //Preparamos la consulta
            $consulta = "DELETE FROM tareas";
            $stmt = $conexion->prepare($consulta);

            $stmt->execute();
            $conexion = null;
        } catch (PDOException $e){
            file_put_contents("bd.log",$e->getMessage(), FILE_APPEND | LOCK_EX);
        }

    }

    function delId($id){
        try {
            //Establecer conexión
            $conexion = conectar("ejercicio1");
            $conexion->query("SET NAMES utf8");
            //Preparamos la consulta
            $consulta = "DELETE FROM tareas WHERE id = :id";
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            $conexion = null;
        } catch (PDOException $e){
            file_put_contents("bd.log",$e->getMessage(), FILE_APPEND | LOCK_EX);
        }
    }
    

?>