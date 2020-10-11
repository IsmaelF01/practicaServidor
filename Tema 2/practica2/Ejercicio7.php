
<?php
    include_once("cabecera.php");
    echo ("<h1 style='text-shadow: 2px 2px #ff0000; color:black '>Ejercicio 7</h1>");


    //array con los 3 productos
    $carrito = array( 
        array("id" => 1234, "nombre" => "PS4", "precio" => 349.95, "cant" => 2, "iva_r" => 0), 
        array("id" => 1235, "nombre" => "iPhone XS", "precio" => 1249.95, "cant" => 1, "iva_r" => 0), 
        array("id" => 1236, "nombre" => "Chocolate", "precio" => 9.95, "cant" => 5, "iva_r" => 1) 
    );
    
    //funcion para sacar el precio total mas el IVA
    function subtotal($linea_pedido){
        $totalIVA = 0;
        foreach($linea_pedido as $carro){
            if($carro["iva_r"] == 0){
                $totalIVA += $carro["precio"]+($carro["precio"]*0.21);
            }
            else{
                $totalIVA += $carro["precio"]+($carro["precio"]*0.10);
            }
        }
        return $totalIVA;
    }

    //funcion que pinta una tabla con todo el contenido mas precio total y el precio con iva
    function pintar($carrito){
        echo("<br/><table class='table table-striped'>");
        $total = 0;
        foreach($carrito as $compra){
            echo("<tr>");
            $total += $compra["precio"];
            foreach($compra as $value => $val){
                echo("<th>$value</th>");
                echo("<td>$val</td>");
            }
            
            echo("</tr>");
        }
        echo("<tr>");
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo ("<th>Precio Total</th>");
            echo ("<td>".$total."</td>");
            echo ("<th>Precio+IVA</th>");
            echo ("<td>". subtotal($carrito)."</td>");
        echo("</tr>");
        echo("</table>");
    }
    pintar($carrito);

    include_once("pie.php");
?>
