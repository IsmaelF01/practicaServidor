<?php
namespace BlackJack;

class Jugador{

    public $mano;
    
    public function __construct()
    {
        $this->mano = array();
    }

    function getMano() { 
        return $this->mano; 
   } 

    public function nuevaCarta($carta){
        array_push($this->mano, $carta); 
    }

    public function __toString()
    {
        echo '<div>';
        foreach($this->mano as $carta){
            // echo '<img src="../img/cards/'.$carta->__toString().'.png" atl="error de mierda" width="5%">';
            echo $carta->__toString();
        }
        echo '</div>';
    }

    public function valorMano(){
        $valor = 0;
        foreach($this->mano as $carta){
            $valor += $carta->getValor();            
        } 
        return $valor;       
    }
}

// $j1 = new Jugador();
// $j1->nuevaCarta(new Carta('C', 'A'));
// $j1->nuevaCarta(new Carta('T', '5'));
// $j1->__toString();
// echo $j1->valorMano();

	
?>