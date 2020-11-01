<?php
session_start();
include_once("_cabecera.php");



if (isset($_GET['juego'])) {
    if ($_GET['juego'] == 'nuevo') {
        session_destroy();
    }
}


header("location: index.php");
