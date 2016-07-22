<?php

namespace spec\FizzBuzz;

use FizzBuzz\Translator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TranslatorSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Fizz', 'Buzz');
    }

    function it_notranslate_numbers_X3_or_X5()
    {
        $this->translate(1)->shouldReturn("1");
        $this->translate(3)->shouldReturn("Fizz");
        $this->translate(5)->shouldReturn("Buzz");
        $this->translate(15)->shouldReturn("FizzBuzz");
    }

    function it_translates_into_spanish()
    {
        $this->beConstructedWith('¡Ole!', '¡Arsa!');

        $this->translate(3)->shouldReturn("¡Ole!");
        $this->translate(5)->shouldReturn("¡Arsa!");
        $this->translate(15)->shouldReturn("¡Ole!¡Arsa!");
    }

    function it_has_a_factory_for_languages()
    {
        $this::createForLanguage('Spanish')->shouldBeLike(new Translator('¡Ole!', '¡Arsa!'));
        $this::createForLanguage('English')->shouldBeLike(new Translator('Fizz', 'Buzz'));
    }

    function it_throws_an_exception_if_language_is_not_supported()
    {
        $this->shouldThrow(new \InvalidArgumentException("Idioma no disponible"))->duringCreateForLanguage('inventado');
    }
}
