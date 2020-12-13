<?php

namespace BlackJack;

session_start();

include_once("../controller/autoload.php");

use BlackJack\Partida;

// $partida = new Partida();
// $_SESSION['partida'] = serialize($partida);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black Jack</title>
    <style>
        button {
            background-color: transparent;
            border: transparent;
        }
    </style>
</head>

<body style='background:url("img/fondo.jpg");'>
<!-- <body> -->
    <a href="inicio.php"><img src="img/titulo3.png" alt="" width="25%" style="margin:0 0 0 37%"></a>
    <img src="img/tablero4.png" alt="" width="65%" style="margin-left: 17%;">
    <section id="contenedor">
        <section id="cuprier"></section>
        <section id="jugador"></section>

        <section id="botones" style="position: absolute; top:40%; left: 15%">
            <button id="start"><img src="img/start.png" alt="" width="15%"></button>
        </section>
        <section id="botones" style="position: absolute; top:68%; left: 50%">
            <button id="pedirC"><img src="img/addCarta.png" alt="" width="70%"></button>
        </section>
        
    </section>
    <script>
        document.getElementById("start").addEventListener("click", async function() {
            let formData = new FormData();
            formData.append("action", "empezar");

            let res = await fetch("../controller/controlador.php", {
                method: "POST",
                body: formData,
            });

            let data = await res.text();
            document.getElementById("jugador").innerHTML = data;
        });

        document.getElementById("pedirC").addEventListener("click", async function() {
            let formData = new FormData();
            formData.append("action", "repartirCarta");

            let res = await fetch("../controller/controlador.php", {
                method: "POST",
                body: formData,
            });

            let data = await res.text();
            document.getElementById("jugador").innerHTML = data;
        });
        
    </script>
</body>

</html>