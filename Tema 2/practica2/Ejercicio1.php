
<?php
   echo ("<h1>Ejercicio 1</h1>");
    
   $cadena1 = "Lo que estoy escribiendo es un string";
   $cadena2 = "muuuuuy largo";
   //Concatena cadena1 + cadena2
   $cadena3 = $cadena1." ".$cadena2;
    
  
   //pinta cadena3 para ver como es
   echo $cadena3."<br/>";
   //Muestra la posi de la primera E
   echo "La primera 'e' se encutra en la posicion ". strpos($cadena3, 'e');
   //Muestra la posi de la ultima U
   echo "<br/>La ultima 'u' se encutra en la posicion ". strrpos($cadena3, 'u');

?>