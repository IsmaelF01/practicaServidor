
<?php
   include_once("cabecera.php");
   echo ("<h1 style='text-shadow: 2px 2px #ff0000; color:black '>Ejercicio 1</h1>");
    
   $cadena1 = "Lo que estoy escribiendo es un string";
   $cadena2 = "muuuuuy largo de texto";
   //Concatena cadena1 + cadena2
   $cadena3 = $cadena1." ".$cadena2;
    
  
   //pinta cadena3 para ver como es
   echo $cadena3."<br/>";
   //Muestra la posi de la primera E
   echo "La primera 'e' se encutra en la posicion ". strpos($cadena3, 'e');
   //Muestra la posi de la ultima U
   echo "<br/>La ultima 'u' se encutra en la posicion ". strrpos($cadena3, 'u');
   //Muestra la posi de la palabra texto
   echo "<br/>La palabra 'texto' se encutra en la posicion ". strpos($cadena3, 'texto');

   include_once("pie.php");
?>