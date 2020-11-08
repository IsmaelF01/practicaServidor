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
        ?>
    </div>
</body>

</html>