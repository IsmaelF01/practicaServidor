<?php

namespace BlackJack;

class Partida
{
    public $jugador;
    public $crupier;
    public $mazo;

    public function __construct()
    {
        $this->jugador = new Jugador();
        $this->crupier = new Jugador();
        $this->mazo = new BarajaInglesa();
        $this->mazo->barajar();
    }

    public function empezar()
    {
        echo "hola";
        for ($i = 0; $i < 2; $i++) {
            echo "hola";
            array_push($this->jugador->mano, $this->mazo->repartirCarta());
            array_push($this->crupier->mano, $this->mazo->repartirCarta());
        }
        foreach ($this->jugador->mano as $mano) {
            echo $mano;
        }
    }

    public function repartir()
    {
        array_push($this->jugador->mano, $this->mazo->repartirCarta());
        array_push($this->crupier->mano, $this->mazo->repartirCarta());

        foreach ($this->jugador->mano as $mano) {
            echo $mano;
        }
    }

    public function __toString()
    {
        echo $this->jugador;
        echo $this->crupier;
    }
}
