<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Ejercicio 2 Ismael</title>
    <style>
        body{
            background-color: black;
        }
    </style>
</head>

<body>
    <div class="contenedor">
        <?php
        session_start();
        echo "<h1 style='text-shadow: 2px 2px yellow; color:purple '>Ejercicio 2</h1>";
        if ($_POST) {

            if (isset($_POST['servidor'])) {
                $_SESSION['servidor']++;
            }
            if (isset($_POST['cliente'])) {
                $_SESSION['cliente']++;
            }
            if (isset($_POST['despliegue'])) {
                $_SESSION['despliegue']++;
            }
            if (isset($_POST['diseño'])) {
                $_SESSION['diseño']++;
            }
            if (isset($_POST['libre'])) {
                $_SESSION['libre']++;
            }
            if (isset($_POST['reset'])) {
                $_SESSION['servidor'] = 0;
                $_SESSION['cliente'] = 0;
                $_SESSION['despliegue'] = 0;
                $_SESSION['diseño'] = 0;
                $_SESSION['libre'] = 0;
            }
        }


        echo '<div class="progress">';
        echo '<div class="progress-bar" role="progressbar" style="width: ' . $_SESSION['servidor'] . '%" aria-valuenow="' . $_SESSION['servidor'] . '" aria-valuemin="0" aria-valuemax="100"></div>';
        echo '<div class="progress-bar bg-success" role="progressbar" style="width: ' . $_SESSION['cliente'] . '%" aria-valuenow="' . $_SESSION['cliente'] . '" aria-valuemin="0" aria-valuemax="100"></div>';
        echo '<div class="progress-bar bg-warning" role="progressbar" style="width: ' . $_SESSION['despliegue'] . '%" aria-valuenow="' . $_SESSION['despliegue'] . '" aria-valuemin="0" aria-valuemax="100"></div>';
        echo '<div class="progress-bar bg-danger" role="progressbar" style="width: ' . $_SESSION['diseño'] . '%" aria-valuenow="' . $_SESSION['diseño'] . '" aria-valuemin="0" aria-valuemax="100"></div>';
        echo '<div class="progress-bar bg-info" role="progressbar" style="width: ' . $_SESSION['libre'] . '%" aria-valuenow="' . $_SESSION['libre'] . '" aria-valuemin="0" aria-valuemax="100"></div>';
        echo '</div>';

        ?>
        <form method='post' style="margin-left: 30%; margin-top: 1%;">
            <input type="submit" class="btn btn-primary" name="servidor" value="Servidor">
            <input type="submit" class="btn btn-primary" name="cliente" value="Cliente">
            <input type="submit" class="btn btn-primary" name="despliegue" value="Despliegue">
            <input type="submit" class="btn btn-primary" name="diseño" value="DiseñoWEB">
            <input type="submit" class="btn btn-primary" name="libre" value="LibreConfiguracion">
            <input type="submit" class="btn btn-primary" name="reset" value="Resetear">
        </form>


    </div>
</body>

</html>