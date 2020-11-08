<?php
    require_once 'lib/Zebra_Pagination.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Ejercicio 1 Ismael</title>
    <style>
        #derecha {
            width: 20%;
            position: absolute;
            right: 30%;
            top: 5%;
        }
    </style>
</head>

<body>
    <div id="contenedor">
        <?php
        session_start();
        echo "<h1 style='text-shadow: 2px 2px #ff0000; color:black '>Ejercicio 1 Diccionario</h1>";

        function leerArchivo($fichero)
        {
            //Contactos
            $diccionario = array();

            //Leemos la agenda
            $datos = file_get_contents($fichero);

            //Nos creamos una array con cada contacto de la agenda
            $datos = explode("\n", $datos);
            array_pop($datos);

            foreach ($datos as $valor) {
                //En $contacto tenemos en la primera posición el nombre y en la segunda el teléfono
                $dicci = explode(",", $valor);
                $diccionario[] = array("español" => $dicci[0], "ingles" => $dicci[1]);
            }

            return $diccionario;
        }

        function pintarAgenda($diccionario)
        {
            echo "<table class='table table-hover table-bordered table-striped'>";
            echo "<th colspan='3' class='text-center'>Diccionario</th>";
            foreach ($diccionario as $dicci) {
                echo "<tr>";
                echo "<td>" . $dicci['español'] . "</td><td>" . $dicci['ingles'] . "</td>";
                echo "<td><a href='Ejercicio1.php?borrar=" . $dicci['ingles'] . "'><svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-trash-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                <path fill-rule='evenodd' d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z'/>
              </svg></a></td>";
                echo "</tr>";
            }
            echo "</table>";
            $_SESSION['paginacion']->render();
        }

        function escribirArchivo($diccionario)
        {
            //Solo para que sea más eficiente y no abra y cierre el archivo cada vez que escribes
            //file_put_contents("agenda.txt",$valor['nombre']."-".$valor['tlf']."\n",FILE_APPEND|LOCK_EX);
            $file = fopen("diccionario.txt", "w");
            if (flock($file, LOCK_EX)) {
                foreach ($diccionario as $dicci) {
                    fwrite($file, $dicci['español'] . "," . $dicci['ingles'] . "\n");
                }
            }
            fflush($file);
            flock($file, LOCK_UN);
            fclose($file);
        }

        $_SESSION['diccionario'] = leerArchivo("diccionario.txt");

        $palabra = "";
        if ($_POST) {
            //Buscar la traduccion de español a ingles
            if (isset($_POST['buscar'])) {
                if (array_search(strtolower($_POST['buscar']), array_column($_SESSION['diccionario'], 'español')) > 0) {
                    $_SESSION['palabra'] = array_column($_SESSION['diccionario'], 'ingles')[array_search(strtolower($_POST['buscar']), array_column($_SESSION['diccionario'], 'español'))];
                    //echo $word_list_en[array_search($_POST['español'], $word_list_es)];
                } else {
                    $_SESSION['palabra'] = "Palabra no encontrada";
                }
            }

            //Añadir una nueva palabra a nuestro diccionario
            if (isset($_POST['add'])) {                
                if (!in_array($_POST['español'], array_column($_SESSION['diccionario'], 'español'))) {
                    file_put_contents("diccionario.txt", strtolower($_POST['español']) . "," . strtolower($_POST['ingles']) . "\n", FILE_APPEND | LOCK_EX);
                }
            }
        }
        //Borrar una palabra del diccionario
        if (isset($_GET['borrar'])) {
            if (in_array($_GET['borrar'], array_column($_SESSION['diccionario'], 'ingles'))) {
                //Buscamos la posicion del array donde está ese telefono
                $posicion = array_search($_GET['borrar'], array_column($_SESSION['diccionario'], 'ingles'));
                //Eliminamos ese contacto del array
                unset($_SESSION['diccionario'][$posicion]);
                //Escribimos el array entero al archivo, sobrescribiéndolo
                escribirArchivo($_SESSION['diccionario']);
            }
        }

        //____________________________________
        $total_palabras = count(array_column($_SESSION['diccionario'], 'español'));
        $resultado = 20;

        $_SESSION['paginacion'] = new Zebra_Pagination();
        $_SESSION['paginacion']-> records($total_palabras);
        $_SESSION['paginacion']-> records_per_page($resultado);
        //____________________________________

        ?>
        <form method='post'>
            <label for="exampleFormControlSelect1">Tractor de Español a Ingles </label>
            <div class="row" style="width: 50%;">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Introduzca la palabra" name="buscar">
                </div>
                <div class="col">
                    <textarea name="comment" form="usrform" style="height: 37px; width:250px" class='text-center'><?php echo ucwords($_POST['buscar']) . ' -> ' . ucwords($_SESSION['palabra']) ?></textarea>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary" style="margin-top: 1%;">Enviar</button>
                </div>
            </div>
        </form>
        <a href="Ejercicio1.php?accion=add"><button type="button" class="btn btn-primary" style="margin-top: 1%;" name="add">Añadir</button></a>

        <?php
        if (isset($_GET['accion'])) {
            if ($_GET['accion'] == 'add') {
        ?>
                <form method="post" style="margin-top: 1%" ;>
                    <label for="exampleFormControlSelect1">Añadir palabras al diccionario </label>
                    <div class="row" style="width: 50%;">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Introduzca la palabra español" name="español" style="width:250px;">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Introduzca la palabra ingles" name="ingles" style="width:250px;">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary" name="add">Enviar</button>
                        </div>
                    </div>
                </form>
        <?php
            }
        }
        ?>
    </div>
    <div id="derecha">
        <?php
        $_SESSION['diccionario'] = leerArchivo("diccionario.txt");
        pintarAgenda($_SESSION['diccionario']);
        ?>
    </div>
</body>

</html>