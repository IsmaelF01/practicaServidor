<?php

namespace BlackJack;

class Carta
{
    public $palo;
    public $figura;

    function __construct($palo, $figura)
    {
        $this->palo = $palo;
        $this->figura = $figura;
    }

    function __toString()
    {
        // return $this->palo . $this->figura;
        $result = '<img src="../img/cards/' . $this->palo . $this->figura . '.png" atl="error de mierda" width="5%">';
        return $result;
    }

    function getPalo()
    {
        return $this->palo;
    }

    function setPalo($palo)
    {
        $this->palo = $palo;
    }

    function getFigura()
    {
        return $this->figura;
    }

    function setFigura($figura)
    {
        $this->figura = $figura;
    }

    function getValor()
    {
        switch ($this->figura) {
            case 'A':
                return 11;
                break;
            case 'K':
                return 10;
                break;
            case 'Q':
                return 10;
                break;
            case 'J':
                return 10;
                break;
            case '9':
                return 9;
                break;
            case '8':
                return 8;
                break;
            case '7':
                return 7;
                break;
            case '6':
                return 6;
                break;
            case '5':
                return 5;
                break;
            case '4':
                return 4;
                break;
            case '3':
                return 3;
                break;
            case '2':
                return 2;
                break;
        }
    }
}
