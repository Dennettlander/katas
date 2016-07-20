<?php

namespace FizzBuzz;

class Translator implements TranslatorInterface
{
    public function translate($jugada)
    {

        if ($jugada%3 === 0 && $jugada%5 === 0)
        {
            return "FizzBuzz";
        }

        if ($jugada%3 === 0)
        {
            return "Fizz";
        }

        if ($jugada%5 === 0)
        {
            return "Buzz";
        }

        return (string)$jugada;
    }
}



