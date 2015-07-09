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

use CMP\BackendTest\CMPResource;

abstract class Base extends CMPResource implements Processor
{
	/**
	 * @return CMP\BackendTest\Entity\Video 
	 */
	abstract public function parse ($content); 
	
}
