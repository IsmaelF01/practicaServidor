<?php
include("cabecera.php");
include("lib/lib.php");
session_start();

function pintarUsuarios($usuarios)
{
    echo '<table class="table table-striped" style="width: 50%; text-align:center; margin: 0 auto">';
    echo ("<tr>");
    echo ("<th>" . 'DNI' . "</th>");
    echo ("<th>" . 'Nombre' . "</th>");
    echo ("<th>" . 'Apellidos' . "</th>");
    echo ("<th>" . 'Edad' . "</th>");
    echo ("<th>" . 'Direccion' . "</th>");
    echo ("<th>" . 'Poblacion' . "</th>");
    echo ("<th>" . 'Telefono' . "</th>");
    echo ("<th>" . 'Email' . "</th>");
    echo ("<th>" . 'Borrar' . "</th>");
    echo ("<th>" . 'Prestar' . "</th>");
    echo ("/<tr>");
    foreach ($usuarios as $usuario) {
        echo ("<tr>");
        echo ("<td>" . $usuario['dni'] . "</td>");
        echo ("<td>" . $usuario['nombre'] . "</td>");
        echo ("<td>" . $usuario['apellidos'] . "</td>");
        echo ("<td>" . $usuario['edad'] . "</td>");
        echo ("<td>" . $usuario['direccion'] . "</td>");
        echo ("<td>" . $usuario['poblacion'] . "</td>");
        echo ("<td>" . $usuario['telefono'] . "</td>");
        echo ("<td>" . $usuario['email'] . "</td>");
        echo ("<td><a href='controlador.php?borrarUser=" . $usuario['dni'] . "'><img src='img/basura.png' alt='' width='50px'></a></td>");
        echo ("<td><a href='controlador.php?user=" . $usuario['dni'] . "'><img src='img/prestamo.png' alt='' width='50px'></a></td>");
        echo ("</tr>");
    }
    echo '</table>';
}

function pintarBuscador($usuarios, $buscar)
{
    echo '<table class="table table-striped" style="width: 50%; text-align:center; margin: 0 auto">';
    echo ("<tr>");
    echo ("<th>" . 'DNI' . "</th>");
    echo ("<th>" . 'Nombre' . "</th>");
    echo ("<th>" . 'Apellidos' . "</th>");
    echo ("<th>" . 'Edad' . "</th>");
    echo ("<th>" . 'Direccion' . "</th>");
    echo ("<th>" . 'Poblacion' . "</th>");
    echo ("<th>" . 'Telefono' . "</th>");
    echo ("<th>" . 'Email' . "</th>");
    echo ("<th>" . 'Borrar' . "</th>");
    echo ("<th>" . 'Prestar' . "</th>");
    echo ("/<tr>");
    foreach ($usuarios as $usuario) {
        if ($buscar == $usuario['dni'] || $buscar == $usuario['nombre'] || $buscar == $usuario['apellidos']) {
            echo ("<tr>");
            echo ("<td>" . $usuario['dni'] . "</td>");
            echo ("<td>" . $usuario['nombre'] . "</td>");
            echo ("<td>" . $usuario['apellidos'] . "</td>");
            echo ("<td>" . $usuario['edad'] . "</td>");
            echo ("<td>" . $usuario['direccion'] . "</td>");
            echo ("<td>" . $usuario['poblacion'] . "</td>");
            echo ("<td>" . $usuario['telefono'] . "</td>");
            echo ("<td>" . $usuario['email'] . "</td>");
            echo ("<td><a href='controlador.php?borrarUser=" . $usuario['dni'] . "'><img src='img/basura.png' alt='' width='50px'></a></td>");
            echo ("<td><a href='controlador.php?user=" . $usuario['dni'] . "'><img src='img/prestamo.png' alt='' width='50px'></a></td>");
            echo ("</tr>");
        }
    }
    echo '</table>';
}

?>
<a href="#controlador.php" class="menu-item purple" data-toggle="modal" data-target="#addusuario" data-whatever="@getbootstrap"><img src="img/usuario.png" alt="" width="80px" style="margin-left: 15px; margin-top: 5px"></a>
<a href="controlador.php?usuariosCSV" ><img src="img/descargar.png" alt="" width="80px"></a>
<form action="" method="post" style="float: right; margin-top:1%">
    <div class="form-group row">
        <input type="text" class="form-control col-sm-7 col-form-label" name="buscarUser">
        <div class="col-sm-2">
            <input type="submit" name="buscar" value="buscar" style="margin-top: 5px;">
        </div>
    </div>
</form>

<div class="modal fade" id="addusuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method='POST' style="color: black;" action="controlador.php">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Añadir Usuarios</h4>
                    <!-- <h5 style="color: gray;"><?php//$result?></h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="disabledTextInput">DNI: </label>
                    <input type="text" class="form-control" name="dni">
                    <label for="disabledTextInput">Nombre: </label>
                    <input type="text" class="form-control" name="nombre">
                    <label for="disabledTextInput">Apellidos: </label>
                    <input type="text" class="form-control" name="apellidos">
                    <label for="disabledTextInput">Edad: </label>
                    <input type="text" class="form-control" name="edad">
                    <label for="disabledTextInput">Direccion: </label>
                    <input type="text" class="form-control" name="direccion">
                    <label for="disabledTextInput">Poblacion: </label>
                    <input type="text" class="form-control" name="poblacion">
                    <label for="disabledTextInput">Telefono: </label>
                    <input type="text" class="form-control" name="telefono">
                    <label for="disabledTextInput">Email: </label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name='addusuario' class="btn btn-primary" value="Añadir Usuario">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$_SESSION['usuarios'] = usuarioSelect();

if (isset($_POST['buscar']) && $_POST['buscarUser'] != " ") {
    pintarBuscador($_SESSION['usuarios'], $_POST['buscarUser']);
} else{
    pintarUsuarios($_SESSION['usuarios']);
}
?>