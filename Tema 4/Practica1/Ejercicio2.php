<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Ejercicio 2 Ismael</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body>
    <div class="contenedor">
        <?php
        session_start();
        //session_destroy();
        echo "<h1 style='text-shadow: 2px 2px #ff0000; color:black '>Ejercicio 2</h1>";

        function leerArchivo($fichero)
        {
            $tareas = array();
            $datos = file_get_contents($fichero);
            $datos = explode("\n", $datos);
            array_pop($datos);

            foreach ($datos as $valor) {
                $tarea = explode(",", $valor);
                $tareas[] = array("id" => $tarea[0], "descripcion" => $tarea[1], "fecha" => $tarea[2], "categoria" => $tarea[3]);
            }

            return $tareas;
        }

        function escribirArchivo($tareas)
        {
            $file = fopen("tasks.txt", "w");
            if (flock($file, LOCK_EX)) {
                foreach ($tareas as $tarea) {
                    fwrite($file, $tarea['id'] . "," . $tarea['descripcion'] . "," . $tarea['fecha'] . "," . $tarea['categoria'] . "\n");
                }
            }
            fflush($file);
            flock($file, LOCK_UN);
            fclose($file);
        }

        function pintar($tareas)
        {
            echo "<table class='table table-hover table-bordered table-striped' style='width: 50%; text-align:center'>";
            echo "<th colspan='4' class='text-center'>Tareas</th>";
            echo ("<tr>");
            echo ("<th>" . 'Descripcion' . "</th>");
            echo ("<th>" . 'Fecha Limite' . "</th>");
            echo ("<th>" . 'Categoria' . "</th>");
            echo ("<th>" . 'Eliminar' . "</th>");
            echo ("/<tr>");
            foreach ($tareas as $tarea) {
                echo "<tr>";
                echo "<td>" . $tarea['descripcion'] . "</td><td>" . $tarea['fecha'] . "</td><td>" . $tarea['categoria'] . "</td>";
                echo "<td><a href='Ejercicio2.php?borrar=" . $tarea['id'] . "'><svg width='2em' height='2em' viewBox='0 0 16 16' class='bi bi-trash-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                <path fill-rule='evenodd' d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z'/>
              </svg></a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }

        function pintarOrdenada($tareas)
        {
            echo "<table class='table table-hover table-bordered table-striped' style='width: 50%; text-align:center'>";
            echo "<th colspan='4' class='text-center'>Tareas Ordenadas</th>";
            echo ("<tr>");
            echo ("<th>" . 'Descripcion' . "</th>");
            echo ("<th>" . 'Fecha Limite' . "</th>");
            echo ("<th>" . 'Categoria' . "</th>");
            echo ("<th>" . 'Eliminar' . "</th>");
            echo ("/<tr>");

            foreach ($tareas as $tarea) {
                if ("<img src='img/red.png' alt='' width='30' height='30'>" == $tarea['categoria']) {
                    echo "<tr>";
                    echo "<td>" . $tarea['descripcion'] . "</td><td>" . $tarea['fecha'] . "</td><td>" . $tarea['categoria'] . "</td>";
                    echo "<td><a href='Ejercicio2.php?borrar=" . $tarea['id'] . "'><svg width='2em' height='2em' viewBox='0 0 16 16' class='bi bi-trash-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                    <path fill-rule='evenodd' d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z'/>
                  </svg></a></td>";
                    echo "</tr>";
                }
            }

            foreach ($tareas as $tarea) {
                if ("<img src='img/yellow.png' alt=''width='30' height='30'>" == $tarea['categoria']) {
                    echo "<tr>";
                    echo "<td>" . $tarea['descripcion'] . "</td><td>" . $tarea['fecha'] . "</td><td>" . $tarea['categoria'] . "</td>";
                    echo "<td><a href='Ejercicio2.php?borrar=" . $tarea['id'] . "'><svg width='2em' height='2em' viewBox='0 0 16 16' class='bi bi-trash-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                    <path fill-rule='evenodd' d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z'/>
                  </svg></a></td>";
                    echo "</tr>";
                }
            }

            foreach ($tareas as $tarea) {
                if ("<img src='img/green.png' alt=''width='30' height='30'>" == $tarea['categoria']) {
                    echo "<tr>";
                    echo "<td>" . $tarea['descripcion'] . "</td><td>" . $tarea['fecha'] . "</td><td>" . $tarea['categoria'] . "</td>";
                    echo "<td><a href='Ejercicio2.php?borrar=" . $tarea['id'] . "'><svg width='2em' height='2em' viewBox='0 0 16 16' class='bi bi-trash-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                    <path fill-rule='evenodd' d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z'/>
                  </svg></a></td>";
                    echo "</tr>";
                }
            }
            echo "</table>";
        }

        function pintarPorFecha($tareas)
        {
            echo "<table class='table table-hover table-bordered table-striped' style='width: 50%; text-align:center'>";
            echo "<th colspan='4' class='text-center'>Tareas Ordenadas</th>";
            echo ("<tr>");
            echo ("<th>" . 'Descripcion' . "</th>");
            echo ("<th>" . 'Fecha Limite' . "</th>");
            echo ("<th>" . 'Categoria' . "</th>");
            echo ("<th>" . 'Eliminar' . "</th>");
            echo ("/<tr>");

            foreach ($tareas as $tarea) {
                if ($_POST['fechaTope'] > $tarea['fecha']) {
                    echo "<tr>";
                    echo "<td>" . $tarea['descripcion'] . "</td><td>" . $tarea['fecha'] . "</td><td>" . $tarea['categoria'] . "</td>";
                    echo "<td><a href='Ejercicio2.php?borrar=" . $tarea['id'] . "'><svg width='2em' height='2em' viewBox='0 0 16 16' class='bi bi-trash-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                    <path fill-rule='evenodd' d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z'/>
                  </svg></a></td>";
                    echo "</tr>";
                }
            }
            echo "</table>";
        }


        $_SESSION['tareas'] = leerArchivo('tasks.txt');
        $cont = 1;
        if ($_POST) {
            if (isset($_POST['añadir'])) {
                if (!in_array($_POST['descripcion'], array_column($_SESSION['tareas'], 'Descripcion'))) {
                    for ($i = 0; $i < count(array_column($_SESSION['tareas'], 'id')); $i++) {
                        $cont++;
                    }
                    file_put_contents("tasks.txt", $cont . "," .  strtolower($_POST['descripcion']) . "," . strtolower($_POST['fecha']) . "," . strtolower($_POST['categorias']) . "\n", FILE_APPEND | LOCK_EX);
                }
            }
            if (isset($_POST['borrar'])) {
                unset($_SESSION['tareas']);
                $_SESSION['tareas'] = array();
                escribirArchivo($_SESSION['tareas']);
            }
        } else {
            if (!isset($_SESSION['tareas'])) {
                $_SESSION['tareas'] = array();
            }
        }

        if (isset($_GET['borrar'])) {
            if (in_array($_GET['borrar'], array_column($_SESSION['tareas'], 'id'))) {
                $posicion = array_search($_GET['borrar'], array_column($_SESSION['tareas'], 'id'));
                unset($_SESSION['tareas'][$posicion]);
                escribirArchivo($_SESSION['tareas']);
            }
        }


        ?>
        <form method='post'>
            <input type="submit" class="btn btn-primary" name="añadir" value="Añadir">
            <input type="submit" class="btn btn-primary" name="borrar" value="Borrar">
            <input type="submit" class="btn btn-primary" name="ordenar" value="Ordenar">
            <a href="#ordenarFechas" class="btn btn-primary" data-toggle="modal"><span>Fecha Limite</span></a>
            <div class="form-group" style="width: 50%;">
                <label for="disabledTextInput">Descripción de la tarea</label>
                <input type="text" id="disabledTextInput" class="form-control" placeholder="Descripción" name="descripcion" required>
                <label for="disabledTextInput">Fecha limite</label>
                <input type="date" id="disabledTextInput" class="form-control" name="fecha">
            </div>
            <label>Prioridad</label>

            <div class="form-check" name="prioridad">
                <input class="form-check-input" type="radio" name="categorias" id="exampleRadios1" value="<img src='img/red.png' alt='' width='30' height='30'>">
                <label class="form-check-label" for="exampleRadios1">1</label><br />
                <input class="form-check-input" type="radio" name="categorias" id="exampleRadios2" value="<img src='img/yellow.png' alt=''width='30' height='30'>">
                <label class="form-check-label" for="exampleRadios2">2</label><br />
                <input class="form-check-input" type="radio" name="categorias" id="exampleRadios3" value="<img src='img/green.png' alt=''width='30' height='30'>">
                <label class="form-check-label" for="exampleRadios3">3</label>
            </div>
        </form>

        <!-- Modal -->
        <div class="modal fade" id="ordenarFechas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method='POST'>
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel">Mostrar Tareas</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h5 class="modal-title">Hasta la fecha que introduzcamos</h5><br />
                                <label for="disabledTextInput">Fecha limite</label>
                                <input type="date" id="disabledTextInput" class="form-control" name="fechaTope">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" name='fechaOrd' class="btn btn-primary" value="Ordenar">
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <?php
        $_SESSION['tareas'] = leerArchivo("tasks.txt");
        if (isset($_POST['ordenar'])) {
            pintarOrdenada($_SESSION['tareas']);
        }elseif (isset($_POST['fechaOrd'])) {
            pintarPorFecha($_SESSION['tareas']);
        } else {
            pintar($_SESSION['tareas']);
        }
        
        ?>
    </div>
</body>

</html>