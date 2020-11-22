<?php
$result;

//Conexión a BD
function conectar($basededatos)
{
    $MySQL_host = "localhost";
    $MySQL_user = "root";
    $MySQL_password = "";
    try {
        $dsn = "mysql:host=$MySQL_host;dbname=$basededatos";
        $conexion = new PDO($dsn, $MySQL_user,  $MySQL_password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function filtrado($datos)
{
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = filter_var($datos, FILTER_SANITIZE_STRING);
    return $datos;
}

function librosSelect()
{
    try {
        $conexion = conectar("ejercicio3");
        $conexion->query("SET NAMES utf8");
        $consulta = "SELECT ISBN, titulo, subtitulo, descripcion, autor, editorial, categoria, portada, totalEjem, disponiblesEjem FROM libros ";
        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $conexion = null;
    } catch (PDOException $e) {
        file_put_contents("bd.log", $e->getMessage(), FILE_APPEND | LOCK_EX);
    }
    return $libros;
}
function prestamosSelect()
{
    try {
        $conexion = conectar("ejercicio3");
        $conexion->query("SET NAMES utf8");
        $consulta = "SELECT ISBN, DNI, fechaini, fechafin, estado FROM prestamos ";
        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $prestamos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $conexion = null;
    } catch (PDOException $e) {
        file_put_contents("bd.log", $e->getMessage(), FILE_APPEND | LOCK_EX);
    }
    return $prestamos;
}

function usuarioSelect()
{
    try {
        $conexion = conectar("ejercicio3");
        $conexion->query("SET NAMES utf8");
        $consulta = "SELECT dni, nombre, apellidos, edad, direccion, poblacion, telefono, email FROM usuarios ";
        $stmt = $conexion->prepare($consulta);
        $stmt->execute();
        $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $conexion = null;
    } catch (PDOException $e) {
        file_put_contents("bd.log", $e->getMessage(), FILE_APPEND | LOCK_EX);
    }
    return $usuario;
}


function addLibro($ISBN, $titulo, $subtitulo, $descripcion, $autor, $editorial, $categoria, $portada, $totalEjem, $disponiblesEjem)
{
    try {
        $conexion = conectar("ejercicio3");
        $conexion->query("SET NAMES utf8");

        $consulta = "INSERT INTO libros (ISBN, titulo, subtitulo, descripcion, autor, editorial, categoria, portada, totalEjem, disponiblesEjem) VALUES (";
        $consulta .= ":ISBN, :titulo, :subtitulo, :descripcion, :autor, :editorial, :categoria, :portada, :totalEjem, :disponiblesEjem)";
        $stmt = $conexion->prepare($consulta);

        $stmt->bindParam(":ISBN", $ISBN);
        $stmt->bindParam(":titulo", $titulo);
        $stmt->bindParam(":subtitulo", $subtitulo);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":autor", $autor);
        $stmt->bindParam(":editorial", $editorial);
        $stmt->bindParam(":categoria", $categoria);
        $stmt->bindParam(":portada", $portada);
        $stmt->bindParam(":totalEjem", $totalEjem);
        $stmt->bindParam(":disponiblesEjem", $disponiblesEjem);

        $stmt->execute();
        $conexion = null;
    } catch (PDOException $e) {
        file_put_contents("bd.log", $e->getMessage(), FILE_APPEND | LOCK_EX);
    }
}

function addPrestamo($ISBN, $DNI, $fechaini, $fechafin, $estado)
{
    try {
        $conexion = conectar("ejercicio3");
        $conexion->query("SET NAMES utf8");

        $consulta = "INSERT INTO prestamos (ISBN, DNI, fechaini, fechafin, estado) VALUES (";
        $consulta .= ":ISBN, :DNI, :fechaini, :fechafin, :estado)";
        $stmt = $conexion->prepare($consulta);

        $stmt->bindParam(":ISBN", $ISBN);
        $stmt->bindParam(":DNI", $DNI);
        $stmt->bindParam(":fechaini", $fechaini);
        $stmt->bindParam(":fechafin", $fechafin);
        $stmt->bindParam(":estado", $estado);

        $stmt->execute();
        $conexion = null;
    } catch (PDOException $e) {
        file_put_contents("bd.log", $e->getMessage(), FILE_APPEND | LOCK_EX);
    }
}

function addUsuario($dni, $nombre, $apellidos, $edad, $direccion, $poblacion, $telefono, $email)
{
    try {
        $conexion = conectar("ejercicio3");
        $conexion->query("SET NAMES utf8");

        $consulta = "INSERT INTO usuarios (dni, nombre, apellidos, edad, direccion, poblacion, telefono, email) VALUES (";
        $consulta .= ":dni, :nombre, :apellidos, :edad, :direccion, :poblacion, :telefono, :email)";
        $stmt = $conexion->prepare($consulta);

        $stmt->bindParam(":dni", $dni);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":apellidos", $apellidos);
        $stmt->bindParam(":edad", $edad);
        $stmt->bindParam(":direccion", $direccion);
        $stmt->bindParam(":poblacion", $poblacion);
        $stmt->bindParam(":telefono", $telefono);
        $stmt->bindParam(":email", $email);

        $stmt->execute();
        $conexion = null;
    } catch (PDOException $e) {
        file_put_contents("bd.log", $e->getMessage(), FILE_APPEND | LOCK_EX);
    }
}

function delAll()
{
    try {
        //Establecer conexión
        $conexion = conectar("ejercicio3");
        //Preparamos la consulta
        $consulta = "DELETE FROM tareas";
        $stmt = $conexion->prepare($consulta);

        $stmt->execute();
        $conexion = null;
    } catch (PDOException $e) {
        file_put_contents("bd.log", $e->getMessage(), FILE_APPEND | LOCK_EX);
    }
}

function delLibro($ISBN)
{
    try {
        //Establecer conexión
        $conexion = conectar("ejercicio3");
        $conexion->query("SET NAMES utf8");
        //Preparamos la consulta
        $consulta = "DELETE FROM libros WHERE ISBN = :ISBN";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':ISBN', $ISBN);
        $stmt->execute();
        $conexion = null;
    } catch (PDOException $e) {
        file_put_contents("bd.log", $e->getMessage(), FILE_APPEND | LOCK_EX);
    }
}

function delUser($dni)
{
    try {
        //Establecer conexión
        $conexion = conectar("ejercicio3");
        $conexion->query("SET NAMES utf8");
        //Preparamos la consulta
        $consulta = "DELETE FROM usuarios WHERE dni = :dni";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':dni', $dni);
        $stmt->execute();
        $conexion = null;
    } catch (PDOException $e) {
        file_put_contents("bd.log", $e->getMessage(), FILE_APPEND | LOCK_EX);
    }
}

function delPrestamo($ISBN)
{
    try {
        //Establecer conexión
        $conexion = conectar("ejercicio3");
        $conexion->query("SET NAMES utf8");
        //Preparamos la consulta
        $consulta = "DELETE FROM prestamos WHERE ISBN = :ISBN";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':ISBN', $ISBN);
        $stmt->execute();
        $conexion = null;
    } catch (PDOException $e) {
        file_put_contents("bd.log", $e->getMessage(), FILE_APPEND | LOCK_EX);
    }
}

function update($id, $user, $oro, $madera, $comida, $marmol, $cuarteles, $templos, $huertos, $aserraderos, $mercados, $canteras)
{
    try {
        //Establecer conexión
        $conexion = conectar("ejercicio3");
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
    } catch (PDOException $e) {
        file_put_contents("bd.log", $e->getMessage(), FILE_APPEND | LOCK_EX);
    }
}

function librosCSV()
{
    try {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename=libros.csv;');

        $salida = fopen("php://output", "w");
        fputcsv($salida, array("ISBN", "titulo", "subtitulo", "descripcion", "autor", "editorial", "categoria", "portada", "totalEjem", "disponiblesEjem"));

        $librosCSV = conectar("ejercicio3");
        $librosCSV->query("SELECT ISBN, titulo, subtitulo, descripcion, autor, editorial, categoria, portada, totalEjem, disponiblesEjem FROM libros");
        while ($filaR = $librosCSV->fetch_asoc()) {
            fputcsv($salida, array(
                $filaR['ISBN'],
                $filaR['titulo'],
                $filaR['subtitulo'],
                $filaR['descripcion'],
                $filaR['autor'],
                $filaR['editorial'],
                $filaR['categoria'],
                $filaR['portada'],
                $filaR['totalEjem'],
                $filaR['disponiblesEjem']
            ));
        }
    } catch (PDOException $e) {
        file_put_contents("bd.log", $e->getMessage(), FILE_APPEND | LOCK_EX);
    }
}
