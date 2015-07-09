<?php

namespace spec\CMP\BackendTest;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LauncherSpec extends ObjectBehavior
{
	public function it_need_parameters_to_be_constructed ()
	{
		$this->shouldThrow("\InvalidArgumentException")->during__construct (null);
	}
	
	public function it_can_read_a_config()
	{			
		$this->beConstructedWith("glorf");
		$this->readConfig()->shouldReturn(true);
	}
	
	public function it_need_to_match_a_channel ()
	{
		$this->beConstructedWith("glorf");
		$this->readConfig(); // First, the configuration need to be loaded
		$this->findChannel("glorf")->shouldImplement("CMP\BackendTest\Channel\FeedChannel");
	}
}
