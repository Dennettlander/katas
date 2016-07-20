<?php

namespace FizzBuzz;

class FizzBuzzGame
{
    /**
     * @var TranslatorInterface
     */
    private $traductor;


    public function __construct(TranslatorInterface $traductor)
    {
        $this->traductor = $traductor;
    }

    public function playUpTo($jugada)
    {
        $lista = [];
        for ($i=1; $i<=$jugada; $i++){
            $lista[$i-1] = $this->traductor->translate($i);
        }

        return $lista;
    }
}
