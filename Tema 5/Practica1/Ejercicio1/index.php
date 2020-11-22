<?php
	include_once("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Ejercicio 1 Ismael</title>
</head>

<body>
    <div class="contenedor">
        <?php
        session_start();
        //session_destroy();
        echo "<h1 style='text-shadow: 2px 2px #ff0000; color:black '>Ejercicio 1</h1>";


        if (isset($_GET['accion'])) {
            if ($_GET['accion'] == 'img') {
                foreach ($_SESSION["tareas"] as $key => $tarea) {
                    if ($_GET['tarea'] == $tarea['descripcion']) {
                        unset($_SESSION['tareas'][$key]);
                        $_SESSION['tareas'] = array_values($_SESSION['tareas']);
                    }
                }
            }
        }

        function pintar($tareas)
        {
            echo '<table class="table table-striped" style="width: 50%; text-align:center">';
            echo ("<tr>");
            echo ("<th>" . 'Descripcion' . "</th>");
            echo ("<th>" . 'Fecha Limite' . "</th>");
            echo ("<th>" . 'Categoria' . "</th>");
            echo ("<th>" . 'Eliminar' . "</th>");
            echo ("/<tr>");
            foreach ($tareas as $tarea) {

                echo ("<tr>");
                echo ("<td>" . $tarea['descripcion'] . "</td>");
                echo ("<td>" . $tarea['fecha'] . "</td>");
                echo ("<td><img src='img/" . $tarea['categoria'] . ".png' alt='' name='img' style='width: 30px;'></td>");
                //echo ("<td style='width: 10%'><a href='Ejercicio5.php?accion=img&tarea=".$tareas['Descripcion']."'><img src='img/x.png' alt='' name='img' style='width: 50%; float:right'></a></td>");
                echo ("<td style='width: 10%'><a href='controlador.php?id=".$tarea['id']."'><img src='img/x.png' alt='' name='img' style='width: 50%;'></a></td>");
                echo ("</tr>");
            }
        }

        ?>
        <form method='post' action='controlador.php'>
            <div class="form-group" style="width: 50%;">
                <label for="disabledTextInput">Descripción de la tarea</label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder="Descripción" name="descripcion" required>
                <label for="disabledTextInput">Fecha limite</label>
                <input type="date" id="disabledTextInput" class="form-control" name="fecha">
            </div>
            <label>Prioridad</label>

            <select name="categoria" id="">
                <option value="red">1</option>
                <option value="yellow">2</option>
                <option value="green">3</option>
            </select>
            <input type="submit" class="btn btn-primary" name="añadir" value="Añadir">
            <input type="submit" class="btn btn-primary" name="borrar" value="Borrar">
        </form>
        <?php


        //Mostramos los empleados desde la BD
        $tareas = hacerSelect();
        pintar($tareas);
        ?>
    </div>
</body>

</html>