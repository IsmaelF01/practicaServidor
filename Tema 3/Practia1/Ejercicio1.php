<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Ejercicio 1 Ismael</title>
</head>

<body>
    <div class="contenedor">
        <?php
        echo "<h1 style='text-shadow: 2px 2px #ff0000; color:black '>Ejercicio 1</h1>";

        if ($_POST) {
            $imagen = $_POST['equipo'];
            echo '<br/><img src="img/' . $imagen . '.png" alt="" width="200" height="200">';
        }

        ?>
        <form method='post'>
            <div class="form-group">
                <label for="exampleFormControlSelect1">De que equipo eres: </label>
                <select class="form-control" id="exampleFormControlSelect1" name="equipo">
                    <option>Atletico</option>
                    <option>Barça</option>
                    <option>Real Madrid</option>
                    <option>Sevilla</option>
                    <option>Betis</option>
                    <option>Boca</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</body>

</html>