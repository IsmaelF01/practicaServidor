
<?php
    include_once("cabecera.php");
    echo ("<h1 style='text-shadow: 2px 2px #ff0000; color:black '>Ejercicio 2</h1>");
    
    //Array de 5 clientes
    $cliente = array ("Amazon", "Facebook", "Microsoft", "Apple","Aliexpress");

    //formulario para meter la opcion
    echo "Introduce una opcion";
    echo "<form action='Ejercicio2.php' method='get'>
    <input type='text' id='campo' name='campo'/>
    <input type='submit' value='Enviar'/>
    </form>";
    
    //funcion de lo que hace cada opcion
    function convierteCliente($nombres, $opcion){
        switch(strtoupper($opcion)){
            case 'L':
                //Pone las palabra en miniscula
                foreach($nombres as $nombre){
                        echo strtolower($nombre)." ";             
                }
            break;
            case 'U':
                //Pone las palabra en mayuscula
                foreach($nombres as $nombre){
                        echo strtoupper($nombre)." ";
                }
            break;
            case 'M':
                //Pone la primera letra en mayuscula
                foreach($nombres as $nombre){
                        echo ucwords($nombre)." ";
                }
            break;
            default:
                echo "Ninguna de las opcion prueba otra vez";
        }
    }

    convierteCliente($cliente, $_GET["campo"]);

    include_once("pie.php");
?>