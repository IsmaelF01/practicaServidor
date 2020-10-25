<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Ejercicio 3 Ismael</title>
</head>

<body>
    <div class="contenedor">
        <?php
        session_start();
        echo "<h1 style='text-shadow: 2px 2px #ff0000; color:black '>Ejercicio 3</h1>";

        //50 palabras en ingles
        if (!isset($_SESSION['$word_list_en'])) {
            $_SESSION['$word_list_en'] = [
                "Soldier", "Mouse", "English", "Spanish", "Football", "Chrismas", "New year", "Word", "Bird", "Penguin",
                "Car", "Varano", "List", "Door", "Picture", "Circle", "Sugar", "Flower", "Box", "Boss",
                "Wall", "Year", "Laundry", "Game", "Date", "Turis", "Toast", "Dog", "Cat", "Coin",
                "Newspaper", "Children", "Purse", "Carpet", "Mask", "Street", "Careful", "Teenager", "Paint", "Umbrella",
                "Cartoon", "Glass", "Book", "Comb", "Room", "Family", "Coat", "Magazine", "One", "Level"
            ];
        }
        //50 palabras en español
        if (!isset($_SESSION['$word_list_es'])) {
            $_SESSION['$word_list_es'] = [
                "Soldado", "Ratón", "Ingles", "Español", "Futbol", "Navidad", "Año Nuevo", "Palabra", "Pajaro", "Pinguino",
                "Coche", "Summer", "Lista", "Puerta", "Cuadro", "Circulo", "Azucar", "Flor", "Caja", "Jefe",
                "Pared", "Año", "Lavandería", "Juego", "Fecha", "Turista", "Tostada", "Perro", "Gato", "Monedas",
                "Periodico", "Niño", "Monedero", "Alfombra", "Mascara", "Calle", "Cuidado", "Adolescente", "Pintura", "Paraguas",
                "Dibujos", "Vaso", "Libro", "Peine", "Cuarto", "Familia", "Abrigo", "Revista", "Uno", "Nivel"
            ];
        }

        $palabra = "";
        if ($_POST) {
            if (isset($_POST['buscar'])) {
                if (array_search(ucwords($_POST['buscar']), $_SESSION['$word_list_es']) > 0) {
                    $_SESSION['palabra'] = $_SESSION['$word_list_en'][array_search(ucwords($_POST['buscar']), $_SESSION['$word_list_es'])];
                    //echo $word_list_en[array_search($_POST['español'], $word_list_es)];
                } else {
                    $_SESSION['palabra'] = "Palabra no encontrada";
                }
            }
            if (isset($_POST['español'])) {
                array_push($_SESSION['$word_list_es'], ucwords($_POST['español']));
            }

            if (isset($_POST['ingles'])) {
                array_push($_SESSION['$word_list_en'], ucwords($_POST['ingles']));
            }

            if (isset($_POST['borrar'])) {
                $posi = array_search(ucwords($_POST['borrar']), $_SESSION['$word_list_es']);
                /*Español*/
                if ($posi > 0) {
                    unset($_SESSION['$word_list_es'][$posi]);
                    unset($_SESSION['$word_list_en'][$posi]);
                    $_SESSION['$word_list_es'] = array_values($_SESSION['$word_list_es']);
                    $_SESSION['$word_list_en'] = array_values($_SESSION['$word_list_en']);
                    echo "La palabra " . $_POST['borrar'] . " ha sido borrada";
                } else {
                    echo "La palabra no esta en el array";
                }
            }
        }
        ?>
        <form method='post'>
            <label for="exampleFormControlSelect1">Tractor de Español a Ingles </label>
            <div class="row" style="width: 50%;">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Introduzca la palabra" name="buscar">
                </div>
                <div class="col">
                    <textarea name="comment" form="usrform" style="height: 37px; width:250px"><?php echo ucwords($_POST['buscar']) . ' -> ' . $_SESSION['palabra'] ?></textarea>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary" style="margin-top: 1%;">Enviar</button>
                </div>
            </div>
        </form>
        <a href="Ejercicio3.php?accion=add"><button type="button" class="btn btn-primary" style="margin-top: 1%;" name="add">Añadir</button></a>
        <a href="Ejercicio3.php?accion=del"><button type="button" class="btn btn-primary" style="margin-top: 1%;" name="del">Borrar</button></a>

        <?php
        if (isset($_GET['accion'])) {
            if ($_GET['accion'] == 'add') {
        ?>
                <form method="post" style="margin-top: 1%" ;>
                    <label for="exampleFormControlSelect1">Añadir palabras al diccionario </label>
                    <div class="row" style="width: 50%;">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Introduzca la palabra español" name="español" style="width:250px;">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Introduzca la palabra ingles" name="ingles" style="width:250px;">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </form>
            <?php
            }
            if ($_GET['accion'] == 'del') {
            ?>
                <form method="post" style="margin-top: 1%" ;>
                    <label for="exampleFormControlSelect1">Borrar palabras del diccionario </label>
                    <div class="row" style="width: 50%;">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Introduzca la palabra español" name="borrar" style="width:250px;">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary" style="margin-top: 4px;">Enviar</button>
                        </div>
                    </div>
                </form>
        <?php
            }
        }
        ?>
    </div>
</body>

</html>