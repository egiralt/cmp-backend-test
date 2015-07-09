<?php

namespace spec\CMP\BackendTest\Channel;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StandardChannelSpec extends ObjectBehavior
{
	public function it_need_parameters_to_be_constructed () 
	{
		$this->beConstructedWith();
	}
	
    function it_should_keep_a_valid_downloader_instance()
    {
    	$this->beConstructedWith("glorf");
    	$this->fromConfiguration (null);
        $this->getDownloader()->shouldImplement('CMP\BackendTest\Downloader\Downloader');
    }

    function it_should_keep_a_valid_processor_instance()
    {
    	$this->beConstructedWith("glorf");
    	$this->fromConfiguration (null);
    	
		$this->getProcessor()->shouldImplement('CMP\BackendTest\Processor\Processor');
    }

    function it_should_keep_a_valid_store_provider_instance()
    {
    	$this->beConstructedWith("glorf");
    	$this->fromConfiguration (null);
    	
    	$this->getStoreProvider()->shouldImplement('CMP\BackendTest\StoreProvider\StoreProvider');
    }
    
    function it_should_download_and_format_a_feed ()
    {
    	$this->beConstructedWith("glorf");
    	$this->fromConfiguration (null);
    	
    	$this ->downloadFeed()
    		->processContent ()
    		->store()->shouldReturn(true);
    }
    
    function it_should_save_the_name_used_to_construct_it ()
    {
		$this->beConstructedWith("test");
		$this->getName()->shouldReturn ("test");
      }
	}
