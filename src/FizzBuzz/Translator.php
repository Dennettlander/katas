<?php

namespace FizzBuzz;

class Translator implements TranslatorInterface
{
    /**
     * @var string
     */
    private $fizz;

    /**
     * @var string
     */
    private $buzz;


    public function __construct($fizz, $buzz)
    {
        $this->fizz = $fizz;
        $this->buzz = $buzz;
    }

    public function translate($jugada)
    {
        if ($jugada % 3 === 0 && $jugada % 5 === 0) {
            return $this->fizz . $this->buzz;
        }

        if ($jugada % 3 === 0) {
            return $this->fizz;
        }

        if ($jugada % 5 === 0) {
            return $this->buzz;
        }

        return (string) $jugada;
    }

    public static function createForLanguage($idioma)
    {
        switch ($idioma) {
            case 'Spanish':
                return new Translator('¡Ole!', '¡Arsa!');
            case 'English':
                return new Translator('Fizz', 'Buzz');
            default:
                throw new \InvalidArgumentException("Idioma no disponible");
        }
    }
}

