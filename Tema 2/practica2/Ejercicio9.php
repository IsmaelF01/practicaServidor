<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Ejercicio 9</title>
</head>
<body>
<?php
    
    echo ("<h1 style='text-shadow: 2px 2px #ff0000; color:black '>Ejercicio 9</h1>");


    //array con los 3 productos
    $instagram = array( 
        array("nombre" => "Bnet", "ubicacion" => "Londres", "foto" => "img/londres.jpg", "megustas" => 684, "comentarios" => " Esta semana en #CabroSolidario nos gustaría presentaros a una pequeña guerrera muy especial."), 
        array("nombre" => "Gazir", "ubicacion" => "Madrid", "foto" => "img/madrid.jpg", "megustas" => 10.683, "comentarios" => "Dos hermanas pa dos hermanos oyeesssss oiganmeeeeeee papisss"), 
        array("nombre" => "SweetPain", "ubicacion" => "Tokyo", "foto" => "img/tokyo.jpg", "megustas" => 405.360, "comentarios" => "ESCUCHA TU MÚSICA FAVORITA CON LA MEJOR CALIDAD DEL MERCADO"), 
        array("nombre" => "Zasko", "ubicacion" => "Paris", "foto" => "img/paris.jpg", "megustas" => 174, "comentarios" => "Cuando te llevas mejor con cualquier animal que con la gente"), 
        array("nombre" => "Errece", "ubicacion" => "Roma", "foto" => "img/roma.jpg", "megustas" => 272, "comentarios" => "Esulta ser que era un seguidor de él, solamente que tenía vergüenza de saludarlo"), 
        array("nombre" => "Jado", "ubicacion" => "Buenos Aires", "foto" => "img/buenosaires.jpg", "megustas" => 140.097 , "comentarios" => "A few pictures of my recent builds. Which one do you like most?"), 
        array("nombre" => "Verse", "ubicacion" => "New York", "foto" => "img/newyork.jpg", "megustas" => 268, "comentarios" => "Showing us what it's like to ride average trails as an above average rider")
    );
    
    function pintar(){
        global $instagram;
        echo '<div class="row align-items-center">';
        foreach($instagram as $insta){
            echo '<div class="row" style=margin-left:40%  >';
                echo '<div class="col" style=margin-bottom:50px >';
                    echo '<div class="card" style="width: 25rem; height:510px; border: solid  #ddd 1px">';
                        echo '<div class="card-body">';
                            echo '<h6 class="card-title">'.'<strong>'.$insta["nombre"].'</strong>'.' '.$insta["ubicacion"].'</h6>';
                            echo '<img src="'.$insta["foto"].'" class="card-img-top" alt="..." width="200" height="300">';
                            echo '<img src= "img/trans.png" class="card-img-top" alt="..." >';
                            echo '<h6 class="card-title">'.$insta["megustas"]." Me gusta".'</h6>';
                            //echo '<div class="col-20 row-10 text-truncate">';
                            echo '<span class="card-text d-inline-block  style="max-width: 400px; font-size:10px ">'."<strong>".$insta["nombre"]."</strong>"." ".$insta["comentarios"].'</span>';
                            //echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
        echo "</div>";
        echo "<br/>";
    }
    pintar();
    
?>
</body>
</html>

