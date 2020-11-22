<?php
    $result;

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
        try {
            $conexion = conectar("ejercicio2");
            $conexion->query("SET NAMES utf8");       
            $consulta = "SELECT id, user, oro, madera, comida, marmol, cuarteles, templos, huertos, aserraderos, mercados, canteras FROM juegaciam ";
            $stmt = $conexion->prepare($consulta);
            $stmt->execute();
            $juego = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $conexion = null;
        } catch (PDOException $e){
            file_put_contents("bd.log",$e->getMessage(), FILE_APPEND | LOCK_EX);
        }
        return $juego;
    }
    
    function userSelect() {
        try {
            $conexion = conectar("ejercicio2");
            $conexion->query("SET NAMES utf8");       
            $consulta = "SELECT id, user, gmail, contra FROM usuario ";
            $stmt = $conexion->prepare($consulta);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $conexion = null;
        } catch (PDOException $e){
            file_put_contents("bd.log",$e->getMessage(), FILE_APPEND | LOCK_EX);
        }
        return $users;
    }


    function addJuego($user, $oro, $madera, $comida, $marmol, $cuarteles, $templos, $huertos, $aserraderos, $mercados, $canteras) {
        try {
            $conexion = conectar("ejercicio2");
            $conexion->query("SET NAMES utf8");

            $consulta = "INSERT INTO juegaciam (user, oro, madera, comida, marmol, cuarteles, templos, huertos, aserraderos, mercados, canteras) VALUES (";
            $consulta .= ":id, :user, :oro, :madera, :comida, :marmol, :cuarteles, :templos, :huertos, :aserraderos, :mercados, :canteras)";
            $stmt = $conexion->prepare($consulta);

            $stmt->bindParam(":user", $user);
            $stmt->bindParam(":oro", $oro);
            $stmt->bindParam(":madera", $madera);
            $stmt->bindParam(":comida", $comida);
            $stmt->bindParam(":marmol", $marmol);
            $stmt->bindParam(":cuarteles", $cuarteles);
            $stmt->bindParam(":templos", $templos);
            $stmt->bindParam(":huertos", $huertos);
            $stmt->bindParam(":aserraderos", $aserraderos);
            $stmt->bindParam(":mercados", $mercados);
            $stmt->bindParam(":canteras", $canteras);

            $stmt->execute();
            $conexion = null;
        } catch (PDOException $e){
            file_put_contents("bd.log",$e->getMessage(), FILE_APPEND | LOCK_EX);
        }
    }

    function addUser($user, $gmail, $contra) {
        try {
            $conexion = conectar("ejercicio2");
            $conexion->query("SET NAMES utf8");

            $consulta = "INSERT INTO usuario (user, gmail, contra) VALUES (";
            $consulta .= ":user, :gmail, :contra)";
            $stmt = $conexion->prepare($consulta);

            $stmt->bindParam(":user", $user);
            $stmt->bindParam(":gmail", $gmail);
            $stmt->bindParam(":contra", $contra);

            $stmt->execute();
            $conexion = null;
        } catch (PDOException $e){
            file_put_contents("bd.log",$e->getMessage(), FILE_APPEND | LOCK_EX);
        }
    }

    function delAll() {
        try {
            //Establecer conexión
            $conexion = conectar("ejercicio2");
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
            $conexion = conectar("ejercicio2");
            $conexion->query("SET NAMES utf8");
            //Preparamos la consulta
            $consulta = "DELETE FROM juegaciam WHERE id = :id";
            $stmt = $conexion->prepare($consulta);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            $conexion = null;
        } catch (PDOException $e){
            file_put_contents("bd.log",$e->getMessage(), FILE_APPEND | LOCK_EX);
        }
    }
    
    function update($id, $user, $oro, $madera, $comida, $marmol, $cuarteles, $templos, $huertos, $aserraderos, $mercados, $canteras) {
        try {
            //Establecer conexión
            $conexion = conectar("ejercicio2");
            //Para evitar problemas con caracteres especiales
            $conexion->query("SET NAMES utf8");
            //Preparamos la consulta
            $consulta = "UPDATE juegaciam SET user=:user,oro=:oro,madera=:madera,marmol=:marmol,cuarteles=:cuarteles";
            $consulta .= ",templos=:templos,huertos=:huertos,aserraderos=:aserraderos,mercados=:mercados,canteras=:canteras ";
            $consulta .= "WHERE id=:id";
            $stmt = $conexion->prepare($consulta);

            $stmt->bindParam(":user", $user);
            $stmt->bindParam(":oro", $oro);
            $stmt->bindParam(":madera", $madera);
            $stmt->bindParam(":comida", $comida);
            $stmt->bindParam(":marmol", $marmol);
            $stmt->bindParam(":cuarteles", $cuarteles);
            $stmt->bindParam(":templos", $templos);
            $stmt->bindParam(":huertos", $huertos);
            $stmt->bindParam(":aserraderos", $aserraderos);
            $stmt->bindParam(":mercados", $mercados);
            $stmt->bindParam(":canteras", $canteras);
            $stmt->bindParam(':id', $id);

            $stmt->execute();
            $conexion = null;
        } catch (PDOException $e){
            file_put_contents("bd.log",$e->getMessage(), FILE_APPEND | LOCK_EX);
        }
    }  

?>