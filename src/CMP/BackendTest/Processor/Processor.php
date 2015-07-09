<?php 
/**
 * Video Share: A Backend Framework for CMProductions's Test
 * ==================================================================
 * by Ernesto Giralt (egiralt@gmail.com), July/2015
 *
 * This code has been made only demonstrative intentions and the author is not liable for
 * its use or application beyond the stated purpose.
 */

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