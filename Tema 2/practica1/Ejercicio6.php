<?php
echo ("<h1>Ejercicio6</h1>");

//Crear los num del dni random
$dni = rand(00000000, 99999999);

// Obtiene letra del NIF a partir del DNI 
$valor = (int) ($dni % 23);
$letras = array ("T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E","O");
echo $dni.$letras[$valor];
?>