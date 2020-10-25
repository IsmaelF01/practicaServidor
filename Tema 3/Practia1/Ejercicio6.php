<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Ejercicio 6 Ismael</title>
    <style>
        header {
            background-color: #FCE95F;
            height: 100px;
            padding-top: 1%;
            padding-left: 5%;
        }
    </style>
</head>

<body>
        <header>
            <h1 style='text-shadow: 2px 2px #ff0000; color:black '>Ejercicio 6</h1>
            <a href="compra.php"><img src="img/carro.png" alt="" style="width: 5%; position:absolute; top: 1%; right: 5%"></a>
        </header>
        <?php
        session_start();

        $libreria = array(
            array("ISBN" => 9788491992219, "titulo" => "Cientifica", "descripcion" => "Consultor jefe Allan R. Glanville; Prólogo de David Ellyard. Gran formato con ilustraciones. Esta obra trata temas como las matemáticas, la astronomía, la geología, la física, la química, la medicina y la biología. Es un compendio de algunos de los avances más importantes de la ciencia y la medicina en la historia de la humanidad. Se refiere a los descubrimientos y las invenciones que influyeron en el avance de la tecnología moderna, explica los conceptos fundamentales de muchos principios científicos y observa el mundo físico, partiendo desde las estrellas hasta llegar a las capas más profundas del subsuelo.", "categoria" => "ciencia", "editorial" => "alienta", "foto" => "img/ciencia.jpg", "precio" => 20.00),
            array("ISBN" => 9788467052008, "titulo" => "Manual de Cocina", "descripcion" => "Este libro de cocina, que ya es un clásico, se publicó por primera vez en 1950. Su autora, Ana María Herrera diplomada de la Academia de Gastrónomos de Madrid y profesora de cocina, trabajaba entonces como auxiliar en la Sección Femenina y lo escribió bajo dos principios: que las recetas resultaran baratas, pero de calidad, y que fueran fáciles de preparar. Presente en la mayoría de los hogares desde entonces, se publica ahora revisado por sus herederos para que siga siendo el gran manual de la cocina popular española.", "categoria" => "cocina", "editorial" => "austral", "foto" => "img/cocina.jpg", "precio" => 8.00),
            array("ISBN" => 9788431326937, "titulo" => "Alimentacion y Deporte", "descripcion" => "¿Puede la alimentación ayudar a triunfar en el deporte? Sin duda sí. La Declaración de 2009 de la Asociación Americana de Dietética, la Asociación de Dietética de Canadá y del Colegio Americano de Medicina del Deporte señala que La actividad física, el rendimiento deportivo y la recuperación mejoran con una alimentación adecuada. Estas organizaciones recomiendan una selección apropiada de alimentos, de líquido y de suplementos nutricionales, y del momento de su ingesta, para tener un rendimiento físico óptimo y una buena salud.", "categoria" => "deporte", "editorial" => "booket", "foto" => "img/deporte.jpg", "precio" => 12.99),
            array("ISBN" => 9788490564349, "titulo" => "La muerte de lord Edgware", "descripcion" => "La famosa actriz Carlotta Adams pide a Poirot que le ayude a obtener el divorcio de su marido, Lord Edgware. La gestión resulta innecesaria, puesto que, a los pocos días, Lord Edgware es asesinado con un estilete clavado en su nuca. Nuevas muertes dificultan la investigación.", "categoria" => "novela", "editorial" => "diana", "foto" => "img/novela.jpg", "precio" => 25.00),
            array("ISBN" => 9788497349017, "titulo" => "Mitologia Griega", "descripcion" => "Los personajes, las historias y los temas de la mitología griega son, probablemente, el legado más importante de la antigua Grecia. Robin Hard hace en este libro un completo recorrido por el mismo, desde los orígenes del Caos y la Noche. Describe las leyendas de los hijos de Cronos y los primeros mitos populares que surgieron de la conciencia griega; continúa con la guerra con los Titanes y describe todas las aventuras de los dioses del Olimpo, así como las actividades y asociaciones de cada dios y diosa, y las de todos los dioses menores y deidades extranjeras relacionadas con ellos. Sin olvidar las historias de los héroes: Heracles, Teseo, Cadmo, Edipo, Jasón y los argonautas… y, sobre todo, los protagonistas de la guerra de Troya. ", "categoria" => "historica", "editorial" => "geoPlaneta", "foto" => "img/historia.jpg", "precio" => 15.00),
            array("ISBN" => 9788498382662, "titulo" => "Harry Potter", "descripcion" => "Harry Potter nunca ha oído hablar de Hogwarts hasta que empiezan a caer cartas en el felpudo del número 4 de Privet Drive. Llevan la dirección escrita con tinta verde en un sobre de pergamino amarillento con un sello de lacre púrpura, y sus horripilantes tíos se apresuran a confiscarlas. Más tarde, el día que Harry cumple once años, Rubeus Hagrid, un hombre gigantesco cuyos ojos brillan como escarabajos negros, irrumpe con una noticia extraordinaria: Harry Potter es un mago, y le han concedido una plaza en el Colegio Hogwarts de Magia y Hechicería. ¡Está a punto de comenzar una aventura increíble!", "categoria" => "scifi", "editorial" => "zenith", "foto" => "img/scifi.jpg", "precio" => 15.00),
            array("ISBN" => 9788401382994, "titulo" => "Glas Sword", "descripcion" => "Perseguida por Maven, ahora un rey vengativo, Mare comienza a buscar y reclutar a otros Rojos -y Plateados- a unirse en su lucha contra sus opresores. Pero Mare se encuentra a si misma en un camino mortal, en riesgo de convertirse en el monstruo que ella está tratando de derrotar.", "categoria" => "negra", "editorial" => "yoyo", "foto" => "img/negra.jpg", "precio" => 7.00),
            array("ISBN" => 9788408187066, "titulo" => "After", "descripcion" => "AFTER: la historia de un amor infinito. Tessa Young se enfrenta a su primer año en la universidad. Acostumbrada a una vida estable y ordenada, su mundo cambia cuando conoce a Hardin, el chico malo por excelencia, con tatuajes y de mala vida. La inocencia, el despertar a la vida, el descubrimiento del sexo…un amor infinito, dos polos opuestos", "categoria" => "romantica", "editorial" => "oniro", "foto" => "img/romantica.jpg", "precio" => 20.00),
            array("ISBN" => 9788466331432, "titulo" => "Amanecer", "descripcion" => "Te quedas sin opciones cuando amas a tu potencial asesino. ¿Acaso es posible huir o luchar si eso debe causar un grave perjuicio a quien quieres? Si la vida es cuanto puedes darle y de verdad le amas por encima de todo, ¿por que no entregarla? La Saga Crepúsculo, en la que se incluyen los títulos Crepúsculo, Luna nueva, Eclipse, Amanecer, La segunda vida de Bree Tanner y la Guía ilustrada oficial, ha vendido ya cerca de 155 millones de copias en todo el mundo y más de 3 millones de ejemplares solo en España.", "categoria" => "historica", "editorial" => "scyla", "foto" => "img/historia2.jpg", "precio" => 16.00),
            array("ISBN" => 9788401382547, "titulo" => "El Regalo Extraordinario", "descripcion" => "Una intensa historia donde sus protagonistas tendrán que enfrentarse a sí mismos para rehacer sus vidas de entre los escombros. Una noche de marzo, en San Francisco, el esplendor, el glamur y el lujo del salón de baile del Ritz-Carlton están en su máximo apogeo.", "categoria" => "historica", "editorial" => "noguer", "foto" => "img/historia3.jpg", "precio" => 9.95),
            array("ISBN" => 9788492833504, "titulo" => "Querido John", "descripcion" => "John Tyree, es un un muchacho rebelde que vive en Carolina del Norte. Después de pasar una infancia complicada sin madre y con un padre obsesionado con la numismática decide alistarse en el ejército para poder huir de su pueblo y de su disfuncional familia. Sin embargo, en uno de los permisos que se le conceden, volverá a su ciudad natal y allí conocerá a Savannah. Las visitas de John a Savannah se suceden y en ellas el amor que sienten el uno por el otro no hará más que aumentar. John conseguriá además, con la ayuda Savannah, descubrir el porqué del alejamiento de su padre y reconciliarse con él.", "categoria" => "historica", "editorial" => "salsa", "foto" => "img/historia4.jpg", "precio" => 12.50),
            array("ISBN" => 9788466351768, "titulo" => "Desesperacion", "descripcion" => "Un libro llega hasta donde llegan nuestras fuerzas cuando lo escribimos sumadas a sus fuerzas cuando lo leen. No hay más. No podemos prometerles más. Lo que sí les decimos es que hemos escuchado y hemos leído y hemos prestado atención. Que nuestra voz no habla en favor de nuestro condenado ego, el cual ya está a punto de desaparecer. Nuestra voz es una suma de voces. Nuestra presencia se parece a esa neblina que consiste en la suspensión de gotas muy pequeñas en la atmósfera: no se ven, pero algo en el aire dice que están ahí.", "categoria" => "historica", "editorial" => "accerto", "foto" => "img/historia5.jpg", "precio" => 25.00),
            array("ISBN" => 9788483467336, "titulo" => "Querido Papá", "descripcion" => "El mundo de Oliver Watson parece disolverse cuando su esposa regresa a Harvard para graduarse. Oliver, que se siente abandonado se hace cargo de sus tres hijos: Ben, el mayor, no acepta ningún consejo paterno; Melissa, la mediana, le culpa del abandono de la madre; y Sam, el pequeño, a duras penas puede sobrellevar la situación.Además, el padre de Oliver, a sus más de 70 años, resuelve buscar novia. Nada es como antes; todo precisa nuevas decisiones, esfuerzo y un poco de suerte para este «querido papá» tan singular.", "categoria" => "negra", "editorial" => "seix", "foto" => "img/negra2.jpg", "precio" => 14.00),
            array("ISBN" => 9788490323052, "titulo" => "La historia de Lisey", "descripcion" => "Scott había sido un escritor muy premiado y de gran éxito y también un hombre muy complicado. Al principio de su relación, Lisey tuvo que aprender mucho de él sobre los libros, sobre sangre y sobre dádivas, esas maléficas travesuras. Más adelante supo que había un lugar donde Scott se refugiaba, un lugar que cerraba sus heridas y le aterrorizaba a la vez, que le inspiraba todas las ideas que necesitaba para vivir pero que también podría devorarle. Ahora le toca a Lisey enfrentarse con los demonios de Scott y tendrá que viajar a Boo'ya Moon.", "categoria" => "negra", "editorial" => "maxitus", "foto" => "img/negra3.jpg", "precio" => 21.50),
            array("ISBN" => 9788494548161, "titulo" => "Que un chico", "descripcion" => "El psiquiatra infantil Bruce Perry ha ayudado a los niños a enfrentarse a horrores inimaginables: supervivientes de genocidios, testigos del asesinato, adolescentes secuestrados y víctimas de la violencia familiar. En el niño que fue criado como un perro, narra todas estas historias de trauma y su transformación a través de la lente de la ciencia, revelando la asombrosa capacidad del cerebro para la curación, combinando hábilmente historias de casos inolvidables con sus propias estrategias de compasión, fundamentales para la rehabilitación", "categoria" => "negra", "editorial" => "backlist", "foto" => "img/negra4.jpg", "precio" => 17.99),
            array("ISBN" => 9788498797763, "titulo" => "Un mundo sin fin", "descripcion" => "Este libro arranca con críticas a la constitución española de 1978 y sugerencias para algunos de los cambios necesarios. También recuerda las precarias condiciones políticas en que se elaboró esa constitución, y señala la problematicidad de su reforma, amenazada por las correlaciones actuales de las fuerzas políticas.El cambio constitucional es necesario -aunque problemático- porque entre 1978 y el presente se ha producido lo que el autor llama un fin del mundo . Este ensayo, que da título al libro, muestra la distancia de los problemas centrales de nuestro tiempo respecto de la época en que se elaboró la constitución. Hoy los problemas no residen en la conquista de las libertades públicas, sino en su supervivencia en un mundo mutado casi por completo.", "categoria" => "negra", "editorial" => "minotauro", "foto" => "img/negra5.jpg", "precio" => 22.99)
        );

        if (isset($_POST['nombre'])) {
            foreach ($libreria as $libro) {
                if ($libro['titulo'] == $_POST['nombre']) {
                    $_SESSION['compra'][] = array("titulo" => $libro['titulo'], "precio" => $libro['precio'], "cantidad" => 1);
                }
            }
        }
        function pintar($categoria)
        {
            global $libreria;
            echo "<h3 style= color:purple margin-bottom: 5%><strong>Novela " . $categoria . "</strong></h3>";
            echo '<div class="row align-items-center">';
            foreach ($libreria as $libro) {
                if ($libro["categoria"] == $categoria) {

                    echo '<div class="row" style= margin-left:3%>';
                    echo '<div class="col">';
                    echo '<div class="card" style="width: 12rem; height:420px; border: solid black 1px">';
                    echo '<div class="card-body">';
                    echo '<img src="' . $libro["foto"] . '" class="card-img-top" alt="...">';
                    echo '<hr/>';
                    echo '<div class="col-20 row-10 text-truncate">';
                    echo '<span class="card-text d-inline-block text-truncate  style="max-width: 400px; font-size:10px ">' . $libro["descripcion"] . '</span>';
                    echo '</div>';
                    echo '<h5 class="card-title">' . $libro["titulo"] . '</h5>';
                    echo '<p class="card-text" style="color:red; position:absolute; bottom: 0">' . $libro["precio"] . '</a>';
                    echo '<form method="post">';
                    echo '<input type="hidden" name="nombre" value="' . $libro["titulo"] . '">';
                    echo '<button type="submit" class="btn btn-primary" name="buy" style="position:absolute; bottom: 2%; right: 10%">Comprar</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            echo "</div>";
            echo "<br/>";
        }

        pintar("negra");
        pintar("historica");
        ?>
    </div>
</body>

</html>