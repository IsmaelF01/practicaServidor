<?php


if (isset($_POST['action'])) {

    if ($_POST['action'] == 'accion') {
        porGenero(10759);
    }
    if ($_POST['action'] == 'terror') {
        porGenero(9648);
    }
    if ($_POST['action'] == 'drama') {
        porGenero(18);
    }
    if ($_POST['action'] == 'anime') {
        porGenero(16);
    }
    if ($_POST['action'] == 'comedia') {
        porGenero(35);
    }
}

function porGenero($id)
{
    $json = file_get_contents("https://api.themoviedb.org/3/discover/tv?api_key=85c8b862f042e9f8b3c587d1403e30d9&language=en-US&sort_by=popularity.desc&page=1&timezone=America%2FNew_York&include_null_first_air_dates=false&with_genres=" . $id);
    $pelis = json_decode($json);

    //Pinto 9 porque no quiero mas de 10 ya que mi estilo me gusta asi
    echo "<div style='margin-left: 10%; text-align:center'>";
    for($i = 0; $i < 9; $i++){
        echo "<div style='float:left; width:25%; border: solid #E50914 2px; margin:2%; padding: 10px;'>";
        echo "<h2 style='color: #E50914;'>".$pelis->results[$i]->name."</h2>";
        echo "<img src='https://image.tmdb.org/t/p/w500/".$pelis->results[$i]->poster_path."' width='200px'>";
        //echo "<h4 style='color: #E50914;'>Sinopsis</h4><p style='color: white; padding: 10px'>".$pelis->results[$i]->overview."</p>";
        echo "<h4 style='color: #E50914;'>Puntuación</h4><label style='color: white;'>".$pelis->results[$i]->vote_average." <span style='color: #E50914;'> votos.</span></label>";
        echo "<h4 style='color: #E50914;'>Popular</h4><label style='color: white;'>".$pelis->results[$i]->popularity." <span style='color: #E50914;'> viwer.</span></label>";
        echo "<h4 style='color: #E50914;'>Fecha Salida</h4><label style='color: white;'>".$pelis->results[$i]->first_air_date."</label>";
        echo "</div>";
    }
}
