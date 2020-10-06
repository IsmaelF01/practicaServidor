
<?php
    echo ("<h1>Ejercicio 4</h1>");
    //50 palabras en ingles
   $word_list_en = array("Soldier", "Mouse", "English", "Spanish", "Football", "Chrismas", "New year", "Word", "Bird", "Penguin",
    "Car", "Varano", "List", "Door", "Picture", "Circle", "Sugar", "Flower", "Box", "Boss",
    "Wall", "Year", "Laundry", "Game", "Date", "Turis", "Toast", "Dog", "Cat", "Coin",
    "Newspaper", "Children", "Purse", "Carpet", "Mask", "Street", "Careful", "Teenager", "Paint", "Umbrella",
    "Cartoon", "Glass", "Book", "Comb", "Room", "Family", "Coat", "Magazine", "One", "Level"
);
    //50 palabras en español
   $word_list_es = array("Soldado", "Ratón", "Ingles", "Español", "Futbol", "Navidad", "Año Nuevo", "Palabra", "Pajaro", "Pinguino",
   "Coche", "Summer", "Lista", "Puerta", "Cuadro", "Circulo", "Azucar", "Flor", "Caja", "Jefe",
   "Pared", "Año", "Lavandería", "Juego", "Fecha", "Turista", "Tostada", "Perro", "Gato", "Monedas",
   "Periodico", "Niño", "Monedero", "Alfombra", "Mascara", "Calle", "Cuidado", "Adolescente", "Pintura", "Paraguas",
   "Dibujos", "Vaso", "Libro", "Peine", "Cuarto", "Familia", "Abrigo", "Revista", "Uno", "nivel");
   
   //for para pintar la traduccion de ingles a español
   function en_es($word_list_en, $word_list_es){
       for($i = 0; $i <50; $i++){
           echo ($word_list_en[$i]." -> ".$word_list_es[$i]."<br/>");
       }
   }
   
   //for para pintar la traduccion de español a ingles
   function es_en($word_list_en, $word_list_es){
        for($i = 0; $i <50; $i++){
            echo ($word_list_es[$i]." -> ".$word_list_en[$i]."<br/>");
        }
    }

    echo "Traduccion de ingles a español<br/>";
    en_es($word_list_en, $word_list_es);
    echo "<br/>Traduccion de español a ingles<br/>";
    es_en($word_list_en, $word_list_es);
?>