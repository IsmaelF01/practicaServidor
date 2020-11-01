<?php
session_start();
include_once("cabecera.php");

//100 palabras para hacer el juego
$palabras = array(
    "soldado", "ratón", "ingles", "español", "futbol", "navidad", "nuevo", "palabra", "pajaro", "pinguino",
    "coche", "summer", "lista", "puerta", "cuadro", "circulo", "azucar", "flor", "caja", "jefe",
    "pared", "año", "lavandería", "juego", "fecha", "turista", "tostada", "perro", "gato", "monedas",
    "periodico", "niño", "monedero", "alfombra", "mascara", "calle", "cuidado", "adolescente", "pintura", "paraguas",
    "dibujos", "vaso", "libro", "peine", "cuarto", "familia", "abrigo", "revista", "uno", "nivel",
    "cuerpo", "pierna", "pie", "boca", "ojo", "cerebro", "bigote", "oreja", "dedo", "corazon",
    "familia", "amigo", "amiga", "colega", "pareja", "amor", "hijo", "esposa", "conocido", "sobrino",
    "criatura", "espacie", "vida", "ser", "muerte", "reproduccion", "nacimiento", "naturaleza", "campo", "bosque",
    "selva", "desierto", "costa", "playa", "rio", "laguna", "mar", "oceano", "cerro", "luz",
    "naturaleza", "camaleon", "camaron", "caballo", "alimento", "almendra", "judias", "guisantes", "porotos", "zanahoria"
);

if (isset($_SESSION['juego'])) {

    if (isset($_GET['letra'])) {
        //Ponemos la letras en mayusculas
        $letra = strtoupper($_GET['letra']);

        //Recoremos el array en busca de la palabra
        for ($i = 0; $i < strlen($_SESSION['juego']['palabra']); $i++) {
            if ($letra == $_SESSION['juego']['palabra'][$i]) {
                $_SESSION['juego']['descubrir'][$i] = $letra;
            }
        }

        //En el caso de la la letra introducida no este en nuestra palabra
        if (strpos($_SESSION['juego']['palabra'], $letra) === false) {
            //Incrementamos los fallos y almacenamos los elegidos
            if (strpos($_SESSION['juego']['elegidos'], $letra) === false) {
                $_SESSION['juego']['elegidos'] .= $letra;
                $_SESSION['juego']['fallos']++;  
            //Pintar las letras ya introducidas              
            } else {
                echo "<div style='position: absolute; left:25%; top:20%'>
                <h3>Letra '" . $letra . "' ya la has introducido. Introduzca otra letra.</h3>
                </div>";
            }
        }

        //Alert de Ganador y Perdedor 
        if ($_SESSION['juego']['fallos'] == 6) {
            echo '<script type="text/javascript">alert("Game Over");</script>';
            session_destroy();
        } else if ($_SESSION['juego']['palabra'] == $_SESSION['juego']['descubrir'] || $_SESSION['juego']['palabra'] == strtoupper($_GET['letra'])) {
            echo '<script type="text/javascript">alert("You are Winner");</script>';
            session_destroy();
        }
    }

    //Pintamos nuestro ahorcado
    echo "<div class='content-center'>
            <h1 class='text-center' style='margin: 20px 0 -30px 0'>Lejano Oeste, muerte de Billy el niño</h1>
            <img src='img/" . $_SESSION['juego']['fallos'] . ".jpg' style='width: 50%'>
          </div>
          <div class='justify-content-center row p-4'>
            <a href='nuevo_juego.php?juego=nuevo' class='btn btn-warning ml-5 p-2'>New Play</a>
            <h4 style='margin-left: 10px'>" . $_SESSION['juego']['descubrir'] . " </h4>
            <form action='index.php' method='GET' class='row justify-content-center m-0'>
                <input type='text' name='letra' class='form-control col-8'placeholder='Introduce la letra' autofocus>
                <button type='submit' class='btn btn-warning' style='margin-left:10px'>Ok</button>
            </form>
          </div>";
    //print_r($_SESSION['juego']);

    //creamos la session
} else {
    //Sacamos una palabra al azar de nuestro array palabras
    //rand --> para sacar un numero aleatorio
    //flip --> para intercambiar la clave por el valor
    $palabra = strtoupper(array_rand(array_flip($palabras)));
    //creamos una cadena de guiones de longitud de palabra a descubrir
    //str_pad para rellenar un string con logitud determinada
    $descubrir = str_pad("", strlen($palabra), "-");
    //Metemos todo en el array de sesion juego
    $_SESSION['juego'] = array("palabra" => $palabra, "descubrir" => $descubrir, "elegidos" => "", "fallos" => 0);
    //Refrescamos el header
    header("refresh: 0");
}

include_once("pie.php");
