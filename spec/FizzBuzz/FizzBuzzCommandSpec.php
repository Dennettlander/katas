<?php

namespace spec\FizzBuzz;

use FizzBuzz\FizzBuzzCommand;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FizzBuzzCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(FizzBuzzCommand::class);
    }
}
