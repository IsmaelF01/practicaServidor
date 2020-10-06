
<?php
    echo ("<h1>Ejercicio 2</h1>");
    
    //Array de 5 clientes
    $cliente = array (
        array("Nombre" => "Juan", "Empresa" => "Amazon"),
        array("Nombre" => "Pablo", "Empresa" => "Facebook"),
        array("Nombre" => "Marcos", "Empresa" => "Microsoft"),
        array("Nombre" => "Alberto", "Empresa" => "Apple"),
        array("Nombre" => "Jose", "Empresa" => "Aliexpress")
    );

    //formulario para meter la opcion
    echo "Introduce una opcion";
    echo "<form action='Ejercicio2.php' method='get'>
    <input type='text' id='campo' name='campo'/>
    <input type='submit' value='Enviar'/>
    </form>";
    $opcion = $_GET["campo"];
    
    convierteCliente($cliente, $opcion);

    //funcion de lo que hace cada opcion
    function convierteCliente($nombres, $opcion){
        
        switch(strtoupper($opcion)){
            //Pone las palabra en miniscula
            case 'L':
                foreach($nombres as $nombre){  
                    foreach($nombre as $nom){
                        echo strtolower($nom)." ";
                    }                    
                }
            break;
            case 'U':
                //Pone las palabra en mayuscula
                foreach($nombres as $nombre){
                    foreach($nombre as $nom){
                        echo strtoupper($nom)." ";
                    }
                }
            break;
            case 'M':
                //Pone la primera letra en mayuscula
                foreach($nombres as $nombre){
                    foreach($nombre as $nom){
                        echo ucwords($nom)." ";
                    }
                }
            break;
            default:
                echo "Nunguna de las opcion prueba otra vez";
        }
    }

?>