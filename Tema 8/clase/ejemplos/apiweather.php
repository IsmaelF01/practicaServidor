		<?php
		//CON JSON
		$zipcode = '04638';
		$json = file_get_contents("http://api.openweathermap.org/data/2.5/weather?zip=".$zipcode.",es&units=metric&appid="); 

		//Pasar el json a un objeto que pueda leer PHP
		$objeto = json_decode($json);
		echo $objeto->name.":".$objeto->main->temp." grados. Sensación térmica: ".$objeto->main->feels_like;
		echo "<img src='http://openweathermap.org/img/w/".$objeto->weather[0]->icon.".png'>";
		?>
