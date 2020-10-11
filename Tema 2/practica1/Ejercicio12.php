
<?php
    include_once("cabecera.php");
    echo ("<h1 style='text-shadow: 2px 2px #ff0000; color:black '>Ejercicio 12</h1>");
    

    //Array con 20 palabras del español al ingles
    $diccionario = array("aire"=> "air", "bebe" => "baby", "copiar" => "copy", "disco" => "disc", "ejemplo" => "example",
     "flor" => "flower", "gasolina" => "gasoline", "hoyo" => "hole", "insecto" => "insect", "justicia" => "justice",
     "lago" => "lake", "maquina" => "machine", "noche" => "night", "objeto" => "object", "pagina" => "page",
     "rio" => "river", "segundo" => "second", "tiempo" => "time", "villa" => "village", "zoologico" => "zoo"
    );

    //Formulario para meter la palabra a traducir
    echo "Introduce una palabra que yo te la traduzco";
    echo "<form action='Ejercicio12.php' method='get'>
    <input type='text' id='campo' name='campo'/>
    <input type='submit' value='Enviar'/>
    </form>";
    
    

    //If para determinar si la palabra esta en el array
    $palabra = $_GET["campo"];
    if(isset($diccionario[$palabra])){
        echo "La palabra ".$palabra." esta en mi diccionario<br/><br/>";
        //echo array_search($palabra, $diccionario);
    }else{
        echo "La palabra ".$palabra." no esta en mi diccionario<br/><br/>";
    }

    //for para pintar el array
    foreach($diccionario as $español => $traduccion){
        echo ("$español"." => "."$traduccion <br/>");
    }

    include_once("pie.php");
?>