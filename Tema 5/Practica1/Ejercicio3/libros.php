<?php
include("cabecera.php");
include("lib/lib.php");
session_start();

function pintarLibros($tienda)
{
    echo '<div class="row align-items-center">';
    foreach ($tienda as $libro) {

        echo '<div class="row" style="margin:3% 0 0 3%">';
        echo '<div class="col">';
        echo '<div class="card" style="width: 13rem; height:450px; border: solid black 1px">';
        echo "<a href='controlador.php?borrar=" . $libro['ISBN'] . "' style='position:absolute; top:1%; right:2%;'><span aria-hidden='true'>&times;</span></a>";
        echo '<div class="card-body">';
        echo '<img src="img/' . $libro["portada"] . '" class="card-img-top" alt="..." width="30" height="200"3>';
        echo '<p class="card-text" style="color:red; position:absolute; top:20px; right:20px; background-color: darkgrey; padding:2px">' . ucwords($libro["categoria"]) . '</p>';
        echo '<hr/>';
        echo '<h5 class="card-title">' . strtoupper($libro["titulo"]) . '</h5>';
        echo '<h6 class="card-title">' . strtoupper($libro["subtitulo"]) . '</h6>';
        echo '<div class="col-20 row-10 text-truncate">';
        echo '<span class="card-text d-inline-block text-truncate  style="max-width: 400px; font-size:10px ">' . ucwords($libro["descripcion"]) . '</span>';
        echo '</div>';
        echo '<p class="card-text" style="color:red; position:absolute; bottom: 15px">' . ucwords($libro["autor"]) . '</p>';
        echo '<p class="card-text" style="color:red; position:absolute; bottom: -5px">' . ucwords($libro["editorial"]) . '</p>';
        echo '<form method="post">';
        echo '<button type="submit" class="btn btn-primary" name="buy" style="position:absolute; bottom: 2%; right: 10%">Prestar</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo "</div>";
    echo "<br/>";
}

function pintarCategorias($tienda, $categoria)
{
    echo '<div class="row align-items-center">';
    foreach ($tienda as $libro) {
        if (strtolower($categoria) == strtolower($libro["categoria"]) || strtolower($categoria) == strtolower($libro["titulo"])) {
            echo '<div class="row" style="margin:3% 0 0 3%">';
            echo '<div class="col">';
            echo '<div class="card" style="width: 13rem; height:450px; border: solid black 1px">';
            echo "<a href='controlador.php?borrar=" . $libro['ISBN'] . "' style='position:absolute; top:1%; right:2%;'><span aria-hidden='true'>&times;</span></a>";
            echo '<div class="card-body">';
            echo '<img src="img/' . $libro["portada"] . '" class="card-img-top" alt="..." width="30" height="200"3>';
            echo '<p class="card-text" style="color:red; position:absolute; top:20px; right:20px; background-color: darkgrey; padding:2px">' . ucwords($libro["categoria"]) . '</p>';
            echo '<hr/>';
            echo '<h5 class="card-title">' . strtoupper($libro["titulo"]) . '</h5>';
            echo '<h6 class="card-title">' . strtoupper($libro["subtitulo"]) . '</h6>';
            echo '<div class="col-20 row-10 text-truncate">';
            echo '<span class="card-text d-inline-block text-truncate  style="max-width: 400px; font-size:10px ">' . ucwords($libro["descripcion"]) . '</span>';
            echo '</div>';
            echo '<p class="card-text" style="color:red; position:absolute; bottom: 15px">' . ucwords($libro["autor"]) . '</p>';
            echo '<p class="card-text" style="color:red; position:absolute; bottom: -5px">' . ucwords($libro["editorial"]) . '</p>';
            echo '<form method="post">';
            echo '<a href="controlador.php?prestar="' . $libro["ISBN"] . '"<button type="submit" class="btn btn-primary" name="buy" style="position:absolute; bottom: 2%; right: 10%">Prestar</button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo "</div>";
        echo "<br/>";
    }
}




?>
<nav>
    <a href="controlador.php" class="menu-item purple" data-toggle="modal" data-target="#addlibro" data-whatever="@getbootstrap"><img src="img/addlibro.png" alt="" width="70px" style="margin-left: 15px; margin-top: 5px"></a>
    <a href="controlador.php?librosCSV" ><img src="img/descargar.png" alt="" width="80px"></a>
    <form action="" method="post" style="float: right; margin-top:1%">
        <div class="form-group row">
            <input type="text" class="form-control col-sm-7 col-form-label" name="buscarlibro">
            <div class="col-sm-2">
                <input type="submit" name="buscar" value="buscar" style="margin-top: 5px;">
            </div>
        </div>
    </form>
</nav>

<div class="modal fade" id="addlibro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method='POST' style="color: black;" action="controlador.php">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Añadir Libro</h4>
                    <!-- <h5 style="color: gray;"><?php//$result?></h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="disabledTextInput">ISBN: </label>
                    <input type="text" class="form-control" name="ISBN">
                    <label for="disabledTextInput">Titulo: </label>
                    <input type="text" class="form-control" name="titulo">
                    <label for="disabledTextInput">Subtitulo: </label>
                    <input type="text" class="form-control" name="subtitulo">
                    <label for="disabledTextInput">Descripcion: </label>
                    <input type="text" class="form-control" name="descripcion">
                    <label for="disabledTextInput">Autor: </label>
                    <input type="text" class="form-control" name="autor">
                    <label for="disabledTextInput">Editorial: </label>
                    <input type="text" class="form-control" name="editorial">
                    <label for="disabledTextInput">Categoria: </label>
                    <select class="custom-select" name="categorias" id="">
                        <option value="novela">Novela</option>
                        <option value="historica">Historica</option>
                        <option value="scifi">Scifi</option>
                        <option value="romantica">Romantica</option>
                        <option value="ensayo">Ensayo</option>
                        <option value="misterio">Misterio</option>
                        <option value="viajes">Viajes</option>
                    </select><br />
                    <label for="disabledTextInput">Portada: </label>
                    <input type="file" class="form-control" name="portada">
                    <label for="disabledTextInput">Total Ejemplares: </label>
                    <input type="file" class="form-control" name="totalEjem">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name='addlibro' class="btn btn-primary" value="Añadir Libro">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$_SESSION['libros'] = librosSelect();
if (isset($_POST['buscar'])) {
    pintarCategorias($_SESSION['libros'], $_POST['buscarlibro']);
} else {
    pintarLibros($_SESSION['libros']);
}
?>