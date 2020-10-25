<?php
function crear_cookie($name, $value)
{
    //Antes de la cookies no puede venir ni echo ni print, se modifica la cabecera http      
    $nombre = $name;
    $valor = $value;
    // El tiempo de expiración es de 1 minuto. PHP traduce la fecha al formato adecuado
    $expiracion = time() + 60 * 10;
    // Ruta y dominio
    $ruta = '/';
    $dominio = "localhost";
    // Sólo envía la cookie con conexión HTTPs
    $seguridad = false;
    // Cookie disponible sólo para el protocolo HTTP
    $solohttp = true;
    setcookie($nombre, $valor, $expiracion, $ruta, $dominio, $seguridad, $solohttp);
    echo "Cookie establecida $valor";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Ejercicio 4 Ismael</title>
</head>

<body>
    <div class="contenedor">
        <img src="" alt="">
        <?php
        echo "<h1 style='text-shadow: 2px 2px #ff0000; color:black '>Ejercicio 4</h1>";

        if ($_POST) {
            $imagen = $_POST['categorias'];
            echo '<br/><img src="img/' . $imagen . '.jpg" alt="" width="200" height="200" style="position:absolute; left:20%; top:20%">';
        }

        ?>

        <form method='post'>

            <div class="form-check">
                <h2>Deportes</h2>
                <input class="form-check-input" type="radio" name="categorias" id="exampleRadios1" value="baloncesto">
                <label class="form-check-label" for="exampleRadios1">Baloncesto</label><br/>
                <input class="form-check-input" type="radio" name="categorias" id="exampleRadios2" value="tenis">
                <label class="form-check-label" for="exampleRadios2">Tenis</label><br/>
                <input class="form-check-input" type="radio" name="categorias" id="exampleRadios3" value="futbol">
                <label class="form-check-label" for="exampleRadios3">Futbol</label><br/>
                <h2>Musica</h2>
                <input class="form-check-input" type="radio" name="categorias" id="exampleRadios1" value="trap">
                <label class="form-check-label" for="exampleRadios1">Trap</label><br/>
                <input class="form-check-input" type="radio" name="categorias" id="exampleRadios2" value="rock">
                <label class="form-check-label" for="exampleRadios2">Rock</label><br/>
                <input class="form-check-input" type="radio" name="categorias" id="exampleRadios3" value="hiphop">
                <label class="form-check-label" for="exampleRadios3">Hiphop</label><br/>
                <h2>Juegos</h2>
                <input class="form-check-input" type="radio" name="categorias" id="exampleRadios1" value="csgo">
                <label class="form-check-label" for="exampleRadios1">Counter Srike GO</label><br/>
                <input class="form-check-input" type="radio" name="categorias" id="exampleRadios2" value="fortnite">
                <label class="form-check-label" for="exampleRadios2">Fortnite</label><br/>
                <input class="form-check-input" type="radio" name="categorias" id="exampleRadios3" value="valorant">
                <label class="form-check-label" for="exampleRadios3">Valorant</label><br/>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top: 1%;">Enviar</button>
        </form>
    </div>
</body>

</html>