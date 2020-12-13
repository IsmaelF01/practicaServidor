<?php
session_start();
// session_destroy();

include_once("autoload.php");

use BlackJack\Partida;

if (isset($_POST['empezar'])) {
    if (isset($_SESSION['partida'])) {
        echo 'hola';
        $partida = unserialize($_SESSION['partida']);

        $partida->empezar();

        $_SESSION['partida'] = serialize($partida);
    } else {
        $partida = new Partida();
        $_SESSION['partida'] = serialize($partida);
    }
}

if (isset($_POST['repartirCarta'])) {
    if (isset($_SESSION['partida'])) {
        $partida = unserialize($_SESSION['partida']);

        $partida->repartir();

        $_SESSION['partida'] = serialize($partida);
    }
}


