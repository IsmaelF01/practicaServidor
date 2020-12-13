<?php
namespace BlackJack;

abstract class Baraja
{
    public $mazo;

    public function __construct()
    {
        $this->mazo = array();
    }

    public abstract function repartirCarta();

    public function barajar()
    {
        return shuffle($this->mazo);
    }

    public function listar()
    {
        for ($i = 0; $i < count($this->mazo); $i++) {
            echo $this->mazo[$i]->__toString()." ";
        }
    }
}