<?php
    //Libreria para usar una aplicacion de peliculas
    //Funcion para pintar un array de pelicula
    function pintar($peliculas){
        echo("<table class='table' >");
        foreach($peliculas as $pelicula){
            echo("<tr>");
            foreach($peliculas as $value){
                echo("<td>$value</td>");
            }
            echo("</tr>");
        }

        echo("</table>");
    }


    /*Funcion para saber que nota medie tiene las peliculas
    devuelve un  array donde la primera posicion es la nota media
    y la segunda es el total de peliculas*/
    function media($peliculas){
        $numPeliculas = count($peliculas);
        $notas = 0;
        foreach($peliculas as $pelicula){
            $notas += $peliculas["nota"];
        }
        return ([$notas/$numPeliculas,$numPeliculas]);
    }

?>