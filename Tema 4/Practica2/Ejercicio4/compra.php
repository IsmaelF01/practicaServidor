<?php
require_once 'vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Carrito de Compra</title>
    <style>
        body {
            background-color: #FCE95F;
        }

        #contenedor {
            background-color: white;
            width: 50%;
            margin: 0 auto;
            margin-top: 8%;
            padding: 2%;
        }

        h1 {
            text-align: center;
            float: left;
            margin-left: 15%;
        }

        #tienda {
            width: 50px;
            margin-bottom: 5%;
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <div id="contenedor">
        <h1>Carrito de la compra</h1>
        <a href="Ejercicio4.php"><img id="tienda" src="img/tienda.png" alt=""></a>
        <?php
        session_start();
        //session_destroy();

        if (isset($_GET['accion'])) {
            foreach ($_SESSION['compra'] as $compra) {

                if (isset($_GET['accion']) == 'menos') {
                    if ($compra['cantidad'] >= 1) {
                        $_SESSION['compra'][] = $compra['cantidad']++;
                    }
                }

                if (isset($_GET['accion']) == 'mas') {
                    if ($compra['cantidad'] >= 1) {
                        $_SESSION['compra'][] = $compra['cantidad']++;
                    }
                }
            }
        }


        function pintar($productos)
        {
            echo '<table class="table table-striped" style="width: 50%; text-align:center; margin: 0 auto">';
            echo ("<tr>");
            echo ("<th>" . 'Titulo' . "</th>");
            echo ("<th>" . 'Precio' . "</th>");
            echo ("<th>" . 'Cantidad' . "</th>");
            echo ("/<tr>");
            foreach ($productos as $producto) {
                echo ("<tr>");
                echo ("<td>" . ucwords($producto['titulo']) . "</td>");
                echo ("<td>" . $producto['precio'] . "</td>");
                echo ("<td><a href='compra.php?accion=menos&id=" . $producto['cantidad'] . "'><img src='img/-.png' alt='' width='20' name='menos'></a> " . $producto['cantidad'] . " <a href='compra.php?accion=mas&id=" . $producto['cantidad'] . "'><img src='img/+.png' alt='' width='20' name='mas' ></a></td>");
                //echo ("<td><a href='compra.php?accion=menos'><img src='img/-.png' alt='' width='20' name='menos'></a> " . $producto['cantidad'] . " <a href='compra.php?accion=mas'><img src='img/+.png' alt='' width='20' name='mas' ></a></td>");
                echo ("</tr>");
            }
            echo '</table>';
        }
        if (isset($_SESSION['compra'])) {
            pintar($_SESSION['compra']);
        }

        try {
            //Estilo
            $content = '
    <style type="text/css">
    <!--
    table,td,th {
        border: solid 1px #00A2FF;
    table
    {
        padding: 0;
        font-size: 12pt;
        text-align: center;
        vertical-align: middle;
        border-collapse: collapse;
    }
    td
    {
        padding: 1mm;
        width: 150px;
    }
    td.right {
        text-align: right;
        padding-right: 30px;
    }

    h1{
        position: absolute;
        top:2%; 
        text-align: center;
        color: #00A2FF;
    }

    h4{
        position: absolute;
        text-align: right;
        margin-right: 5%;
        top: 10%;
        color: #FF5733;
    }

    -->
    </style>    
        ';


            //Tabla
            $content .= '
    <page backcolor="#FFFFFA" backleft="5mm" backright="5mm" backtop="10mm" backbottom="10mm" >
    <img src="./img/logo.webp" style="width: 750px; height: 100px;" alt="logo">
    <h1>Biblioteca Jarapa</h1>
    <h4 class="right">Num Factura: 19861253</h4>
    <table cellspacing="4" style="margin-left: 5%">
    ';

            $content .= '<tr><th>Titulo</th><th>Precio</th><th>Cantidad</th><th>Subtotal</th></tr>';

            $total = 0;
            foreach ($_SESSION['compra'] as $value) {
                $content .= "<tr><td>" . ucwords($value['titulo']) . "</td>
                         <td>" . $value['precio'] . "€</td>
                         <td>" . $value['cantidad'] . "</td>
                         <td>" . ($value['precio'] * $value['cantidad']) . "€</td></tr>";
                $total += ($value['precio'] * $value['cantidad']);
            }

            $content .= "<tr><td>TOTAL</td><td colspan='3' class='right'>" . $total . "€</td></tr>";
            $content .= "<tr><td>TOTAL (con IVA)</td><td colspan='3' class='right'>" . $total * 1.21 . "€</td></tr>";

            $content .= "
    </table>
    </page>
    ";
            $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 0);
            $html2pdf->writeHTML($content);

            file_put_contents("carritoBiblio.pdf", $html2pdf->output('factura.pdf', 'S'));
        } catch (Html2PdfException $e) {
            $html2pdf->clean();

            $formatter = new ExceptionFormatter($e);
            echo $formatter->getHtmlMessage();
        }
        ?>
    </div>
</body>

</html>