<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlixNet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<style>
    body{
        background-color: black;
    }
    #accion {
        margin-left: 35%; 
    }

    h4{
        margin-bottom: 10px;
        margin-top: 10px;
    }
</style>

<body>
    <img style="margin-left: 40%" src="img/titulo.PNG" alt="">
    <button id="accion" type="button" class="btn btn-outline-primary">Accion</button>
    <button id="terror" type="button" class="btn btn-outline-success">Terror</button>
    <button id="drama" type="button" class="btn btn-outline-danger">Drama</button>
    <button id="anime" type="button" class="btn btn-outline-warning">Anime</button>
    <button id="comedia" type="button" class="btn btn-outline-light">Comedia</button>
    <div id="contenedor"></div>

    <!--Ayax -->
    <script>
        //Peticion Ayax de accion
        document.getElementById("accion").addEventListener("click", async function() {
            let formData = new FormData();

            formData.append("action", "accion");

            var res = await fetch("controlador.php", {
                method: "POST",
                body: formData,
            });

            var data = await res.text();

            document.getElementById("contenedor").innerHTML = data;
        });

        //Peticion Ayax de terror
        document.getElementById("terror").addEventListener("click", async function() {
            let formData = new FormData();

            formData.append("action", "terror");

            var res = await fetch("controlador.php", {
                method: "POST",
                body: formData,
            });

            var data = await res.text();

            document.getElementById("contenedor").innerHTML = data;
        });

        //Peticion Ayax de drama
        document.getElementById("drama").addEventListener("click", async function() {
            let formData = new FormData();

            formData.append("action", "drama");

            var res = await fetch("controlador.php", {
                method: "POST",
                body: formData,
            });

            var data = await res.text();

            document.getElementById("contenedor").innerHTML = data;
        });

        //Peticion Ayax de anime
        document.getElementById("anime").addEventListener("click", async function() {
            let formData = new FormData();

            formData.append("action", "anime");

            var res = await fetch("controlador.php", {
                method: "POST",
                body: formData,
            });

            var data = await res.text();

            document.getElementById("contenedor").innerHTML = data;
        });

        //Peticion Ayax de comedia
        document.getElementById("comedia").addEventListener("click", async function() {
            let formData = new FormData();

            formData.append("action", "comedia");

            var res = await fetch("controlador.php", {
                method: "POST",
                body: formData,
            });

            var data = await res.text();

            document.getElementById("contenedor").innerHTML = data;
        });


        // document.getElementById("accion").addEventListener("clicl", async function(e) {
        //     e.preventDefault();
        //     var formFata = new FormData(e.target);
        //     var res = await fetch("https://api.themoviedb.org/3/discover/tv?api_key=844fec406ed34f75659356a5034e05e6&language=es-ES&sort_by=popularity.desc&page=1&timezone=Europe%2FSpain&include_null_first_air_dates=false&with_genres=10759", {
        //         method: "POST",
        //         cache: "no-cache",
        //         body: formData,
        //         headers: {
        //             "Content-Type": "application/x-www-form-urlencoded"
        //         },
        //     });
        //     var data = await res.text();
        //     document.getElementById("contenedor").innerHTML = data;
        // });
    </script>
</body>

</html>