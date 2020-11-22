<?php
include("lib/lib.php");
session_start();

if (isset($_POST['addlibro'])) {
    $ISBN = filtrado($_POST['ISBN']);
    $titulo = filtrado(ucwords($_POST['titulo']));
    $subtitulo = filtrado(ucwords($_POST['subtitulo']));
    $descripcion = filtrado(ucwords($_POST['descripcion']));
    $autor = filtrado(ucwords($_POST['autor']));
    $editorial = filtrado(ucwords($_POST['editorial']));
    $categoria = filtrado($_POST['categorias']);
    $portada = filtrado($_POST['portada']);
    $totalEjem = filtrado($_POST['totalEjem']);
    $disponiblesEjem = filtrado($_POST['totalEjem']);

    addLibro($ISBN, $titulo, $subtitulo, $descripcion, $autor, $editorial, $categoria, $portada, $totalEjem, $disponiblesEjem);

    header("location: libros.php");
}

if (isset($_GET['borrar'])) {
    delLibro($_GET['borrar']);
    header("location: libros.php");
}

if (isset($_POST['addusuario'])) {
    $dni = filtrado($_POST['dni']);
    $nombre = filtrado(ucwords($_POST['nombre']));
    $apellidos = filtrado(ucwords($_POST['apellidos']));
    $edad = filtrado($_POST['edad']);
    $direccion = filtrado(ucwords($_POST['direccion']));
    $poblacion = filtrado(ucwords($_POST['poblacion']));
    $telefono = filtrado($_POST['telefono']);
    $email = filtrado(strtolower($_POST['email']));

    addUsuario($dni, $nombre, $apellidos, $edad, $direccion, $poblacion, $telefono, $email);

    header("location: usuarios.php");
}

if (isset($_GET['borrarUser'])) {
    delUser($_GET['borrarUser']);
    header("location: usuarios.php");
}

if (isset($_POST['addprestamo'])) {
    $ISBNL = filtrado($_POST['ISBN']);
    $DNIU = filtrado($_POST['DNI']);
    $fechaini = filtrado($_POST['fechaini']);
    $fechafin = filtrado($_POST['fechafin']);
    $estado = filtrado($_POST['estado']);
    //echo $ISBNL. " ". $DNIU. " ". $fechaini. " ". $fechafin. " ". $estado;

    addPrestamo($ISBNL, $DNIU, $fechaini, $fechafin, $estado);

    header("location: prestamos.php");
}

if (isset($_GET['borrarPrestamo'])) {
    delPrestamo($_GET['borrarPrestamo']);
    header("location: prestamos.php");
}

if (isset($_GET['librosCSV'])) {
    librosCSV();
    header("location: libros.php");
}
