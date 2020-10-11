
<?php
    include_once("cabecera.php");
    echo ("<h1 style='text-shadow: 2px 2px #ff0000; color:black '>Ejercicio 14</h1>");

    
    $alumnos = array (
        array("Nombre" => "Juan", "Materia" => "Mates", "Nota" => "5"),
        array("Nombre" => "Pablo", "Materia" => "Lengua", "Nota" => "7"),
        array("Nombre" => "Marcos", "Materia" => "Ingles", "Nota" => "4"),
        array("Nombre" => "Alberto", "Materia" => "E.F", "Nota" => "9"),
        array("Nombre" => "Jose", "Materia" => "Informatica", "Nota" => "1"),
        array("Nombre" => "Luis", "Materia" => "Biologia", "Nota" => "10"),
        array("Nombre" => "Rodolfo", "Materia" => "Geografia", "Nota" => "8"),
        array("Nombre" => "Kain", "Materia" => "Religion", "Nota" => "10"),
        array("Nombre" => "Alex", "Materia" => "Economia", "Nota" => "2"),
        array("Nombre" => "Eduardo", "Materia" => "Historia", "Nota" => "3")
    );

    function media($alumnos){
        $nota = 0;
        $cont = 0;
        foreach($alumnos as $alumno){
            $nota += $alumno["Nota"];
            $cont ++;
        }
        echo "Nota media ".$nota/$cont."<br/>";
    }

    function alumSus($alumnos){
        echo "Los alumnos suspensos son ";
        foreach($alumnos as $alumno){
            if($alumno["Nota"] < 5){
                echo $alumno["Nombre"].", ";
            }
        }
    }

    function ordenNotas($alumnos){
        echo "<br/>Notas ordenadas ";
        $ordenado = array ();
        foreach($alumnos as $alumno){
            array_push($ordenado, $alumno["Nota"]);
        }
        rsort($ordenado);
        foreach($ordenado as $num){
            echo $num.", ";
        }
    }

    function ordenNombre($alumnos){
        echo "<br/>Nombre ordenadas ";
        $ordenado = array ();
        foreach($alumnos as $alumno){
            array_push($ordenado, $alumno);
            echo $alumnos;
        }
        sort($ordenado);

    }

    media($alumnos);
    alumSus($alumnos);
    ordenNotas($alumnos);
    ordenNombre($alumnos);
    
    include_once("pie.php")

?>