<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Formulario</title>
</head>

<body>

    <?php
    //Variable para controlar los errores
    $errores= array();
    
    //Lectura del formulario
    if ($_POST) {
        //Comprobando cada uno de los campos
        if (strlen($_POST['email'])>0) {
            echo $_POST['email'];
        } else {
            echo "Email no intriducido";
        }
        if (strlen($_POST['password'])>0) {
            echo $_POST['password'];
        } else {
            echo "Password no intriducido";
        }
        if (isset($_POST['lenguajes'])) {
            echo "Lenguaje: ";
            foreach ($_POST['lenguajes'] as $lenguajes) {
                echo $lenguajes . " ";
            }
        } else {
            echo "Lenguajes no intriducido";
        }
        if (isset($_POST['country'])>0) {
            echo "Country: ";
            foreach ($_POST['country'] as $lenguajes) {
                echo $lenguajes . " ";
            }
        } else {
            echo "Country no intriducido";
        }
    }



    ?>

    <div class="container">
        <form action="formulario.php" method="post">
            <div class="form-group col-5">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" require>
            </div>
            <div class="form-group col-5">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" require>
            </div>
            <div class="form-group form-check col-5">
                <label for="exampleInputPassword1">Fecha nacimiento</label>
                <input type="date" class="form-control" name="date">
            </div>
            <div class="form-group form-check ml-3">
                <input type="checkbox" class="form-check-input" name="lenguajes[]" value="Java">
                <label class="form-check-label" for="exampleCheck1">Java</label>
            </div>
            <div class="form-group form-check ml-3">
                <input type="checkbox" class="form-check-input" name="lenguajes[]" value="PHP">
                <label class="form-check-label" for="exampleCheck1">PHP</label>
            </div>
            <div class="form-group form-check ml-3">
                <input type="checkbox" class="form-check-input" name="lenguajes[]" value="Python">
                <label class="form-check-label" for="exampleCheck1">Pyton</label>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Options</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01" name="country" multiple>
                    <option value="España">España</option>
                    <option value="Alemania">Alemania</option>
                    <option value="Francia">Francia</option>
                    <option value="Italia">Italia</option>
                </select>
            </div>
            <div class="form-group form-check ml-3">
                <label class="form-check-label" for="exampleCheck1">Comentarios</label>
                <textarea class="form-check-input" name="comentario"></textarea>
            </div>
            <div class="form-group form-check ml-3">
            <button type="submit" class="btn btn-primary">Enviar</button>
            <button type="reset" class="btn btn-primary">Clear</button>
            <a href="borrar.php?id=3"><button type="button" class="btn btn-primary">Accion</button></a>
            </div>
        </form>
    </div>
</body>

</html>