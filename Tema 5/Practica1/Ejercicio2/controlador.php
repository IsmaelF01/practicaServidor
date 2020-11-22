<?php
include("lib/lib.php");
session_start();
$_SESSION['user'] = userSelect();

if (isset($_POST['login'])) {
    $user = filtrado($_POST['user']);
    $password = filtrado($_POST['password']);
    foreach ($_SESSION['user'] as $value) {
        if ($value['user'] == $user && $value['contra'] == $password) {
            header("location: juegaciam.php");
        } else {
            echo "<script type='text/javascript'>alert('El usuario o gmail no correctos');</script>";
            //header("location: index.php");
        }
    }
}

if (isset($_POST['regis'])) {
    $user = filtrado($_POST['user']);
    $gmail = filtrado($_POST['gmail']);
    $password = filtrado($_POST['password']);
    $repeat = filtrado($_POST['repeat']);
    foreach ($_SESSION['user'] as $value) {
        if ($value['user'] == $user || $value['gmail'] == $gmail) {
            echo "<script type='text/javascript'>alert('El usuario o gmail ya estan logeados');</script>";
            header("location: index.php");
        } else {
            if ($password == $repeat) {
                addUser($user, $gmail, $password);
                header("location: juegaciam.php");
            } else {
                echo " <script type='text/javascript'>alert('Los contraseñas no coinciden');</script>";
                header("location: index.php");
            }
        }
    }
}
