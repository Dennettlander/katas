<?php

namespace FizzBuzz;

class Translator implements TranslatorInterface
{
    const FIZZ = "Fizz";
    const BUZZ = "Buzz";


    public function translate($jugada)
    {
        if ($jugada % 3 === 0 && $jugada % 5 === 0) {
            return self::FIZZ . self::BUZZ;
        }

        if ($jugada % 3 === 0) {
            return self::FIZZ;
        }

        if ($jugada % 5 === 0) {
            return self::BUZZ;
        }

        return (string) $jugada;
    }
}



