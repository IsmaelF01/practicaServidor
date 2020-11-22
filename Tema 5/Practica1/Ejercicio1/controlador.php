<?php
include("conexion.php");

    if (isset($_POST['añadir'])) {
        $descripcion = filtrado($_POST['descripcion']);
        $fecha = filtrado($_POST['fecha']);
        $categoria = filtrado($_POST['categoria']);
        addTareas($descripcion, $fecha, $categoria);
        header("location: index.php");
    }

    if(isset($_POST['borrar'])){
        delAll();
        header("location: index.php");
    }

    if (isset($_GET['id'])){
        delId($_GET['id']);
        header("location: index.php");
    }

    
?>