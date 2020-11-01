<?php
session_start();
include_once("cabecera.php");
//Para cuando le des clic al boton New Game borra la sesion y empieza todo de nuevo
if (isset($_GET['juego'])) {
    if ($_GET['juego'] == 'nuevo') {
        session_destroy();
    }
}
header("location: index.php");
