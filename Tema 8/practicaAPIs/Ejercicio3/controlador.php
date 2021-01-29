<?php


if (isset($_POST['action'])) {

    if ($_POST['action'] == 'morada') {
        foto(40714201355);
    }
    if ($_POST['action'] == 'amarilla') {
        foto(18603845885);
    }
    if ($_POST['action'] == 'roja') {
        foto(21358287293);
    }
    if ($_POST['action'] == 'azul') {
        foto(31129945398);
    }
    if ($_POST['action'] == 'verde') {
        foto(526084455);
    }
    if ($_POST['action'] == 'blanco') {
        foto(41773204621);
    }
}

function foto($foto)
{
    $params = array(
        'api_key'	=> 'f274bd61289fce7e4c724b77a87b1945',
        'method'	=> 'flickr.photos.getInfo',
        'photo_id'	=> $foto,
        'format'	=> 'php_serial',
    );

    $encoded_params = array();    
    foreach ($params as $k => $v){    
        $encoded_params[] = urlencode($k).'='.urlencode($v);
    }        
    #
    # llamar a la API y decodificar la respuesta
    #    
    $url = "https://api.flickr.com/services/rest/?".implode('&', $encoded_params);    
    $rsp = file_get_contents($url);
    $rsp_obj = unserialize($rsp);        
    #
    # ver el título de la foto (o un error si se produjo uno)
    #   
    // print_r($rsp_obj); 
    $result = '';
    if ($rsp_obj['stat'] == 'ok'){    
        $photo_title = $rsp_obj['photo']['title']['_content'];    
        $photo_descr = $rsp_obj['photo']['description']['_content'];    
        $photo_dates = $rsp_obj['photo']['dates']['taken']; 
        echo "<h5 style='margin-top:15px; color:orange'>Titulo</h5> <p>$photo_title</p>";
        echo "<h5 style='color:orange'>Descripcion</h5> <p>$photo_descr</p>";
        echo "<h5 style='color:orange'>Fecha Creacion</h5> <p>$photo_dates</p>";
    }else{    
        echo "¡Error al llamar!";
    }
}

