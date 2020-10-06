
<?php
    echo ("<h1>Ejercicio 14</h1>");
    
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
            foreach($alumno as $nota){
                echo $nota."<br/>";
                $cont ++;
            }
        }
    }
    media($alumnos);
    

?>