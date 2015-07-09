<?php

namespace spec\CMP\BackendTest\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class VideoSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('CMP\BackendTest\Entity\Video');
    }
}
