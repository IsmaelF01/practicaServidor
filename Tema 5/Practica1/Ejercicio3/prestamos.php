<?php
include("cabecera.php");
include("lib/lib.php");
session_start();

function pintarPrestamos($prestamos)
{
    echo '<table class="table table-striped" style="width: 50%; text-align:center; margin: 0 auto">';
    echo ("<tr>");
    echo ("<th>" . 'ISBN' . "</th>");
    echo ("<th>" . 'DNI' . "</th>");
    echo ("<th>" . 'FechaIni' . "</th>");
    echo ("<th>" . 'FechaFin' . "</th>");
    echo ("<th>" . 'Estado' . "</th>");
    echo ("<th>" . 'Borrar' . "</th>");
    echo ("/<tr>");
    foreach ($prestamos as $prestamo) {
        echo ("<tr>");
        echo ("<td>" . $prestamo['ISBN'] . "</td>");
        echo ("<td>" . $prestamo['DNI'] . "</td>");
        echo ("<td>" . $prestamo['fechaini'] . "</td>");
        echo ("<td>" . $prestamo['fechafin'] . "</td>");
        echo ("<td>" . $prestamo['estado'] . "</td>");
        echo ("<td><a href='controlador.php?borrarPrestamo=" . $prestamo['ISBN'] . "'><img src='img/basura.png' alt='' width='30px'></a></td>");
        echo ("</tr>");
    }
    echo '</table>';
}

?>
<a href="#controlador.php" class="menu-item purple" data-toggle="modal" data-target="#addprestamo" data-whatever="@getbootstrap"><img src="img/prestamo.png" alt="" width="80px" style="margin-left: 15px; margin-top: 5px"></a>

<div class="modal fade" id="addprestamo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method='POST' style="color: black;" action="controlador.php">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Añadir Prestamo</h4>
                    <!-- <h5 style="color: gray;"><?php//$result?></h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <label for="disabledTextInput">ISBN Libro: </label>
                <select class="custom-select" name="ISBN" id="">
<?php
            $libros = librosSelect();

            foreach($libros as $libro) {
                echo "<option value='".$libro['ISBN']."'>";
                echo $libro['ISBN']." - ".$libro['titulo'];
                echo "</option>";
            }
?>
            </select>
            <label for="disabledTextInput">Usuario: </label>
                <select class="custom-select" name="DNI" id="">
<?php
            $usuarios = usuarioSelect();

            foreach($usuarios as $usuario) {
                echo "<option value='".$usuario['dni']."'>";
                echo $usuario['dni']." - ".$usuario['nombre']." - ".$usuario['apellidos'];
                echo "</option>";
            }
?>
            </select>
                    <label for="disabledTextInput">Fecha Inicio: </label>
                    <input type="date" class="form-control" name="fechaini">
                    <label for="disabledTextInput">Fecha Fin: </label>
                    <input type="date" class="form-control" name="fechafin">
                    <label for="disabledTextInput">Estado: </label>
                    <select class="custom-select" name="estado" id="">
                        <option value="activo">Activo</option>
                        <option value="devuelto">Devuelto</option>
                        <option value="unmes">Sobre Pasado 1 Mes</option>
                        <option value="unaño">Sobre Pasado 1 Año</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name='addprestamo' class="btn btn-primary" value="ADD Prestamo">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$_SESSION['prestamos'] = prestamosSelect();
pintarPrestamos($_SESSION['prestamos']);
?>