<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Ejercicio 5 Ismael</title>
</head>

<body>
    <div class="contenedor">
        <?php
        session_start();
        //session_destroy();
        echo "<h1 style='text-shadow: 2px 2px #ff0000; color:black '>Ejercicio 5</h1>";

        if ($_POST) {
            if (isset($_POST['añadir'])) {
                $_SESSION['tareas'][] = array('Descripcion' => $_POST['descripcion'], 'FechaLimite' => $_POST['fecha'], 'Categoria' => $_POST['categorias']);
                //array_push($_SESSION['tareas'],array('Descripcion' => $_POST['descripcion'], 'FechaLimite' => $_POST['fecha'], 'Categoria' => $_POST['categorias']);
            }
            if (isset($_POST['borrar'])) {
                unset($_SESSION['tareas']);
                $_SESSION['tareas'] = array();
            }
        } else {
            if (!isset($_SESSION['tareas'])) {
                $_SESSION['tareas'] = array();
            }
        }

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
                foreach ($tarea as $value => $val) {

                    echo ("<td>" . $val . "</td>");
                }
                //echo ("<td style='width: 10%'><a href='Ejercicio5.php?accion=img&tarea=".$tareas['Descripcion']."'><img src='img/x.png' alt='' name='img' style='width: 50%; float:right'></a></td>");
                echo ("<td style='width: 10%'><a href='Ejercicio5.php?accion=img'><img src='img/x.png' alt='' name='img' style='width: 50%; float:right'></a></td>");
                echo ("</tr>");
            }
            echo '</table>';
        }

        ?>
        <form method='post'>
            <form method='post' style="margin-left: 30%; margin-top: 1%;">
                <input type="submit" class="btn btn-primary" name="añadir" value="Añadir">
                <input type="submit" class="btn btn-primary" name="borrar" value="Borrar">
                <div class="form-group" style="width: 50%;">
                    <label for="disabledTextInput">Descripción de la tarea</label>
                    <input type="text" id="disabledTextInput" class="form-control" placeholder="Descripción" name="descripcion" required>
                    <label for="disabledTextInput">Fecha limite</label>
                    <input type="date" id="disabledTextInput" class="form-control" name="fecha">
                </div>
                <label>Prioridad</label>

                <div class="form-check" name="prioridad">
                    <input class="form-check-input" type="radio" name="categorias" id="exampleRadios1" value="<img src='img/red.png' alt='' width='50' height='50'>">
                    <label class="form-check-label" for="exampleRadios1">1</label><br />
                    <input class="form-check-input" type="radio" name="categorias" id="exampleRadios2" value="<img src='img/yellow.png' alt=''width='50' height='50'>">
                    <label class="form-check-label" for="exampleRadios2">2</label><br />
                    <input class="form-check-input" type="radio" name="categorias" id="exampleRadios3" value="<img src='img/green.png' alt=''width='50' height='50'>">
                    <label class="form-check-label" for="exampleRadios3">3</label>
                </div>
            </form>
        </form>
        <?php
        pintar($_SESSION['tareas']);
        ?>
    </div>
</body>

</html>