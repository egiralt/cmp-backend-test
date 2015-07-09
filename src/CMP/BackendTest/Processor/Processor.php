<?php 

namespace CMP\BackendTest\Processor;

interface Processor
{
	/**
	 * The implementers have to develop the code to process the value of content, specifically to match
	 * the kind or type of content
	 * 
	 * @return CMP\BackendTest\Entity\Video
	 */
	function parse ($content);
	
}