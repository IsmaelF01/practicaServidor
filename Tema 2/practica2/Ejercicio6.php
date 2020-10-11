<?php
    include_once("cabecera.php");
    echo ("<h1 style='text-shadow: 2px 2px #ff0000; color:black '>Ejercicio 6</h1>");
    echo "Introduce un elemento";
    echo "<form action='Ejercicio6.php' method='post'>
    <input type='text' id='campo' name='mensaje'/>
    <input type='text' id='campo' name='clave'/>
    <input type='submit' value='Enviar'/>
    </form>";

    function encriptar($mensaje, $clave){        
        for($i=0; $i<strlen($mensaje); $i++){
            echo chr(ord($mensaje[$i])+$clave);
        }
    }


    function desencriptar($mensaje, $clave){
        for($i=0; $i<strlen($mensaje); $i++){
            echo chr(ord($mensaje[$i])-$clave);
        }
    }

    echo "<h3>".$_POST['mensaje']."</h3>";
    echo "Mensaje encriptado ";
    //strrev para darle la vuelta al texto
    encriptar(strrev($_POST["mensaje"]), $_POST["clave"]);
    echo "<br/>Mensaje desencriptado ";    
    desencriptar(strrev($_POST["mensaje"]), $_POST["clave"]);

    include_once("pie.php");
?>