
<?php
    echo ("<h1>Ejercicio 3</h1>");
    
   $direccion_ip = "192.168.11.200";
    echo $direccion_ip."<br/>";
    //Coge el string y lo mete en un array quitando los .
   $array_ip = explode(".", $direccion_ip);
   //muesta el array y despues de cada numero un :
   foreach($array_ip as $ip){
       echo $ip.":";
   }
?>