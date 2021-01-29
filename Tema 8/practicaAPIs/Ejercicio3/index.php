<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlixNet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<style>
    body {
        background: linear-gradient(to left, #EA384D, #fe8c00);
    }

    #contenedor {
        margin: 0 auto;
    }

    img {
        width: 350px;
        height: 350px;
    }

    div {
        margin-bottom: 2%;
    }

    button {
        margin-left: 40%;
        margin-top: 2%;
    }

    #m,
    #r,
    #v {
        float: left;
        margin-left: 20%;
    }

    #am,
    #az,
    #b {
        float: right;
        margin-right: 20%;
    }

    a {
        text-decoration: none;
        list-style: none;
        color: white;
    }
</style>

<body>
    <h1 class="display-1" style="text-align: center;">PhotoSteal</h1>
    <div id="m">
        <img src="img/morado.jpg" alt=""></br>
        <button id="morada" type="button" class="btn btn-outline-secondary" onmouseover=borrarM()>Morada</button>
        <div id="textM" style="position: absolute; top: 18%; left:22%; width:22%; color:white; background-color: #00000080; padding: 0px 10px 0px 10px;"></div>
    </div>
    <div id="am">
        <img src="img/amarilla.jpg" alt=""></br>
        <button id="amarilla" type="button" class="btn btn-outline-warning" onmouseover=borrarAm()>Amarilla</button>
        <div id="textAm" style="position: absolute; top: 25%; right:22%; width:22%; color:white; background-color: #00000080; padding: 0px 10px 0px 10px;"></div>
    </div>
    <div id="r">
        <img src="img/roja.jpg" alt=""></br>
        <button id="roja" type="button" class="btn btn-outline-danger" onmouseover=borrarR()>Roja</button>
        <div id="textR" style="position: absolute; top: 87%; left:22%; width:22%; color:white; background-color: #00000080; padding: 0px 10px 0px 10px;"></div>
    </div>
    <div id="az">
        <img src="img/azul.jpg" alt=""></br>
        <button id="azul" type="button" class="btn btn-outline-primary" onmouseover=borrarAz()>Azul</button>
        <div id="textAz" style="position: absolute; top: 87%; right:22%; width:22%; color:white; background-color: #00000080; padding: 0px 10px 0px 10px;"></div>
    </div>
    <div id="v">
        <img src="img/verde.jpg" alt=""></br>
        <button id="verde" type="button" class="btn btn-outline-success" onmouseover=borrarV()>Verde</button>
        <div id="textV" style="position: absolute; top: 160%; left:22%; width:22%; color:white; background-color: #00000080; padding: 0px 10px 0px 10px;"></div>
    </div>
    <div id="b">
        <img src="img/blanco.jpg" alt=""></br>
        <button id="blanco" type="button" class="btn btn-outline-light" onmouseover=borrarB()>Blanco</button>
        <div id="textB" style="position: absolute; top: 160%; right:22%; width:22%; color:white; background-color: #00000080; padding: 0px 10px 0px 10px;"></div>
    </div>
    <div id="contenedor"></div>

    <!--Ayax -->
    <script>
        //Peticion Ayax de moradaº
        document.getElementById("morada").addEventListener("click", async function() {
            let formData = new FormData();

            formData.append("action", "morada");

            var res = await fetch("controlador.php", {
                method: "POST",
                body: formData,
            });

            var data = await res.text();

            document.getElementById("textM").innerHTML = data;
        });

        //Peticion Ayax de amarilla
        document.getElementById("amarilla").addEventListener("click", async function() {
            let formData = new FormData();

            formData.append("action", "amarilla");

            var res = await fetch("controlador.php", {
                method: "POST",
                body: formData,
            });

            var data = await res.text();

            document.getElementById("textAm").innerHTML = data;
        });

        //Peticion Ayax de roja
        document.getElementById("roja").addEventListener("click", async function() {
            let formData = new FormData();

            formData.append("action", "roja");

            var res = await fetch("controlador.php", {
                method: "POST",
                body: formData,
            });

            var data = await res.text();

            document.getElementById("textR").innerHTML = data;
        });

        //Peticion Ayax de azul
        document.getElementById("azul").addEventListener("click", async function() {
            let formData = new FormData();

            formData.append("action", "azul");

            var res = await fetch("controlador.php", {
                method: "POST",
                body: formData,
            });

            var data = await res.text();

            document.getElementById("textAz").innerHTML = data;
        });

        //Peticion Ayax de verde
        document.getElementById("verde").addEventListener("click", async function() {
            let formData = new FormData();

            formData.append("action", "verde");

            var res = await fetch("controlador.php", {
                method: "POST",
                body: formData,
            });

            var data = await res.text();

            document.getElementById("textV").innerHTML = data;
        });

        //Peticion Ayax de blaco
        document.getElementById("blanco").addEventListener("click", async function() {
            let formData = new FormData();

            formData.append("action", "blanco");

            var res = await fetch("controlador.php", {
                method: "POST",
                body: formData,
            });

            var data = await res.text();

            document.getElementById("textB").innerHTML = data;
        });

        //Entrar en el boton para borra contenido
        function borrarM(){
            document.getElementById("textM").innerHTML = "";
        }
        function borrarAm(){
            document.getElementById("textAm").innerHTML = "";
        }
        function borrarR(){
            document.getElementById("textR").innerHTML = "";
        }
        function borrarAz(){
            document.getElementById("textAz").innerHTML = "";
        }
        function borrarV(){
            document.getElementById("textV").innerHTML = "";
        }
        function borrarB(){
            document.getElementById("textB").innerHTML = "";
        }
    </script>
</body>

</html>