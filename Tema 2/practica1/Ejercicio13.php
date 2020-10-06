
<?php
    echo ("<h1>Ejercicio 13</h1>");
    
    $cola = array ("1");


    function añadir($cola){
    echo "Introduce un elemento";
    echo "<form action='Ejercicio13.php' method='post'>
    <input type='text' id='campo' name='campo'/>
    <input type='submit' value='Enviar'/>
    </form>";
    $añadir = $_POST['campo'];
    echo $añadir." soy añadir<br/>";


        if(in_array($añadir, $cola)){
            array_unshift($cola,$añadir);
            echo "La palabra ".$añadir." se a añadido<br/>";
        }else{
            array_unshift($cola,$añadir);
            echo "La palabra ".$añadir." ya esta en la cola<br/>";
        }
    }

    function mostar($cola){
        echo "Entro";
        foreach($cola as $value){
            echo "Estoy aqui".$value;
        }
    }
    
    function del(){
        echo "Introduce un elemento";
        echo "<form action='Ejercicio13.php' method='get'>
        <input type='text' id='campo' name='campo'/>
        <input type='submit' value='Enviar'/>
        </form>";
        $del = $_GET["campo"];
        unset($cola[$del]);
    }

    function delAll($cola){
        echo "La cola se ha vaciado entera";
        foreach($cola as $i)
        unset($cola[$i]);
    }

    añadir($cola);
    mostar($cola);
?>