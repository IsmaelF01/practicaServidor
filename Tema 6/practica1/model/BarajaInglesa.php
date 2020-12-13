<?php
namespace BlackJack;

include("../controller/autoload.php");
use BlackJack\Baraja;

class BarajaInglesa extends Baraja
{

    static $palo = array('C', 'D', 'P', 'T');
    static $figura = array("A", "2", "3", "4", "5", "6", "7", "8", "9", "J", "Q", "K");

    public function __construct()
    {
        parent::__construct();
        $this->generarMazo();
    }

    public function repartirCarta()
    {
        $carta = array_pop($this->mazo);
        $card = "";
        foreach($carta as $value){
            $card .= $value;
        }
        $figura = substr($card, 0, 1);
        $palo = substr($card, -1);
        return new Carta($figura, $palo);
        //return $carta;
    }

    public function generarMazo()
    {
        for ($j = 0; $j < count(self::$palo); $j++) {
            for ($k = 0; $k < count(self::$figura); $k++) {
                array_push($this->mazo, new Carta(self::$palo[$j], self::$figura[$k]));
            }
        }
    }

    public function __toString()
    {
        $cadena = "";
        foreach($this->mazo as $carta){
            $cadena .= $carta. " ";
            
        }
        return $cadena;
    }
}

// $b1 = new BarajaInglesa();
// $b1->listar();
// $b1->barajar();
// echo "<br/>";
// $b1->listar();
