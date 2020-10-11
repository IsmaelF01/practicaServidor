
<?php
include_once("cabecera.php");
echo ("<h1 style='text-shadow: 2px 2px #ff0000; color:black '>Ejercicio 13</h1>");

$cola = array();

function add($añadir)
{
    global $cola;
    array_unshift($cola, $añadir);


    /*if(in_array($añadir, $cola)){
            array_unshift($cola,$añadir);
            echo "La palabra ".$añadir." se a añadido<br/>";
        }else{
            array_unshift($cola,$añadir);
            echo "La palabra ".$añadir." ya esta en la cola<br/>";
        }*/
}

function mostar($cola)
{
    foreach ($cola as $value) {
        echo $value;
    }
}

function del($del)
{
    global $cola;
    for ($i = 0; $i < $del; $i++) {
        array_pop($cola);
    }
}

function delAll()
{
    global $cola;
    echo "<br/>La cola se ha vaciado entera";
    foreach ($cola as $key => $valor) {
        unset($cola[$key]);
    }
}
add(1);
add(2);
add(3);
add(4);
add(5);
add(6);
add(7);
add(8);
mostar($cola);
del(1);
echo "</br>";
mostar($cola);
delAll();
echo "</br>";
mostar($cola);

include_once("pie.php");
?>