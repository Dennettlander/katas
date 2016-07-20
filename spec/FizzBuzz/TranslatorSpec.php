<?php

namespace spec\FizzBuzz;

use FizzBuzz\Translator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TranslatorSpec extends ObjectBehavior
{
    function it_notranslate_numbers_X3_or_X5()
    {
        $this->translate(1)->shouldReturn("1");
        $this->translate(3)->shouldReturn("Fizz");
        $this->translate(5)->shouldReturn("Buzz");
        $this->translate(15)->shouldReturn("FizzBuzz");

    }
}
