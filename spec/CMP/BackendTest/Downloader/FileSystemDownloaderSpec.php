<?php

namespace spec\CMP\BackendTest\Downloader;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FileSystemDownloaderSpec extends ObjectBehavior
{
	
	function it_should_extract_correctly_the_content ()
	{
		// To run the test:
		// Create a file in the filesystem, with a known content and check if the method 
		// returns the same value...
		// .. create a file
		// .. add a known content...
		$this->getItemContent("name_of_file_created")->shouldReturn ("a_value_or_string_to_test_the_content");
	}
	
	function it_should_prepare_a_list_of_identifiers_for_the_item_list ()
	{
		//To run the test:
		// The method will get the file list in the folder (the value is in the config)
		// and will return an array with the names
		// .. create one archive (item)
		// .. create another one
		// .. another
		
		$this->getItemList()->shouldBeArray();
		//->shouldContain("a_name_from_the_ones_created_before");

		// .. remove all the files
	}
}
