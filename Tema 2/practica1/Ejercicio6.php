<?php
include_once("cabecera.php");
echo ("<h1 style='text-shadow: 2px 2px #ff0000; color:black '>Ejercicio 6</h1>");

//Crear los num del dni random
$dni = rand(00000000, 99999999);

// Obtiene letra del NIF a partir del DNI 
$valor = (int) ($dni % 23);
$letras = array ("T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E","O");
echo $dni.$letras[$valor];


include_once("pie.php");
?>