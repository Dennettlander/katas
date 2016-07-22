<?php

namespace spec\FizzBuzz;

use FizzBuzz\TranslatorInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FizzBuzzGameSpec extends ObjectBehavior
{
    function let(TranslatorInterface $traductor)
    {
        $traductor->translate(Argument::any())->willReturn("1");

        $this->beConstructedWith($traductor);
    }

    function it_is_return_FBGame_list(TranslatorInterface $traductor)
    {
        $this->playUpTo(3)->shouldReturn(["1", "1", "1"]);
        $traductor->translate(Argument::any())->shouldHaveBeenCalledTimes(3);
    }
}
