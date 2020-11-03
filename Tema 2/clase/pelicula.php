<?php
    //Librerias de peliculas

    //Cabecera HTML
    include_once("cabecera.php");
    //Libreria con finciones sobre peliculas
    include("libreria.php");

    $peliculas = array(
        array("titulo" => "Reservoir Dogs", "Director" => "Tarantino", "Nota" => 8),
        array("titulo" => "Ciudadano", "Director" => "Wells", "Nota" => 9),
        array("titulo" => "Apocalipse", "Director" => "Coppola", "Nota" => 8),
    );

    pintar($peliculas);
    $resultado = nota_media($peliculas);
    echo("<h1>Hay ".$resultado[1]." peliculas y la media es ".$resultado[0]."</h1>");


    //Incluimos el pie de HTML
    include_once("pie.php")
?>