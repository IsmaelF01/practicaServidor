<?php
    function crear_cookie($name,$value) {
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


    //Comprobar si hemos pinchado en trekking o en running
    if (isset($_GET['aficiones'])) {
        //Si es running creo la cookie correspondiente
        if ($_GET['aficiones'] == 'running') {
            //Acceso a las cookies
            if (isset($_COOKIE['nike_running'])) { 
                //Después leo el valor de la cookie y separo los gustos por una lado y las visitas por otro    
                $parametros_cookie = explode("#",$_COOKIE['nike_running']);
                $valor = $parametros_cookie[0]."#".($parametros_cookie[1]+1);
                crear_cookie('nike_running',$valor);
            } else {
                //Creo la cookie la primera vez - running#1
                crear_cookie('nike_running',"running#1");
            }
        } elseif ($_GET['aficiones'] == 'trekking') {
            //Acceso a las cookies
            if (isset($_COOKIE['nike_trekking'])) { 
                //Después leo el valor de la cookie y separo los gustos por una lado y las visitas por otro    
                $parametros_cookie = explode("#",$_COOKIE['nike_trekking']);
                $valor = $parametros_cookie[0]."#".($parametros_cookie[1]+1);
                crear_cookie('nike_trekking',$valor);
            } else {
                //Creo la cookie la primera vez - running#1
                crear_cookie('nike_trekking',"trekking#1");
            }            
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
<a href="index.php?aficiones=running">Running</a>
<a href="index.php?aficiones=trekking">Trekking</a>

</body>
</html>




